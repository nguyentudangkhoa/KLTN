$(document).ready(function() {
    $('#modal-sm-dissall').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var table = button.data('table');
        var name = button.data('name');
        $('#id-diss-tem').val(id);
        $('#table-diss').text(table);
        $('#disable-all').text(name);
    });
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
    $('.btn-dis-all').on('click', function() {
        var id = $('#id-diss-tem').val();
        var name = $('#disable-all').text();
        var table = $('#table-diss').text();
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: "admin/dissable-all",
            method: "put",
            data: {
                id: id,
                table: table,
                name: name,
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
                    $('#enable' + id).css('display', 'none');
                    $('#disable' + id).css('display', 'block');
                }
            }
        });
    })
})
