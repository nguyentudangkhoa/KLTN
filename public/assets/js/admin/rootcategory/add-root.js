$(document).ready(function() {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var datetime = function() {
        var today = new Date();
        var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
        var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
        return date + ' ' + time;
    }
    $('.btn-add-root').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        var _token = $('input[name="_token"]').val();
        if (formData.get('name') == null) {
            Toast.fire({
                icon: 'error',
                title: 'Tên danh mục tổng không được để trống.'
            });
        } else {
            $.ajax({
                url: "admin/add-root",
                method: "POST",
                data: {
                    name: formData.get('name'),
                    _token: _token
                },
                success: function(data) {
                    if (data.report) {
                        Toast.fire({
                            icon: 'error',
                            title: data.report
                        });
                    } else {
                        Toast.fire({
                            icon: 'success',
                            title: data.success
                        });
                        $('#example1 > tbody').append("<tr><td>" + data.id + "</td><td>" + formData.get('name') + "</td><td>" + datetime() + "</td><td>" + datetime() + "</td><td><div class='btn-group'><button type='button' class='btn btn-info'>Cập nhật</button><button type='button' class='btn btn-warning'>Vô hiệu</button><button type='button' class='btn btn-info'>Xóa</button></div></td>")
                    }
                }
            });
        }
    })
})