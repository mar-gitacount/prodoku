<template>
    <ul class="slick">
        <li><img art = "画像1" src="https://masarubucket.s3.ap-northeast-1.amazonaws.com/youkai/IMG_4918.JPG" style="width:300px; height:300px;"></li>
        <li><img art = "画像1" src="https://masarubucket.s3.ap-northeast-1.amazonaws.com/youkai/IMG_4918.JPG" style="width:300px; height:300px;"></li>
        <li><img art = "画像1" src="https://masarubucket.s3.ap-northeast-1.amazonaws.com/youkai/IMG_4918.JPG" style="width:300px; height:300px;"></li>
    </ul>

</template>
<script>
import 'slick-carousel';
import 'slick-carousel/slick/slick.css'; // 追加
import 'slick-carousel/slick/slick-theme.css'; // 追加
export default{
    data: function(){
        return {
        }
    },
    created() {
      window.addEventListener("scroll", this.handleScroll);
    },
    destroyed() {
      window.removeEventListener("scroll", this.handleScroll);
    },
    methods: {
    },
    mounted:function(){
        jQuery(function($){
            $('.slick').slick({
                autoplay:true,
            });
        //   $(".channel_section").on('click',function(){
        //     $(".channel_section").attr("class","channel_section channel_section_passive");
        //     var page_name = $(this).data('id');
        //     $(this).attr("class",`channel_section channel_section_achtive ${page_name}`);
        //   });
        var path = location.pathname
        if(path == "/"){
            $(".home").addClass("navbar-current");
        }
        const callback = (entries) => {
            pageappend();
            page += 10;
        };
          // 監視対象のマージンをとる。100px圏内に入ったらコールバック関数であるcallback関数を実行する。
        const option = {
            rootMargin: "100px"
        };
          // ターゲットが閾値に入るたびにコールバック関数が呼び出される。インスタンス
        const io = new IntersectionObserver(callback, option);
        const targets = document.querySelector('.choice_items_observer');
          // console.log({targets});
        io.observe(targets);
        });
    }
}
</script>

