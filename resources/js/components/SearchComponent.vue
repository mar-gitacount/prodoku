<template>
    <!-- 検索窓と検索ボタン -->
    <!-- csvファイル内のmessageカラムだけ調べる -->
    <ul class="top_items">
        <li></li>
    </ul>
</template>
<script>
export default{
    mounted:function(){
        jQuery(function($){
            $(".channel_section").attr("class","channel_section channel_section_passive");
            $("#search_wrap").on('click',function(){
                $(this).attr("class","under_line");
            });
            var path = location.pathname
            if(path == "/search"){
                $("#search_wrap").addClass("under_line");
            }
        });
    }
}
</script>
