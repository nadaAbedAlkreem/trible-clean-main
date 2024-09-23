


Dropzone.autoDiscover = false;

    /**
     * Setup dropzone
     */

    let myDropzone;

       myDropzone = new Dropzone('.attachment_form', {
        previewTemplate: $('#dzPreviewContainer').html(),
        url: '/form-submit',
        addRemoveLinks: true,
        autoProcessQueue: false,       
        uploadMultiple: false,
        parallelUploads: 1,
        maxFiles: 1,
        acceptedFiles: '.jpeg, .jpg, .png, .gif',
        thumbnailWidth: 900,
        thumbnailHeight: 600,
        previewsContainer: "#previews",
        timeout: 0,
        init: function() 
        {
            myDropzone = this;

            // when file is dragged in
            this.on('addedfile', function(file) { 
                $('.dropzone-drag-area').removeClass('is-invalid').next('.invalid-feedback').hide();
            });
        },
        success: function(file, response) 
        {
            // hide form and show success message
            $('.attachment_form').fadeOut(600);
            setTimeout(function() {
                $('#successMessage').removeClass('d-none');
            }, 600);
        }
    });

 
                                
document.addEventListener('DOMContentLoaded', function () {
    // Select all asset type divs
    // dropzone image 
    



    const assetTypes = document.querySelectorAll('.asset-type');


    // Add click event listener to each asset type div
    assetTypes.forEach(function (assetType) {
        assetType.addEventListener('click', function () {
            // Get the file type value based on the selected asset type
            let fileType = '';
            if (this.querySelector('h4').textContent.includes('ملف التصميم')) {
                fileType = 'design '; // Replace with the value you want for تعميد
            } else if (this.querySelector('h4').textContent.includes('الفاتورة')) {
                fileType = 'invoice '; // Replace with the value you want for شعار
            } else if (this.querySelector('h4').textContent.includes('إشعار التسليم')) {
                fileType = 'slogan '; // Replace with the value you want for صور
            }  else if (this.querySelector('h4').textContent.includes('التعميد')) {  //>مرفقات أخرى
                fileType = 'baptizing '; // Replace with the value you want for صور
            }

            else if (this.querySelector('h4').textContent.includes('مرفقات أخرى')) {  //>مرفقات أخرى
                fileType = 'other_attachments'; // Replace with the value you want for صور
            }


 

            // Update the hidden input field
            document.getElementById('file_type').value = fileType;

            // Optional: You can also close the popup or perform other actions here
            // document.querySelector('.pop-up').style.display = 'none'; 
        });
    });
}); 





$(document).ready(function() {
    // create attachment  
    
   
    // Setup AJAX with CSRF token
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Initialize DataTable
    var table = $('#data-table-attachment-images').DataTable({
        processing: true,
        serverSide: true,
        paging: false,
        ordering: false,
        searching: false,
        info: false,

        ajax: {
            url: "details",
            data: {
                service_type: 'order_items_attachment',
                // other parameters if needed
            },
        },
        columns: [
             {data: 'image', name: 'image'}
        ]
    });

 
    $('#type_order').change(function() {
        table.draw();
    });



    
    $("#data-table-attachment-images").on("click", ".deleteRecordAttachment[data-id]", function (e) 
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
                confirmButtonText: "Yes, delete it!",
            }).then((willDelete) => {
                if (willDelete.isConfirmed) {
                    var id = $(this).data("id");
                    var token = $("meta[name='csrf-token']").attr("content");

                    $.ajax({
                        url: "attachment/" + id,
                        type: "DELETE",
                        data: {
                            id: id,
                            _token: token,
                        },
                        success: function () {
                            console.log("it Works");
                            $("#data-table-attachment-images").DataTable().ajax.reload();
                        },

                        error: function(xhr, status, error) {
                            console.log(error);
                            Swal.fire({
                                text: "يوجد لديك خطأ في عملية الحدذ تأكد من عدم وجود عناصر مرتبطة به",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "حسنا، حصلت عليه!",
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


    
    
    $("#data-table-attachment-images").on("click", ".download-btn[data-id]", function (e) 
    {

        e.preventDefault();
 
        console.log('Download button clicked'); // Debugging line
        $('#download-popup').show();
           
    });

    $('.attachment_form').on('submit',function(e)
    {   
                    
                    e.preventDefault();
                        let submitButton = this;
                        submitButton.disabled = true; // Disable the button to prevent multiple submissions
                        let indicatorLabel = submitButton.querySelector(".indicator-label");
                        let indicatorProgress = submitButton.querySelector(".indicator-progress");
                
                        indicatorLabel.style.display = "none";
                        indicatorProgress.style.display = "inline-block";
                
                    
          

                        let formData = new FormData($('.attachment_form')[0]);
                        console.log(formData);
                        myDropzone.getAcceptedFiles().forEach(file => {
                            console.log(file);
                            formData.append("file_path", file);
                        });


                           
                        $.ajaxSetup({
                            headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    } });
                                $.ajax(
                                {
                                type:"post",
                                url: "attachment/create",
                                data: formData,
                                contentType:false, // determint type object 
                                processData: false,  // processing on response 
                                success:function(response)
                                {
                                console.log(response);
                                submitButton.disabled = false;
                                indicatorLabel.style.display = "inline-block";
                                indicatorProgress.style.display = "none";
                                $("#data-table-attachment-images").DataTable().ajax.reload();
                                $('.attachment_form')[0].reset(); // Reset form fields
                                myDropzone.removeAllFiles(true);
                                var closeButtons = document.getElementsByClassName('close-pop-up');
                                closeButtons[0].click();

                        
                                Swal.fire({
                                                text: " نجحت     عملية اضافة  العنصر  !",
                                                icon: "success",
                                                buttonsStyling: false,
                                                confirmButtonText: "حسنا، حصلت عليه!",
                                                customClass: 
                                                {
                                                    confirmButton: "btn btn-primary"
                                                }
                                    })
                                
                
                
                                },
                
                                error: function(response) 
                                    {
                                        console.log(response)  ; 
                                        submitButton.disabled = false;
                                        indicatorLabel.style.display = "inline-block";
                                        indicatorProgress.style.display = "none";
                                            Swal.fire(
                                                {
                                                        text:  response.responseJSON.message  , 
                                                        icon: "error",
                                                        buttonsStyling: false,
                                                        confirmButtonText: "حسنا، حصلت عليه!",
                                                        customClass: {
                                                                confirmButton: "btn btn-primary"
                
                                                                }
                                                    })
                                    },
                    });

                });






                
});





