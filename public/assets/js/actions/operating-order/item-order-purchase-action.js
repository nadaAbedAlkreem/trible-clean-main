$(document).ready(function() {
    // Alert for debugging purposes

    // Setup AJAX with CSRF token
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Initialize DataTable
    var table = $('.data-table-purchase').DataTable({
        processing: true,
        serverSide: true,
        paging: false,
        ordering: false,
        searching: false,
        info: false,

        ajax: {
            url: "details",
            
            data: {
                service_type: 'purchase_order_items',//searchInput
                searchInput: $('#searchInput').val(),//searchInput
                // other parameters if needed
            },
        },
        columns: [
            {data: 'order_item_id', name: 'order_item_id'},
            {data: 'description_ar', name: 'description_ar'},
            {data: 'quantity', name: 'quantity'},
            {data: 'unit_price', name: 'unit_price'},
            {data: 'total_price_before_tax', name: 'total_price'} , 
            {data: 'tax', name: 'tax'},
            {data: 'total_price_after_tax', name: 'total_price_after_tax'} , 
            {data: 'status_tax', name: 'status_tax'} , 
            {data: 'notes', name: 'notes'} ,  
            {data: 'action', name: 'action'}   //action


        ]
    });

    // Event listeners for filtering
    $('#searchInput').keyup(function() {
        table.draw();
    });

    $('#type_order').change(function() {
        table.draw();
    });



    $(".data-table-purchase").on("click", ".deleteRecord[data-id]", function (e) 
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
                confirmButtonText: " نعم,احذفه!",
            }).then((willDelete) => {
                if (willDelete.isConfirmed) {
                    var id = $(this).data("id");
                    var token = $("meta[name='csrf-token']").attr("content");

                    $.ajax({
                        url: "purchase/" + id,
                        type: "DELETE",
                        data: {
                            id: id,
                            _token: token,
                        },
                        success: function () {
                            console.log("it Works");
                            $(".data-table-purchase").DataTable().ajax.reload();
                        },

                        error: function(xhr, status, error) {
                            console.log(error);
                            Swal.fire({
                                text: "يوجد لديك خطأ في عملية الحذف تأكد من عدم وجود عناصر مرتبطة به",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "حسنا!",
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