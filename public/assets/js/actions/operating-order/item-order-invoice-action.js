


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
                    let submitButton = this;
                    submitButton.disabled = true; // Disable the button to prevent multiple submissions
                    let indicatorLabel = submitButton.querySelector(".indicator-label");
                    let indicatorProgress = submitButton.querySelector(".indicator-progress");
            
                    indicatorLabel.style.display = "none";
                    indicatorProgress.style.display = "inline-block";
            
                
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
                                var closeButtons = document.getElementsByClassName('close-pop-up');
                                closeButtons[0].click();
                                submitButton.disabled = false;
                                indicatorLabel.style.display = "inline-block";
                                indicatorProgress.style.display = "none";

                            
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
                                        submitButton.disabled = false;
                                        indicatorLabel.style.display = "inline-block";
                                        indicatorProgress.style.display = "none";
        
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

