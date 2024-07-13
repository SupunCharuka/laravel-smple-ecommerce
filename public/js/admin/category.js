(() => {
    $(function () {
        let category_table = $("#category").DataTable({
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
                { data: "name", name: "name", searchable: true },
                { data: "slug", name: "slug", searchable: true },
                { data: "actions", searchable: false, orderable: false },
            ],
            columnDefs: [{ targets: 3, className: "text-center" }],
        });

        Livewire.on("category-created", ({ category }) => {
            category_table.clear().rows.add(category).draw();
            $("html, body").animate({ scrollTop: 0 }, 200);
        });

        $(document).on("click", ".delete-category", function (e) {
            e.preventDefault();
            __this = $(this);
            let category_id = $(this).data("category");
            Swal.fire({
                title: "Are You Sure?",
                text: "Are you want to delete this category?",
                icon: "warning",
                showCancelButton: true,
            }).then((willDelete) => {
                if (willDelete.isConfirmed) {
                    $.ajax({
                        type: "DELETE",
                        url:  "/admin/category/" + category_id,
                        data: {
                            category_id,
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
                                    category_table.draw();
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
