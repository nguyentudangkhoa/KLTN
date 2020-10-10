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
    $('#form-add-product').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        var _token = $('input[name="_token"]').val();
        if (formData.get('name') == "") {
            Toast.fire({
                icon: 'error',
                title: 'Tên sản phẩm không được để trống.'
            });
        } else if (formData.get('price') == "") {
            Toast.fire({
                icon: 'error',
                title: 'Giá sản phẩm không được để trống.'
            });
        } else if (isNaN(parseInt(formData.get('price')))) {
            Toast.fire({
                icon: 'error',
                title: 'Giá sản phẩm phải là số.'
            });
        } else if (formData.get('quantity') == "") {
            Toast.fire({
                icon: 'error',
                title: 'Số lượng sản phẩm không được để trống.'
            });
        } else if (isNaN(parseInt(formData.get('quantity')))) {
            Toast.fire({
                icon: 'error',
                title: 'Số lượng sản phẩm phải là số.'
            });
        } else if (formData.get('unit') == null) {
            Toast.fire({
                icon: 'error',
                title: 'Vui lòng chọn đơn vị của sản phẩm.'
            });
        } else if (formData.get('category') == null) {
            Toast.fire({
                icon: 'error',
                title: 'Vui lòng chọn loại sản phẩm của sản phẩm.'
            });
        } else if (formData.get('image') == null) {
            Toast.fire({
                icon: 'error',
                title: 'Vui lòng chọn ảnh để upload.'
            });
        } else {
            $.ajax({
                url: "admin/add-products",
                method: "POST",
                data: new FormData(this),
                dataType: "JSON",
                contentType: false,
                cache: false,
                processData: false,
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
                        $('#example1 > tbody').append("<td>" + data.id + "</td><td>" + formData.get('name') + "</td><td>" + formData.get('price') + "</td><td>0</td><td><img src='assets/images/" + data.img + "' width='50px' height='50px'/></td><td>" + formData.get('quantity') + "</td><td>" + formData.get('unit') + "</td><td>" + formData.get('category') + "</td><td>" + datetime() + "</td><td>" + datetime() + "</td><td><div class='btn-group'><button type='button' class='btn btn-info'>Cập nhật</button><button type='button' class='btn btn-warning'>Vô hiệu</button><button type='button' class='btn btn-info'>Xóa</button></div></td>")
                    }
                }
            });
        }
    });
});
