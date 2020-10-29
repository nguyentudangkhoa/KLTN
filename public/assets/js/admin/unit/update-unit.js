$(document).ready(function() {
    $('#modal-update-unit').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var name = button.data('name')
        $('#id-unit').val(id);
        $('#update-name').val(name);
    });
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
    $('#form-update-unit').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        var _token = $('input[name="_token"]').val();
        if (formData.get('name') == "") {
            Toast.fire({
                icon: 'error',
                title: 'Tên đơn vị không được để trống.'
            });
        } else {
            $.ajax({
                url: "admin/update-unit",
                method: "put",
                data: {
                    id: formData.get('id_unit'),
                    name: formData.get('name'),
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
    })
})
