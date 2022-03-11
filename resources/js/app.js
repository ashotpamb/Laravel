require('./bootstrap');
// https://www.themoviedb.org/settings/api
// 15b6c53c504f98c42f7cd3f0da4bb121
$(document).ready(function () {
    $("input").keyup(function () {

    });


    $('.search_icon').click(function () {
        let prefix = $('.search_input').val();
        $(".data-from-api").empty();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(".data-from-api").append("<h1>Movie list</h1>")
        $.ajax({
            method: 'post',
            url: '/api',
            data: {search: prefix},
            success: function (data) {
                console.log(data)
                $.each(data.data.results, function (key, value) {
                    $(".data-from-api").append("<a href='/info?id=" + value.id + "&prefix=" + prefix + "'calss = 'movie-info'>" + value.original_title + "</a>")
                })
            },
            timeout: 5000,
        })
    });
})
