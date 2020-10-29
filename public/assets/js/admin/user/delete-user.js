$(document).ready(function() {
    $('#modal-user-delete').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var name = button.data('name');
        $('#id_user_delete').val(id);
        $('#delete-user').text(name);
    });
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
    $('.btn-delete-user').on('click', function() {
        var id = $('#id_user_delete').val();
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: "admin/delete-user",
            method: "delete",
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
                    $('table tbody #tb-user' + id).hide();
                }
            }
        });
    });
})