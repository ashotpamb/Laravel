require('./bootstrap');
// https://www.themoviedb.org/settings/api
// 15b6c53c504f98c42f7cd3f0da4bb121
$(document).ready(function () {
    $("input").keyup(function () {
        $('.preloader').css('display', 'block');
        setTimeout(function () {
            let prefix = $('.search_input').val();
            $(".movie-list").empty();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                method: 'post',
                url: '/search',
                data: {search: prefix},
                beforeSend: function () {
                    $('.preloader').css('display', 'block');
                },
                success: function (data) {
                    // var data = JSON.stringify(data)
                    console.log(data)
                    console.log(data.view)
                    $(".movie-list").html(data.view)
                    $('.preloader').css('display', 'none');
                },
            })
        }, 3000)
    });
})
