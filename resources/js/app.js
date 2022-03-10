require('./bootstrap');
// https://www.themoviedb.org/settings/api
// 15b6c53c504f98c42f7cd3f0da4bb121
$(document).ready(function(){
    $("input").keyup(function(){

    });
    $('.search_icon').click(function (){
        let prefix = $('.search_input').val();
        let _token   = $('meta[name="csrf-token"]').attr('content');
        console.log(_token)
        console.log("clicked")
        $.ajax({
            type:'POST',
            url:'/api',
            data:{search:prefix,_token:_token},

            success:function(data) {
                console.log(data)
            }
        });
   })
});
