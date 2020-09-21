$(document).ready(function() {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
    $("#form-user").on('submit', function(e) {
        e.preventDefault();
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
        }
    });
});