$(document).ready(function() {
    $('#modal-root-delete').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var name = button.data('name');
        $('#id_root_del').val(id);
        $('#delete-report').text(name);
    });
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
    $('.btn-delete-root').on('click', function() {
        var id = $('#id_root_del').val();
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: "admin/delete-root",
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
                    $('table tbody #tb-group' + id).hide();
                }
            }
        });
    });
})