$(document).ready(function() {
    $('#modal-un-diss').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var name = button.data('name')
        $('#id-en').val(id);
        $('#disable-report').val(name);
    });
    $('.btn-un-dis').on('click', function() {
        $('#id-en').val($(this).data('id'));
    });
    $('.btn-en-pro').on('click', function() {
        var id = $('#id-en').val();
        var _token = $('input[name="_token"]').val();
        var table = $('#table').val();
        $.ajax({
            url: "admin/en-product",
            method: "put",
            data: {
                id: id,
                _token: _token
            },
            success: function(data) {
                alert(data.success);
                $('#enable' + id).css('display', 'block');
                $('#disable' + id).css('display', 'none');
                $('#modal-un-diss').modal('hide');
            }
        });
    })
    $('.btn-en-cate').on('click', function() {
        var id = $('#id-en').val();
        var _token = $('input[name="_token"]').val();

        $.ajax({
            url: "admin/en-category",
            method: "put",
            data: {
                id: id,
                _token: _token
            },
            success: function(data) {
                alert(data.success);
                $('#enable' + id).css('display', 'block');
                $('#disable' + id).css('display', 'none');
                $('#modal-un-diss').modal('hide');
            }
        });
    })
    $('.btn-en-root').on('click', function() {
        var id = $('#id-en').val();
        var _token = $('input[name="_token"]').val();

        $.ajax({
            url: "admin/en-root",
            method: "put",
            data: {
                id: id,
                _token: _token
            },
            success: function(data) {
                alert(data.success);
                $('#enable' + id).css('display', 'block');
                $('#disable' + id).css('display', 'none');
                $('#modal-un-diss').modal('hide');
            }
        });
    })
    $('.btn-en-unit').on('click', function() {
        var id = $('#id-en').val();
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: "admin/en-unit",
            method: "put",
            data: {
                id: id,
                _token: _token
            },
            success: function(data) {
                alert(data.success);
                $('#enable' + id).css('display', 'block');
                $('#disable' + id).css('display', 'none');
                $('#modal-un-diss').modal('hide');
            }
        });
    })
    $('.btn-en-user').on('click', function() {
        var id = $('#id-en').val();
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: "admin/en-user",
            method: "put",
            data: {
                id: id,
                _token: _token
            },
            success: function(data) {
                alert(data.success);
                $('#enable' + id).css('display', 'block');
                $('#disable' + id).css('display', 'none');
                $('#modal-un-diss').modal('hide');
            }
        });
    })
})
