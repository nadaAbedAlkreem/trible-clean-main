


let myDropzoneInvoice;

myDropzoneInvoice = new Dropzone('#invoice_form', {
  previewTemplate: $('#dzPreviewContainerInvoice').html(),
  url: '/form-submit-invoice',
  addRemoveLinks: true,
  autoProcessQueue: false,       
  uploadMultiple: false,
  parallelUploads: 1,
  maxFiles: 1,
  acceptedFiles: '.jpeg, .jpg, .png, .gif',
  thumbnailWidth: 900,
  thumbnailHeight: 600,
  previewsContainer: "#previews_invoice",
  timeout: 0,
  init: function() 
  {
    myDropzoneInvoice = this;

      // when file is dragged in
      this.on('addedfile', function(file) { 
          $('.dropzone-drag-area').removeClass('is-invalid').next('.invalid-feedback').hide();
      });
  },
  success: function(file, response) 
  {
      // hide form and show success message
      $('#invoice_form').fadeOut(600);
      setTimeout(function() {
          $('#successMessage').removeClass('d-none');
      }, 600);
  }
});



$(document).ready(function() {
    // create attachment  
    $('#invoice_form').on('submit',function(e)
    {   
                    
                    e.preventDefault();
    
                        let formData = new FormData(this); 
 

                        myDropzoneInvoice.getAcceptedFiles().forEach(file => {
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
                                url: "invoice/create",
                                data: formData,
                                contentType:false, // determint type object 
                                processData: false,  // processing on response 
                                success:function(response)
                                {
                                console.log(response);
                                console.log("response");
                                $('#invoice_form')[0].reset(); // Reset form fields
                                myDropzoneInvoice.removeAllFiles(true);
                
                                Swal.fire({
                                                text: " نجحت   عملية اضافة  العنصر  !",
                                                icon: "success",
                                                buttonsStyling: false,
                                                confirmButtonText: "حسنا  !",
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
                                                        confirmButtonText: "حسنا !",
                                                            customClass: {
                                                                confirmButton: "btn btn-primary"
                
                                                                }
                                                    })
                                    },
                    });

                });
            });

