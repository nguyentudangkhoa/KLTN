$(document).ready(function() {
    $('#modal-sm-delete-bill').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var name = button.data('name');
        $('#id-bill').val(id);
        $('#delete-report').text(name);
    });
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
    $('#delete-bill-btn').on('click', function() {
        var id = $('#id-bill').val();
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: "admin/delete-bill",
            method: "put",
            data: {
                id: id,
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
                    $('table tbody #tb-bill' + id).hide();
                }
            }
        });
    })
})
