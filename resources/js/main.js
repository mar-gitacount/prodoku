
import 'slick-carousel/slick/slick.css'; // 追加
import 'slick-carousel/slick/slick-theme.css'; // 追加
jQuery(function($){
  $("#search_megane").on('click',function(){
    $("#search_megane").toggleClass("search_achtive");
    $(".search_wrap")
  });
  // $(".navbar-toggler").on('click',function(){
  //   $("#app").toggleClass("open");
  // });
  $('.slick').slick({
    autoplay:true,
    arrows: true,
    swipeToSlide: true,
    prevArrow:'<div class="prev">PREV</div>',
    nextArrow:'<div class="next">NEXT</div>',
    responsive: [
        {
            breakpoint:768,
                settings:{
                    prevArrow:'<div class="prev"></div>',
                    nextArrow:'<div class="prev"></div>'
                }
        }
    ]
});
  $(document).click(function(event) {
          if(!$(event.target).closest('.navbar-toggler').length) {
            if($('.ovarlay').hasClass('open')) {
              $(".open").empty();
              $(".ovarlay").toggleClass("open");
            }
          }else{
            // $(".open").slideToggle();
            $(".ovarlay").toggleClass("open");
            $(".open").empty();
            $(".open").append('<ul class="mobile-menu"><li class="mobile-menu-item"><a class="router-link-active router-link-exact-active" href="/" aria-current="page">Home</a></li><li class="mobile-menu-item">Japan_Culture</li><li class = "mobile-menu-item">Topics</li><li class="mobile-menu-item">Next Charenge</li></ul>');

          }
    });
});
