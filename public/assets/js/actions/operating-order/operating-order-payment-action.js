
 
    /**
     * Setup dropzone
     */
    $('#item-select').select2({theme: 'bootstrap4'});

    let myDropzonePayment;

    myDropzonePayment = new Dropzone('#payment_form', {
        previewTemplate: $('#dzPreviewContainerPayment').html(),
        url: '/form-submit-payment',
        addRemoveLinks: true,
        autoProcessQueue: false,       
        uploadMultiple: false,
        parallelUploads: 1,
        maxFiles: 1,
        acceptedFiles: '.jpeg, .jpg, .png, .gif',
        thumbnailWidth: 900,
        thumbnailHeight: 600,
        previewsContainer: "#previews_payment",
        timeout: 0,
        init: function() 
        {
            myDropzonePayment = this;

            // when file is dragged in
            this.on('addedfile', function(file) { 
                $('.dropzone-drag-area').removeClass('is-invalid').next('.invalid-feedback').hide();
            });
        },
        success: function(file, response) 
        {
            // hide form and show success message
            $('#payment_form').fadeOut(600);
            setTimeout(function() {
                $('#successMessage').removeClass('d-none');
            }, 600);
        }
    });

$(document).ready(function() {
    // Initialize DataTable
    var table = $('.data-table-payment').DataTable({
        processing: true,
        serverSide: true,
        paging: false,
        ordering: false,
        searching: false,
        info: false,
        ajax: {
            url: "details",
            data: {
                service_type: 'operating_order_payment',
                // other parameters if needed
            },
        },
        columns: [
            {data: 'no', name: 'no'},
            {data: 'id', name: 'id'},
            {data: 'payment_method', name: 'payment_method'},
            {data: 'amount', name: 'amount'},
            {data: 'payment_date', name: 'payment_date'},
            {data: 'collector', name: 'collector'}, 
            {data: 'notes', name: 'notes'},
            {data: 'date_time', name: 'date_time'}, 
            {data: 'action', name: 'action'}   //action
        ]
    });

    // Handle form submission
    $('#payment_form').on('submit', function(e) {
        e.preventDefault();
        let formData = new FormData(this);

        console.log(formData);
        myDropzonePayment.getAcceptedFiles().forEach(file => {
            console.log(file);
            formData.append("file", file);
        });


        $.ajax({
            type: "post",
            url: "payment/create",
            data: formData,
            contentType: false, // Do not set Content-Type header
            processData: false, // Do not process data
            success: function(response) {
                console.log(response);
  

                $('.total_amount').text(response.total_amount);
                $('.total_amount_paid').text(response.total_paid);
                $('.remaining_amount').text(response.residual);
                document.getElementById('remaining').value = response.residual;
                console.log(response.paid_status);
                const paymentStatusSelect = document.getElementById('payment_status');
                paymentStatusSelect.value = response.paid_status; 
                
                // Using jQuery
 
                $('#payment_form')[0].reset(); // Reset form fields
                myDropzonePayment.removeAllFiles(true);

                // Show success message
                Swal.fire({
                    text: " نجحت   عملية اضافة  العنصر  !",
                    icon: "success",
                    buttonsStyling: false,
                    confirmButtonText: "حسنا!",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                });

                // Redraw the DataTable
                table.draw();
            },
            error: function(response) {
                console.log(response);
                myDropzonePayment.removeAllFiles(true);

                // Show error message
                Swal.fire({
                    text: response.responseJSON.message,
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "حسنا!",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                });
            }
        });
    });

    // Event listeners for filtering
    $('#search').keyup(function() {
        table.draw();
    });

    $('#type_order').change(function() {
        table.draw();
    });



    
    $(".data-table-payment").on("click", ".deleteRecord[data-id]", function (e) 
    {

        e.preventDefault();
        $(".show_confirm").click(function (event) {
            Swal.fire({
                title: "هل انت متأكد ?",
                text: "سوف يتم حذف العنصر !",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "نعم, احذفه!",
            }).then((willDelete) => {
                if (willDelete.isConfirmed) {
                    var id = $(this).data("id");
                    var token = $("meta[name='csrf-token']").attr("content");

                    $.ajax({
                        url: "payment/" + id,
                        type: "DELETE",
                        data: {
                            id: id,
                            _token: token,
                        },
                        success: function () {
                            console.log("it Works");
                             
                    
                            $(".data-table-payment").DataTable().ajax.reload();

                            $('.total_amount').text(response.total_amount);
                            $('.total_amount_paid').text(response.total_paid);
                            $('.remaining_amount').text(response.residual);
                            document.getElementById('remaining').value = response.residual;
                            console.log(response.paid_status);
                            const paymentStatusSelect = document.getElementById('payment_status');
                            paymentStatusSelect.value = response.paid_status; 
                    
                        },

                        error: function(xhr, status, error) {
                            console.log(error);
                            Swal.fire({
                                text: "يوجد لديك خطأ في عملية الحذف تأكد من عدم وجود عناصر مرتبطة به",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "حسنا  !",
                                customClass: 
                                {
                                    confirmButton: "btn btn-primary"
                                }
            
                              });               
                            
                            
                            
                            }
                    });
                }
            });
        });
    });

    $('#item-select').select2({
        ajax: {
            url: 'collector', // URL to fetch data
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    q: params.term // Search term
                };
            },
            processResults: function(data) {
                // Map the data into the format expected by Select2
                return {
                    results: $.map(data, function(item) {
                        return {
                            id: item.id,
                            text: item.name
                        };
                    })
                };
            },
            cache: true
        },
        minimumInputLength: 1 // Minimum characters required to trigger the search
    });

});
