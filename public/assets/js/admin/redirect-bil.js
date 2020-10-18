$(document).ready(function() {
    $('.redirect-bill').on('click', function() {
        window.location.replace($(this).data('route'));
    })
})
