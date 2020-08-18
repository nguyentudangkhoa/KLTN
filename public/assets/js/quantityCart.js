$(document).ready(function(c) {
    $('.close1').on('click', function(c) {
        $('#id_cart_item').val($(this).data('id'));
        $('#name-cart-item').text($(this).data('name'));
    });
    //number format
    function formatNumber(num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
    }
    $('#confirm_cart_btn').click(function() {
        var id = $('#id_cart_item').val();
        $.ajax({
            url: "delete-cart",
            method: "POSt",
            data: {
                id: id,
                _token: $(this).data('token')
            },
            success: function(data) {
                if (data.report) {
                    $('.rem' + id).fadeOut('slow', function(c) {
                        $('.rem' + id).remove();
                    });
                    $('#total_price').text(formatNumber(data.total_price) + ' VND');
                    $('#confirm-cart-delete').modal('hide');
                    $('#lbl_quantity').text('(' + data.quantity + ')');
                    $('#lbl-quantity-info').text(data.quantity);
                    var info_quan = $('#lbl-quantity-info').text();
                    if (parseInt(info_quan) == 0) {
                        $('#tb_cart').css('display', 'none');
                        $('#cart_bottom').css('display', 'none');
                    }
                } else if (data.route) {
                    window.location.replace(data.route);
                }
            }
        });
    });
});
