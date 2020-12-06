$(document).ready(function() {
    $('#modal-default-rating').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var idPro = button.data('idproduct');
        $('#id_bill').val(id);
        $('#id_pro').val(idPro);
    });
    $('#form-rating').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        var _token = $('input[name="_token"]').val();
        if (formData.get('rating') == null) {
            alert('Bạn vui lòng chọn mức đánh giá');
        } else {
            $.ajax({
                url: "rating",
                method: "post",
                data: {
                    id: formData.get('id_bill'),
                    rating: formData.get('rating'),
                    idPro: formData.get('id_pro'),
                    _token: _token
                },
                success: function(data) {
                    if (data.report) {
                        alert(data.report);
                    } else if (data.success) {
                        alert(data.success);
                    }
                }
            });
        }
    })
})