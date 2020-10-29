$(document).ready(function() {
    $('#modal-update-total-category').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        $('#id_root').val(id);
    });
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
    $('#form-update-root-category').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        var _token = $('input[name="_token"]').val();
        if (formData.get('name') == "") {
            Toast.fire({
                icon: 'error',
                title: 'Tên danh mục tổng không được để trống.'
            });
        } else {
            $.ajax({
                url: "admin/update-root-category",
                method: "put",
                data: {
                    id: formData.get('id_root'),
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
