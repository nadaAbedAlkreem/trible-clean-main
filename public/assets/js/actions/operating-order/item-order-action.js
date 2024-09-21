$(document).ready(function() {
    // ADD for debugging purposes


    // Setup AJAX with CSRF token
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Initialize DataTable
    var table = $('#data-table-item').DataTable({
        processing: true,
        serverSide: true,
        paging: false,
        ordering: false,
        searching: false,
        info: false,

        ajax: {
            url: "details",
            data: {
                service_type: 'order_items',
                // other parameters if needed
            },
        },
        columns: [
            {data: 'id', name: 'id'},
            {data: 'description_ar', name: 'description_ar'},
            {data: 'total_quantity', name: 'total_quantity'},
            {data: 'unit_price', name: 'unit_price'},
            {data: 'total_price_before_tax', name: 'total_price_before_tax'},
            {data: 'tax', name: 'tax'},
            {data: 'total_price_after_tax', name: 'total_price_after_tax'} , 
            {data: 'status_tax', name: 'status_tax'} ,  
            {data: 'notes', name: 'notes'} ,  
            
            {data: 'status', name: 'status'} , 
            {data: 'action', name: 'action'} ,  //action


        ]
    });
    $('#delivery_form').on('submit',function(e)
    {   
                        
                        e.preventDefault();
                            
                        
                        let formData = new FormData(this); 

        
                         console.log(formData);

                           
                        $.ajaxSetup({
                            headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    } });
                                $.ajax(
                                {
                                type:"post",
                                url: "order/delivery/update",
                                data: formData,
                                contentType:false, // determint type object 
                                processData: false,  // processing on response 
                                success:function(response)
                                {
                                console.log(response);
                                console.log("response");
                                table.draw();
                                var closeButtons = document.getElementsByClassName('close-pop-up');
                                closeButtons[0].click();
                                Swal.fire({
                                                text: " نجحت عملية التحديث",
                                                icon: "success",
                                                buttonsStyling: false,
                                                confirmButtonText: "حسنا،    ",
                                                customClass: 
                                                {
                                                    confirmButton: "btn btn-primary"
                                                }
                                    })

                
                
                                },
                
                                error: function(response) 
                                    {
                                        console.log(response)  ; 
                                            Swal.fire(
                                                {
                                                        text:  response.responseJSON.message  , 
                                                        icon: "error",
                                                        buttonsStyling: false,
                                                        confirmButtonText: "Ok, got it!",
                                                            customClass: {
                                                                confirmButton: "btn btn-primary"
                
                                                                }
                                                    })
                                    },
                    });

                });

    // Event listeners for filtering
    $('#search').keyup(function() {
        table.draw();
    });

    $('#type_order').change(function() {
        table.draw();
    });

    $('.status').on('change', function() {
        var status = $(this).val();  
        var operatingOrderId = document.getElementById('operating_order').textContent.trim();
        var updateElement = $(this).closest('.main-card-info-pair').find('.update_element').val();

        console.log(operatingOrderId);
                
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    } });
        $.ajax({
            url: 'operatingOrder/update',   
            type: 'POST',
            data: {
                status: status,
                operatingOrderId: operatingOrderId  , 
                updateElement :updateElement 
                  
            },
            success: function(response) {
                Swal.fire({
                    text: " نجحت   عملية  تحديث  ",
                    icon: "success",
                    buttonsStyling: false,
                    confirmButtonText: "حسنا، ",
                    customClass: 
                    {
                        confirmButton: "btn btn-primary"
                    }

                  });

             },
            error: function(xhr, status, error) {
                console.log('حدث خطأ:', error);
            }
        });


    });





    $('#close_order').on('click', function() {
        var operatingOrderId = document.getElementById('operating_order').textContent.trim();
        var updateElement = "close_order";

        console.log(operatingOrderId);
                
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    } });
        $.ajax({
            url: 'operatingOrder/update',   
            type: 'POST',
            data: {
                operatingOrderId: operatingOrderId  , 
                updateElement :updateElement 
                  
            },
            success: function(response) {
               

                  $('#status').val('canceled').change();   


             },
            error: function(xhr, status, error) {
                console.log('حدث خطأ:', error);
            }
        });


    });





    $("#data-table-item").on("click", ".deleteRecord[data-id]", function (e) 
    {

        e.preventDefault();
        $(".show_confirm").click(function (event) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: " نعم ,  احذفه !",
            }).then((willDelete) => {
                if (willDelete.isConfirmed) {
                    var id = $(this).data("id");
                    var token = $("meta[name='csrf-token']").attr("content");

                    $.ajax({
                        url: "orderItems/" + id,
                        type: "DELETE",
                        data: {
                            id: id,
                            _token: token,
                        },
                        success: function () {
                            console.log("it Works");
                            $("#data-table-item").DataTable().ajax.reload();
                        },

                        error: function(xhr, status, error) {
                            console.log(error);
                            Swal.fire({
                                text: "يوجد لديك خطأ في عملية الحذف تأكد من عدم وجود عناصر مرتبطة به",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "حسنا",
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












});