
require('./bootstrap');
jQuery(function($){
    $(".btn").on('click',function(){
        $.ajax({url:"../../app/Cron/update.php", success:function(result){
            $("div").text(result);}
        })
    });
    console.log("hello");
});
