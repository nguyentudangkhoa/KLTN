$(document).ready(function() {
    $('#search').keyup(function() {
        var query = $(this).val();
        if (query != '') {
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "searchList",
                method: "POST",
                data: { query: query, _token: _token },
                success: function(data) {
                    setTimeout(() => {
                        $('#foodList').fadeIn();
                        $('#foodList').html(data);
                    }, 1000);

                }
            });
        } else {
            $('#foodList').html("");
        }
    });
});