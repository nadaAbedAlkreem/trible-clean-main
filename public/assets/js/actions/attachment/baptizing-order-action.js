 


let myDropzoneBaptizing;

myDropzoneBaptizing = new Dropzone('#baptizing_form', {
  previewTemplate: $('#dzPreviewContainerBaptiziing').html(),
  url: '/form-submit-baptizing',
  addRemoveLinks: true,
  autoProcessQueue: false,       
  uploadMultiple: false,
  parallelUploads: 1,
  maxFiles: 1,
  acceptedFiles: '.jpeg, .jpg, .png, .gif',
  thumbnailWidth: 900,
  thumbnailHeight: 600,
  previewsContainer: "#previews_baptizing",
  timeout: 0,
  init: function() 
  {
    myDropzoneBaptizing = this;

      // when file is dragged in
      this.on('addedfile', function(file) { 
          $('.dropzone-drag-area').removeClass('is-invalid').next('.invalid-feedback').hide();
      });
  },
  success: function(file, response) 
  {
      // hide form and show success message
      $('#baptizing_form').fadeOut(600);
      setTimeout(function() {
          $('#successMessage').removeClass('d-none');
      }, 600);
  }
});



$(document).ready(function() {
    // create attachment  
    $('#baptizing_form').on('submit',function(e)
    {   
                    
                    e.preventDefault();
    
                    
                    let formData = new FormData(this); 
 
                    myDropzoneBaptizing.getAcceptedFiles().forEach(file => {
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





    // Setup AJAX with CSRF token
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Initialize DataTable
    var table = $('.data-table-attachment-images').DataTable({
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
            {data: 'image', name: 'image'},
 


        ]
    });

 
    $('#type_order').change(function() {
        table.draw();
    });
});





