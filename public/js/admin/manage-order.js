(() => {
    $(function () {
        let order_table = $("#order").DataTable({
            scrollX: true,
            destroy: true,
            processing: true,
            serverSide: true,
            fixedHeader: true,
            responsive: true,
            autoWidth: false,
            order: [[0, "asc"]],
            ajax: location.href,
            columns: [
                { data: "id", name: "id", searchable: true },
                { data: "user", name: "user", searchable: true },
                { data: "first_name", name: "first_name", searchable: true },
                { data: "last_name", name: "last_name", searchable: true },
                { data: "address", name: "address", searchable: true },
                { data: "email", name: "email", searchable: true },
                {
                    data: "phone",
                    name: "phone",
                    searchable: true,
                },
                { data: "total", name: "total", searchable: true },
                { data: "status", name: "status", searchable: true },
                { data: "actions", name: "actions", searchable: true },
            ],
            columnDefs: [
                { targets: 8, className: "text-center" },
                { targets: 9, className: "text-center" },
            ],
        });

        $(document).on('change', '.order-status', function() {
            var status = $(this).val();
            var orderId = $(this).data('order-id');
    
            if (status) {
                $.ajax({
                    url: '/admin/orders/' + orderId + '/update-status', 
                    type: 'POST',
                    data: {
                        status: status,
                        _token: $('meta[name="csrf-token"]').attr('content') 
                    },
                    success: function(response) {
                        $('#order').DataTable().ajax.reload();
                      
                        window.Toast.fire({
                            icon: "success",
                            title:"Order status updated successfully.",
                        });
                    },
                    error: function(xhr) {
                        alert('Failed to update order status: ' + xhr.responseJSON.message);
                    }
                });
            }
        });
    });
})();
