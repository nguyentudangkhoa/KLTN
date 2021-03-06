$(document).ready(function() {
    //Add to cart button
    $('.submit_form_product').submit(function(e) {
        e.preventDefault();
        var _token = $('input[name="_token"]').val();
        var id = $(this).data('id');
        var quantity = $('#lbl_quantity').text();
        var total = 1;
        total = parseInt(quantity) + 1;

        $.ajax({
            url: "add-to-cart",
            method: "POST",
            data: {
                id: id,
                _token: _token
            },
            success: function(data) {
                // alert(data.report);

                $('#name_cart_product').text(data.report);
                $('#add-to-cart-confirm').modal('show');
                setTimeout(() => {
                    $('#add-to-cart-confirm').modal('hide');
                }, 3000);
                $('#lbl_quantity').text('(' + data.quantity + ')');
                $('#btn-cart-shopping').prop('title', 'Bạn hiện đang có ' + data.quantity + ' sản phẩm trong giỏ hàng')
            }
        });
    });
    //Sign in
    $('#form_sigin').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        var email = formData.get('user_email');
        var txt_email = $('#user_email').val();
        var password = formData.get('user_password');
        var _token = $('input[name="_token"]').val();
        if (email == "") {
            $('#txt_user_name').css('display', 'block');
            $('#txt_user_name').text('Email không được để trống');
        } else if (password == "") {
            $('#txt_user_password').css('display', 'block');
            $('#txt_user_password').text('Password không được để trống');
        } else {
            $.ajax({
                url: "sign-in",
                method: "POST",
                data: {
                    email: email,
                    password: password,
                    remember: formData.get('remember'),
                    _token: _token
                },
                success: function(data) {
                    if (data.report == "Thông tin đăng nhập sai hoặc tài khoản không tồn tại" || data.report == "Email không hợp lệ" || data.report == "Password phải trên 6 ký tự" || data.report == "Tài khoản của bạn đã bị vô hiệu hóa") {
                        alert(data.report);
                    } else {

                        alert(data.report);
                        $('#myModal1').modal('hide');
                        $('#info_user_login').css('display', 'none');
                        $('#info_user_signup').css('display', 'none');
                        $('#info_user_email').css('display', 'block');
                        $('#user_email_show').text(data.name);
                        $('#info_user_logout').css('display', 'block');
                        if (data.route) {
                            window.location.replace(data.route);
                        }
                    }
                }
            });
        }
    });
    //Sign up
    $('#form_signup').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        var name = formData.get('user_name'); //user name
        var email = formData.get('user_email'); //email
        var password = formData.get('user_password'); //password
        var conf_pass = formData.get('conf_pass');
        var phone = formData.get('phone_number');
        var _token = $('input[name="_token"]').val();
        if (name == "") {
            $('#txt_user_name_up').css('display', 'block');
            $('#txt_user_name_up').text('Tên không được để trống');
        } else if (email == "") {
            $('#txt_user_email_up').css('display', 'block');
            $('#txt_user_email_up').text('Email không được để trống');
        } else if (password == "") {
            $('#txt_user_password_up').css('display', 'block');
            $('#txt_user_password_up').text('Password không được để trống');
        } else if (password.length <= 6) {
            $('#txt_user_password_up').css('display', 'block');
            $('#txt_user_password_up').text('Password phải trên 6 ký tự');
        } else if (conf_pass == "") {
            $('#txt_user_cof_pass').css('display', 'block');
            $('#txt_user_cof_pass').text('Password xác nhận không được để trống');
        } else if (conf_pass.length <= 6) {
            $('#txt_user_cof_pass').css('display', 'block');
            $('#txt_user_cof_pass').text('Password xác nhận phải trên 6 ký tự');
        } else if (conf_pass != password) {
            $('#txt_user_cof_pass').css('display', 'block');
            $('#txt_user_cof_pass').text('Password xác nhận phải trùng với password nhập ở trên');
        } else if (formData.get('gender') == null) {
            $('#txt_user_cof_gender').css('display', 'block');
            $('#txt_user_cof_gender').text('Xin vui lòng chọn giới tính');
        } else if (formData.get('phone_number') == null) {
            $('#txt_user_phone').css('display', 'block');
            $('#txt_user_phone').text('Xin vui nhập số diện thoại');
        } else if (formData.get('phone_number').length < 10 || formData.get('phone_number').length > 10) {
            $('#txt_user_phone').css('display', 'block');
            $('#txt_user_phone').text('Số điện thoại phải dúng 10 số');
        } else if (isNaN(formData.get('phone_number'))) {
            $('#txt_user_phone').css('display', 'block');
            $('#txt_user_phone').text('Số điện thoại không được chứa các ký tự không phải là số');
        } else {
            $('#sign-up-status').css('display', 'block');
            $('#img-loading-sign-up').css('display', 'block');
            $('#sign-up-status').text('Xin vui lòng chờ một lúc !!!');
            $.ajax({
                url: "send-mail-signup",
                method: "POSt",
                data: {
                    name: name,
                    email: email,
                    password: password,
                    gender: formData.get('gender'),
                    phone: formData.get('phone_number'),
                    _token: _token
                },
                success: function(data) {
                    if (data.report == "Tài khoản đã tồn tại") {
                        $('#img-loading-sign-up').css('display', 'none');
                        alert(data.report);
                        $('#sign-up-status').css('display', 'none');
                    } else if (data.report == "Email không hợp lệ") {
                        $('#img-loading-sign-up').css('display', 'none');
                        alert(data.report);
                        $('#sign-up-status').css('display', 'none');
                    } else {
                        $('#img-loading-sign-up').css('display', 'none');
                        alert(data.report);
                        $('#sign-up-status').text('Xin vui lòng check mail để hoàn tất đăng ký!');
                    }
                }
            });
        }
    });
    //Close form sign up delete validate line
    $('#close-form-sign-up').click(function() {
        $('#txt_user_name_up').css('display', 'none');
        $('#txt_user_email_up').css('display', 'none');
        $('#txt_user_password_up').css('display', 'none');
        $('#txt_user_cof_pass').css('display', 'none');
        $('#txt_user_cof_gender').css('display', 'none');
        $('#sign-up-status').css('display', 'none');
    });
    //number format
    function formatNumber(num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
    }
    // Minus item in shopping cart
    $('.btn-minus').click(function() {
        var id = $(this).data('id');
        var quantity_text = $('#quantity' + id).val();
        var quantity = parseInt(quantity_text);
        if (quantity_text == 1) {
            $('#name_cart_product').text("Không thể giảm số luợng xuống thêm");
            $('#add-to-cart-confirm').modal('show');
            setTimeout(() => {
                $('#add-to-cart-confirm').modal('hide');
            }, 700);
        } else {
            $.ajax({
                url: "minus-cart",
                method: "POSt",
                data: {
                    id: id,
                    quantity: quantity,
                    _token: $(this).data('token')
                },
                success: function(data) {
                    if (data.report && parseInt(quantity_text) <= 1) {
                        $('#name_cart_product').text(data.report);
                        $('#add-to-cart-confirm').modal('show');
                        setTimeout(() => {
                            $('#add-to-cart-confirm').modal('hide');
                        }, 700);
                        $('#quantity' + id).val(1);
                        $('#lbl_quantity').text('(' + data.quantity + ')');
                        $('#lbl-quantity-info').text(data.quantity);
                        $('#btn-cart-shopping').prop('title', 'Bạn hiện đang có ' + data.quantity + ' sản phẩm trong giỏ hàng');
                    } else {
                        $('#lbl_quantity').text('(' + data.quantity + ')');
                        $('#quantity' + id).val(data.produt_quantity);
                        $('#lbl-quantity-info').text(data.quantity);
                        $('#price_product_all_' + id).text(formatNumber(data.price_product_all) + ' VND');
                        $('#total_price').text(formatNumber(data.total_price) + ' VND');
                        $('#btn-cart-shopping').prop('title', 'Bạn hiện đang có ' + data.quantity + ' sản phẩm trong giỏ hàng')
                    }
                }
            });
        }

    });
    //Cart button
    $('.btn-cart').click(function(e) {
        var cart = $('#lbl_quantity').text();
        if (cart == 0) {
            e.preventDefault();
            $('#name_cart_product').text("Bạn không có sản phẩm nào trong giỏ hàng");
            $('#add-to-cart-confirm').modal('show');
            setTimeout(() => {
                $('#add-to-cart-confirm').modal('hide');
            }, 2000);
        }
    });
    //add more quantity
    $('.btn-plus').click(function() {
        var id = $(this).data('id');
        var quantity_text = $('#quantity' + id).val();
        var quantity = parseInt(quantity_text);
        $.ajax({
            url: "plus-cart",
            method: "POSt",
            data: {
                id: id,
                quantity: quantity,
                _token: $(this).data('token')
            },
            success: function(data) {
                if (data.report) {
                    alert(id)
                    $('#quantity' + id).val(data.produt_quantity);
                    $('#name_cart_product').text(data.report);
                    $('#add-to-cart-confirm').modal('show');

                    setTimeout(() => {
                        $('#add-to-cart-confirm').modal('hide');
                    }, 2000);
                }
                $('#lbl_quantity').text('(' + data.quantity + ')');
                $('#quantity' + id).val(data.produt_quantity);
                $('#lbl-quantity-info').text(data.quantity);
                $('#price_product_all_' + id).text(formatNumber(data.price_product_all) + ' VND');
                $('#total_price').text(formatNumber(data.total_price) + ' VND');
                $('#btn-cart-shopping').prop('title', 'Bạn hiện đang có ' + data.quantity + ' sản phẩm trong giỏ hàng')

            }
        });
    });
    $('.txt_quantity').click(function() {
        $(this).select();
    });
    $('.txt_quantity').keyup(function() {
        var quantity = $(this).val();
        var id = $(this).data("id");
        if (quantity <= 0) {
            $('#name_cart_product').text("Số lượng sản phẩm bạn nhập phải lớn hơn 0 hoặc đang trống bạn vui lòng bôi đen hoặc click vào ô số lượng của sản phẩm muốn thay đổi");
            $('#add-to-cart-confirm').modal('show');
            $('#quantity' + id).val(1);
            setTimeout(() => {
                $('#add-to-cart-confirm').modal('hide');
            }, 2000);
        } else if (isNaN(quantity)) {
            $('#name_cart_product').text("Số lượng sản phẩm phải là số");
            $('#add-to-cart-confirm').modal('show');
            $('#quantity' + id).val(1);
            setTimeout(() => {
                $('#add-to-cart-confirm').modal('hide');
            }, 2000);
        } else {
            $.ajax({
                url: "change-quantity",
                method: "POSt",
                data: {
                    id: id,
                    quantity: quantity,
                    _token: $(this).data('token')
                },
                success: function(data) {
                    if (data.report) {
                        $('#name_cart_product').text(data.report);
                        $('#add-to-cart-confirm').modal('show');
                        $('#quantity' + id).val(data.produt_quantity);
                        setTimeout(() => {
                            $('#add-to-cart-confirm').modal('hide');
                        }, 2000);
                    }
                    $('#lbl_quantity').text('(' + data.quantity + ')');
                    $('#quantity' + id).val(data.produt_quantity);
                    $('#lbl-quantity-info').text(data.quantity);
                    $('#price_product_all_' + id).text(formatNumber(data.price_product_all) + ' VND');
                    $('#total_price').text(formatNumber(data.total_price) + ' VND');
                    $('#btn-cart-shopping').prop('title', 'Bạn hiện đang có ' + data.quantity + ' sản phẩm trong giỏ hàng');
                }
            });
        }
    });
    //choosing city
    $('#city_obtion').on('change', function() {
        $('#city_input').val($(this).val());
        $('#modal_city').modal('hide');
    });
    //Buy with COD payment
    $('#Checkout_form_submit').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        var _token = $('input[name="_token"]').val();
        if (formData.get('name') == "") {
            $('#name_cart_product').text("Bạn vui lòng nhập Họ tên của bạn");
            $('#add-to-cart-confirm').modal('show');
            setTimeout(() => {
                $('#add-to-cart-confirm').modal('hide');
            }, 2000);
        } else if (formData.get('landmark') == "") {
            $('#name_cart_product').text("Bạn vui lòng nhập địa chỉ giao hàng");
            $('#add-to-cart-confirm').modal('show');
            setTimeout(() => {
                $('#add-to-cart-confirm').modal('hide');
            }, 2000);
        } else if (formData.get('number') == "") {
            $('#name_cart_product').text("Bạn vui lòng nhập số điện thoại");
            $('#add-to-cart-confirm').modal('show');
            setTimeout(() => {
                $('#add-to-cart-confirm').modal('hide');
            }, 2000);
        } else if (isNaN(formData.get('number'))) {
            $('#name_cart_product').text("Số điện thoại của bạn phải là số");
            $('#add-to-cart-confirm').modal('show');
            setTimeout(() => {
                $('#add-to-cart-confirm').modal('hide');
            }, 2000);
        } else {
            $('#loading').modal('show');
            $.ajax({
                url: "pay-cod",
                method: "POSt",
                data: {
                    name: formData.get('name'),
                    phone_number: formData.get('number'),
                    email: formData.get('email'),
                    address: formData.get('landmark'),
                    _token: _token
                },
                success: function(data) {
                    $('#loading').modal('hide');
                    $('#name_cart_product').text(data.report);
                    $('#add-to-cart-confirm').modal('show');
                    setTimeout(() => {
                        $('#add-to-cart-confirm').modal('hide');
                        window.location.replace(data.route);
                    }, 3000);
                }
            });
        }

    });
    $('#btn-none-delivery').on('click', function() {
        $('#name_cart_product').text("Bạn Chưa có sẳn địa chỉ trong thông tin cá nhân vui lòng nhập địa chỉ của bạn trong thông tin giao hàng");
        $('#add-to-cart-confirm').modal('show');
        setTimeout(() => {
            $('#add-to-cart-confirm').modal('hide');
        }, 2000);
    });

});
