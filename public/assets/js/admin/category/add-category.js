$(document).ready(function() {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
    $('#form-add-category').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        var id = formData.get('id_product');
        var _token = $('input[name="_token"]').val();
        if (formData.get('name') == "") {
            Toast.fire({
                icon: 'error',
                title: 'Tên danh mục không được để trống.'
            });
        } else if (formData.get('total_category') == null) {
            Toast.fire({
                icon: 'error',
                title: 'Bạn vui lòng chọn danh mục tổng.'
            });
        } else {
            $.ajax({
                url: "admin/add-category",
                method: "post",
                data: {
                    id: id,
                    name: formData.get('name'),
                    root: formData.get('total_category'),
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
});
