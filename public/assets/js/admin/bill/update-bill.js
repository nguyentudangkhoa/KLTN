$(document).ready(function() {
    $('#modal-update-bills').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        $('#id_bill').val(id);
    });
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
    $('#form-update-bill').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        var id = formData.get('id_bill');
        var status = formData.get('status');
        var _token = $('input[name="_token"]').val();
        if (status == null) {
            Toast.fire({
                icon: 'error',
                title: 'Bạn vui lòng chọn trạng thái.'
            });
        } else {
            $.ajax({
                url: "admin/update-bill",
                method: "put",
                data: {
                    id: id,
                    status: status,
                    _token: _token
                },
                success: function(data) {
                    if (data.report) {
                        Toast.fire({
                            icon: 'error',
                            title: data.report
                        });
                    } else if (data.success) {
                        if (data.status == 0 || data.status == 4) {
                            $('.btn-bill-status').css('display', 'none');
                            Toast.fire({
                                icon: 'success',
                                title: data.success
                            });
                        } else {
                            Toast.fire({
                                icon: 'success',
                                title: data.success
                            });
                        }

                    }
                }
            });
        }
    })
});
