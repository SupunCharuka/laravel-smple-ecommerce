const loadProducts = (page = 1, search = "") => {
    const baseUrl = `/products`;
    const url = `${baseUrl}?page=${page}&search=${search}`;

    $.ajax({
        url: url,
        type: "GET",
        success: function (response) {
            if (page === 1) {
                $("#products-container").html(response.html);
            } else {
                $("#products-container").append(response.html);
            }

            $("#pagination-links").html(response.pagination);
            if ($("#products-container").children().length === 0) {
                $("#products-container").html(
                    '<div class="col-12"><p class="text-center">No products found.</p></div>'
                );
            }
        },
        error: function (xhr) {
            console.log(xhr.responseText);
        },
    });
};

$(document).ready(function () {
    loadProducts();

    $(document).on("click", "#load-more", function (e) {
        e.preventDefault();
        const nextPage = $(this).data("next-page");
        const search = $('input[type="search"]').val();
        loadProducts(nextPage, search);
    });

    $('input[type="search"]').on("input", function () {
        const search = $(this).val();
        loadProducts(1, search);
    });
});
