

 
    /**
     * Setup dropzone
     */

    let myDropzoneUpdate;

      myDropzoneUpdate = new Dropzone('#update_form', {
        previewTemplate: $('#dzPreviewContainerUpdate').html(),
        url: '/form-submit-update',
        addRemoveLinks: true,
        autoProcessQueue: false,       
        uploadMultiple: false,
        parallelUploads: 1,
        maxFiles: 1,
        acceptedFiles: '.jpeg, .jpg, .png, .gif',
        thumbnailWidth: 900,
        thumbnailHeight: 600,
        previewsContainer: "#previews_update",
        timeout: 0,
        init: function() 
        {
            myDropzoneUpdate = this;

            // when file is dragged in
            this.on('addedfile', function(file) { 
                $('.dropzone-drag-area').removeClass('is-invalid').next('.invalid-feedback').hide();
            });
        },
        success: function(file, response) 
        {
            // hide form and show success message
            $('#update_form').fadeOut(600);
            setTimeout(function() {
                $('#successMessage').removeClass('d-none');
            }, 600);
        }
    });

$(document).ready(function() {
    // create attachment  

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Initialize DataTable
    var table = $('.data-table-updates').DataTable({
        processing: true,
        serverSide: true,
        paging: false,
        ordering: false,
        searching: false,
        info: false,

        ajax: {
            url: "details",
            data: {
                service_type: 'updates_order',
                // other parameters if needed
            },
        },
        columns: [
            {data: 'name', name: 'name'},
            {data: 'date', name: 'date'},
            {data: 'description', name: 'description'},

        ]
    });
    $('#updates_tables').addClass('no-border no-header');
 

    ////
    $('#update_form').on('submit',function(e)
    {   
                        
                        e.preventDefault();
                            
                        
                        let formData = new FormData(this);

                         console.log(formData);
                         myDropzoneUpdate.getAcceptedFiles().forEach(file => {
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
                                url: "updates/create",
                                data: formData,
                                contentType:false, // determint type object 
                                processData: false,  // processing on response 
                                success:function(response)
                                {
                                console.log(response);
                                console.log("response");
                
                                Swal.fire({
                                    text: " نجحت   عملية اضافة  العنصر  !",
                                    icon: "success",
                                                buttonsStyling: false,
                                                confirmButtonText: "Ok, got it!",
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
            });

