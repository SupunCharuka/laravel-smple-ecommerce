$(document).ready(function () {
    $('.buy-now').on('click', function () {
        const productId = $(this).data('product-id');
        const quantity = $('#cart_quantity').val();

        $.ajax({
            url: '/cart/add',
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                product_id: productId,
                quantity: quantity,
            },
            success: function (response) {
                if (response.status === 'success') {
                    window.location.href = '/user/checkout'; 
                } else {
                    window.Toast.fire({
                        icon: 'error',
                        title: 'Something went wrong.',
                    });
                }
            },
            error: function (xhr) {
                window.Toast.fire({
                    icon: 'error',
                    title: 'Something went wrong.',
                });
            },
        });
    });
});
