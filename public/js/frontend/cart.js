$(document).ready(function () {
    $(".js-btn-minus").on("click", function () {
        let $input = $(this).closest(".input-group").find("input");
        let quantity = parseInt($input.val()) - 1;
        if (quantity < 1) quantity = 1;
        $input.val(quantity);
        updateCart($input.data("product-id"), quantity);
    });

    $(".js-btn-plus").on("click", function () {
        let $input = $(this).closest(".input-group").find("input");
        let quantity = parseInt($input.val()) + 1;
        $input.val(quantity);
        updateCart($input.data("product-id"), quantity);
    });

    $(".product-remove").on("click", function () {
        const productId = $(this).closest("tr").data("product-id");
        removeFromCart(productId);
    });

    function updateCart(productId, quantity) {
        $.ajax({
            url: "/cart/update",
            type: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr("content"),
                product_id: productId,
                quantity: quantity,
            },
            success: function (response) {
                if (response.status === "success") {
                    updateCartItemDisplay(
                        productId,
                        quantity,
                        response.newTotal
                    );
                }
            },
        });
    }

    function removeFromCart(productId) {
        $.ajax({
            url: "/cart/remove",
            type: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr("content"),
                product_id: productId,
            },
            success: function (response) {
                if (response.status === "success") {
                    removeCartItemDisplay(productId);
                }
            },
        });
    }

    function updateCartItemDisplay(productId, quantity, newTotal) {
        const $row = $('tr[data-product-id="' + productId + '"]');
        $row.find(".product-quantity input").val(quantity);
        $row.find(".product-total").text("$" + newTotal);

        updateCartTotals();
    }

    function removeCartItemDisplay(productId) {
        const $row = $('tr[data-product-id="' + productId + '"]');
        $row.remove();
        if ($("tbody tr").length === 0) {
            $("tbody").html(
                '<tr><td colspan="6" class="text-center">Your cart is empty.</td></tr>'
            );
            $(".cart-subtotal").text("$0.00");
            $(".cart-total").text("$0.00");
        } else {
            updateCartTotals();
        }
    }

    function updateCartTotals() {
        let subtotal = 0;
        $("tbody tr").each(function () {
            const price = parseFloat(
                $(this).find(".product-price").text().replace("$", "")
            );
            const quantity = parseInt(
                $(this).find(".product-quantity input").val()
            );
            subtotal += price * quantity;
        });

        const total = subtotal;

        $(".cart-subtotal").text("$" + subtotal.toFixed(2));
        $(".cart-total").text("$" + total.toFixed(2));
    }
});
