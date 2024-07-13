(() => {
    $(function () {
        let product_table = $("#product").DataTable({
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
                { data: "title", name: "title", searchable: true },
                { data: "price", name: "price", searchable: true },
                { data: "quantity", name: "quantity", searchable: true },
                { data: "actions", searchable: false, orderable: false },
            ],
            columnDefs: [{ targets: 4, className: "text-center" }],
        });


        $(document).on("click", ".delete-product", function (e) {
            e.preventDefault();
            __this = $(this);
            let product_id = $(this).data("product");
            Swal.fire({
                title: "Are You Sure?",
                text: "Are you want to delete this product?",
                icon: "warning",
                showCancelButton: true,
            }).then((willDelete) => {
                if (willDelete.isConfirmed) {
                    $.ajax({
                        type: "DELETE",
                        url:  "/admin/product/" + product_id,
                        data: {
                            product_id,
                        },
                        dataType: "JSON",
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                "content"
                            ),
                        },
                        success: function (response) {
                            if (response.status == "deleted")
                                Swal.fire("Done!", response.message, "success"),
                                    product_table.draw();
                            else console.error(response.message);
                        },
                        error: function (response) {
                            Swal.fire(
                                "Error!",
                                "Something went wrong.",
                                "error"
                            );
                        },
                    });
                }
            });
        });
    });
})();
