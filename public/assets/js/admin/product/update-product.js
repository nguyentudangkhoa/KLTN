$(document).ready(function() {
    $('#modal-update-default').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var name = button.data('name');
        var price = button.data('price');
        var quantity = button.data('quantity');
        var description = button.data('description');

        $('#id_product').val(id);
        $('#update-name').val(name);
        $('#update-price').val(price);
        $('#update-quantity').val(quantity);
        $('#description').val(description);
    });
    $('.btn-update').on('click', function() {
        $('#id_product').val($(this).data('id'));
        $('#update-name').val($(this).data('name'));
        $('#update-price').val($(this).data('price'));
        $('#update-quantity').val($(this).data('quantity'));
        $('#description').val($(this).data('description'));
    });
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
    var datetime = function() {
        var today = new Date();
        var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
        var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
        return date + ' ' + time;
    }
    $('.form-update-product').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        alert(formData.get('productname'));
        var _token = $('input[name="_token"]').val();
        if (formData.get('productname') == "") {
            Toast.fire({
                icon: 'error',
                title: 'Tên sản phẩm không được để trống.'
            });
        } else if (formData.get('productprice') == "") {
            Toast.fire({
                icon: 'error',
                title: 'Giá sản phẩm không được để trống.'
            });
        } else if (isNaN(parseInt(formData.get('productprice')))) {
            Toast.fire({
                icon: 'error',
                title: 'Giá sản phẩm phải là số.'
            });
        } else if (formData.get('productquantity') == "") {
            Toast.fire({
                icon: 'error',
                title: 'Số lượng sản phẩm không được để trống.'
            });
        } else if (isNaN(parseInt(formData.get('productquantity')))) {
            Toast.fire({
                icon: 'error',
                title: 'Số lượng sản phẩm phải là số.'
            });

        } else {
            $.ajax({
                url: "admin/update-products",
                method: "put",
                data: {
                    id: $('#id_product').val(),
                    name: formData.get('productname'),
                    price: formData.get('productprice'),
                    quantity: formData.get('productquantity'),
                    unit: formData.get('productunit'),
                    category: formData.get('productcategory'),
                    description: formData.get('description'),
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
