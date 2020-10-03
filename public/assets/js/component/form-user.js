$(document).ready(function() {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
    $('#change_avatar').on('click', function() {
        $('.form-avatar').toggle('slow');
        var $this = $(this);
        $this.toggleClass('toggel-btn-ready');
        if ($this.hasClass('toggel-btn-ready')) {
            $this.text('Cancel');
        } else {
            $this.text('Change Avatar');
        }
    });
    $('#exampleInputFile').change(function(e) {
        var fileName = e.target.files[0].name;
        $('#label-img').text(fileName);
    });
    $("#form-user").on('submit', function(e) {
        e.preventDefault();
        var _token = $('input[name="_token"]').val();
        var form_data = new FormData(this);
        if (form_data.get('inputName') == "") {
            Toast.fire({
                icon: 'warning',
                title: 'Tên của bạn không được để trống.'
            });
        } else if (form_data.get('gender') == null) {
            Toast.fire({
                icon: 'warning',
                title: 'Vui lòng chọn giới tính của bạn.'
            });
        } else if (form_data.get('inputPhone') == "") {
            Toast.fire({
                icon: 'warning',
                title: 'Số điện thoại của bạn không được để trống.'
            });
        } else if (isNaN(parseInt(form_data.get('inputPhone')))) {
            Toast.fire({
                icon: 'warning',
                title: 'Số điện thoại của bạn phải là số.'
            });
        } else if (form_data.get('inputPhone').length < 10 || form_data.get('inputPhone').length > 10) {
            Toast.fire({
                icon: 'warning',
                title: 'Số điện thoại của bạn phải đúng 10 số.'
            });
        } else {
            $.ajax({
                url: "change-profile",
                method: "PUT",
                data: {
                    id: $(this).data('id'),
                    name: form_data.get('inputName'),
                    gender: form_data.get('gender'),
                    phone: form_data.get('inputPhone'),
                    _token: _token
                },
                success: function(data) {
                    if (data.report) {
                        Toast.fire({
                            icon: 'error',
                            title: data.report
                        });
                    } else if (data.success) {
                        Toast.fire({
                            icon: 'success',
                            title: data.success
                        });
                        $('.user-name').text(form_data.get('inputName'));
                    }
                }
            });
        }
    });
    $('#btnAddAddress').on('click', function() {
        var address = $("#inputAddress").val();
        if (address == "") {
            $('#txtAddError').text('Địa chỉ không được trống');
        } else {
            $.ajax({
                url: "add-address",
                method: "POST",
                data: {
                    address: address,
                    _token: $(this).data('token')
                },
                success: function(data) {
                    if (data.report) {
                        Toast.fire({
                            icon: 'error',
                            title: data.report
                        });
                    } else if (data.success) {
                        Toast.fire({
                            icon: 'success',
                            title: data.success
                        });
                        $('#txtAddError').text(data.success);
                        $('#show-address').append('<option >' +
                            address +
                            '</option>')
                    }
                }
            });
        }
    });
});
