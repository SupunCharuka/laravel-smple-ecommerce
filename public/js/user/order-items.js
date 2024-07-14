(() => {
    $(function () {
        let orderItems_table = $("#order-items").DataTable({
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
                {
                    data: "product_name",
                    name: "product_name",
                    searchable: true,
                },
                { data: "category", name: "category", searchable: true },
                { data: "quantity", name: "quantity", searchable: true },
                { data: "price", name: "price", searchable: true },
                {
                    data: "product_details",
                    name: "product_details",
                    searchable: true,
                },
            ],
            columnDefs: [{ targets: 5, className: "text-center" }],
        });
    });
})();
