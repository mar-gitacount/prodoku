
jQuery(function($){
  $("#search_megane").on('click',function(){
    $("#search_megane").toggleClass("search_achtive");
    $(".search_wrap")
  });
  $(".navbar-toggler").on('click',function(){
    console.log("test");
  });
});
