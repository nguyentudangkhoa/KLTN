$(document).ready(function() {
    $('.btn-delete').on('click', function() {
        $('#delete-report').text($(this).data('name'));
    });

});
