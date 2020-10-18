$(document).ready(function() {
    $('#modal-sm-report').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var name = button.data('name');
        $('#id-tem').val(id);
        $('#disable-report').text(name);
    });

    $('.btn-disable').on('click', function() {
        $('#disable-report').text($(this).data('name'));
        $('#table').val($(this).data('table'));
        $('#id-tem').val($(this).data('id'));
    });
    $('.btn-dis').on('click', function() {
        var id = $('#id-tem').val();
        var _token = $('input[name="_token"]').val();
        var table = $('#table').val();
        $.ajax({
            url: "admin/disable",
            method: "put",
            data: {
                id: id,
                table: table,
                _token: _token
            },
            success: function(data) {
                alert(data.success);
                $('#product-enable' + id).css('display', 'none');
                $('#product-disable' + id).css('display', 'block');
                $('#modal-sm-report').modal('hide');
                $('table tbody #tb-product' + id).hide();
            }
        });
    })
    $('.btn-dis-type').on('click', function() {
        var id = $('#id-tem').val();
        var _token = $('input[name="_token"]').val();
        var table = $('#table').val();
        $.ajax({
            url: "admin/disable-type",
            method: "put",
            data: {
                id: id,
                table: table,
                _token: _token
            },
            success: function(data) {
                alert(data.success);
                $('#category-enable' + id).css('display', 'none');
                $('#category-disable' + id).css('display', 'block');
                $('#modal-sm-report').modal('hide');
                $('table tbody #tb-cate' + id).hide();

            }
        });
    })
    $('.btn-dis-group').on('click', function() {
        var id = $('#id-tem').val();
        var _token = $('input[name="_token"]').val();
        var table = $('#table').val();
        $.ajax({
            url: "admin/disable-group",
            method: "put",
            data: {
                id: id,
                table: table,
                _token: _token
            },
            success: function(data) {
                alert(data.success);
                $('#root-enable' + id).css('display', 'none');
                $('#root-disable' + id).css('display', 'block');
                $('#modal-dis-group').modal('hide');
                $('table tbody #tb-group' + id).hide();
            }
        });
    });
    $('.btn-dis-user').on('click', function() {
        var id = $('#id-tem').val();
        var _token = $('input[name="_token"]').val();
        var table = $('#table').val();
        $.ajax({
            url: "admin/disable-user",
            method: "put",
            data: {
                id: id,
                table: table,
                _token: _token
            },
            success: function(data) {
                alert(data.success);
                $('#user-enable' + id).css('display', 'none');
                $('#user-disable' + id).css('display', 'block');
                $('#modal-sm-report').modal('hide');
            }
        });
    })
    $('.btn-dis-unit').on('click', function() {
        var id = $('#id-tem').val();
        var _token = $('input[name="_token"]').val();
        var table = $('#table').val();
        $.ajax({
            url: "admin/disable-unit",
            method: "put",
            data: {
                id: id,
                table: table,
                _token: _token
            },
            success: function(data) {
                alert(data.success);
                $('#modal-dis-user').modal('hide');
            }
        });
    })
});