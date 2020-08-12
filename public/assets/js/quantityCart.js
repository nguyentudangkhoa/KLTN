$(document).ready(function(c) {
    $('.close1').on('click', function(c) {
        $('.rem1').fadeOut('slow', function(c) {
            $('.rem1').remove();
        });
    });
    $('.close2').on('click', function(c) {
        $('.rem2').fadeOut('slow', function(c) {
            $('.rem2').remove();
        });
    });
    $('.close3').on('click', function(c) {
        $('.rem3').fadeOut('slow', function(c) {
            $('.rem3').remove();
        });
    });
});
