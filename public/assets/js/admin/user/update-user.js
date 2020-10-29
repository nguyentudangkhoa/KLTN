$(document).ready(function() {
    $('#modal-user-update').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var name = button.data('name');
        var phone = button.data('phone')
        $('#id_update_user').val(id);
        $('#update-name').val(name);
        $('#update-phone').val(phone);
    });
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
    $('#form-update-user').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        var _token = $('input[name="_token"]').val();
        if (formData.get('name') == "") {
            Toast.fire({
                icon: 'error',
                title: 'Tên người dùng không được để trống.'
            });
        } else if (formData.get('phone') == "") {
            Toast.fire({
                icon: 'error',
                title: 'Số điện thoại người dùng không được để trống.'
            });
        } else {
            $.ajax({
                url: "admin/update-user",
                method: "put",
                data: {
                    id: formData.get('id'),
                    name: formData.get('name'),
                    role: formData.get('role'),
                    gender: formData.get('gender'),
                    phone: formData.get('phone'),
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
                    }
                }
            });
        }
    });
})