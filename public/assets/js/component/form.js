$(document).ready(function() {
    $('.submit_form_product').submit(function(e) {
        e.preventDefault();
        var _token = $('input[name="_token"]').val();
        var id = $(this).data('id')
        var price = $('#price' + id).text();
        var price_replace = price.replace(",", "")
        var price_array = price_replace.split(" ");
        var product_price = parseInt(price_array[0])

        alert(product_price);
    });
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
                    _token: _token
                },
                success: function(data) {
                    if (data.report == "Thông tin đăng nhập sai hoặc tài khoản không tồn tại" || data.report == "Email không hợp lệ" || data.report == "Password phải trên 6 ký tự") {
                        alert(data.report);
                    } else {
                        alert(data.report);
                        $('#myModal1').modal('hide');
                        $('#info_user_login').css('display', 'none');
                        $('#info_user_signup').css('display', 'none');
                        $('#info_user_email').css('display', 'block');
                        $('#user_email_show').text(data.name);
                        $('#info_user_logout').css('display', 'block');
                    }
                }
            });
        }
    });
    $('#form_signup').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        var name = formData.get('user_name'); //user name
        var email = formData.get('user_email'); //email
        var password = formData.get('user_password'); //password
        var conf_pass = formData.get('conf_pass');
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
        } else {
            $('#sign-up-status').css('display', 'block');
            $('#img-loading-sign-up').css('display', 'block');
            $('#sign-up-status').text('Xin vui lòng chờ một lúc để có thể nhận mail xác nhận đăng ký!');
            $.ajax({
                url: "send-mail-signup",
                method: "POSt",
                data: {
                    name: name,
                    email: email,
                    password: password,
                    gender: formData.get('gender'),
                    _token: _token
                },
                success: function(data) {
                    if (data.report == "Tài khoản đã tồn tại") {
                        $('#img-loading-sign-up').css('display', 'none');
                        alert(data.report);
                    } else {
                        $('#img-loading-sign-up').css('display', 'none');
                        alert(data.report);
                        $('#sign-up-status').text('Xin vui lòng check mail để hoàn tất đăng ký!');
                    }
                }
            });
        }
    });
    $('#close-form-sign-up').click(function() {
        $('#txt_user_name_up').css('display', 'none');
        $('#txt_user_email_up').css('display', 'none');
        $('#txt_user_password_up').css('display', 'none');
        $('#txt_user_cof_pass').css('display', 'none');
        $('#txt_user_cof_gender').css('display', 'none');
        $('#sign-up-status').css('display', 'none');
    })
});