$(document).ready(function () {
    $(document).on("click", ".add-to-cart", function (e) {
        e.preventDefault();
        const productId = $(this).data("product-id");
        const quantity = $("#cart_quantity").val();

        $.ajax({
            url: "/cart/add",
            type: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr("content"),
                product_id: productId,
                quantity: quantity,
            },
            success: function (response) {
                if (response.status === "success") {
                    updateCartCount();
                    window.Toast.fire({
                        icon: "success",
                        title: response.message,
                    });
                } else {
                    window.Toast.fire({
                        icon: "error",
                        title: "Something went wrong.",
                    });
                }
            },
            error: function (xhr) {
                window.Toast.fire({
                    icon: "error",
                    title: "Something went wrong.",
                });
            },
        });
    });
    function updateCartCount() {
        $.ajax({
            url: "/cart/count", 
            type: "GET",
            success: function (response) {
                if (response.count) {
                
                    $(".cart-count").text(response.count);
                }
            },
            error: function (xhr) {
                console.error("Failed to fetch cart count.");
            },
        });
    }
});


