<template>
    <div class="">ニュース一覧</div>
        <ul class="top_items">
        </ul>
        <div class="choice_items_observer">
        </div>
</template>
<script>
    // 記事の見出し、画像をjsonファイルに保存する。
    import news from"../../json/news.json";
    export default{
        data: function(){
            return {
                choice_items_observer : null,
                image:null,
            }
        },
        methods:{
        },
        mounted:function(){
            jQuery(function($){
                $(".channel_section").on('click',function(){
                $(".channel_section").attr("class","channel_section channel_section_passive");
                var page_name = $(this).data('id');
                $(this).attr("class",`channel_section channel_section_achtive ${page_name}`);
                });
                var path = location.pathname
                if(path == "/news"){
                $("#news").addClass("channel_section_achtive");
                }
                let page = 0;
                function pageappend(){
                    for(var i = page; i < page + 10; i++){
                        if(news[i] == undefined){
                            if(!$('li').hasClass('end_item')) {
                                $('.top_items').append(`<li class="end_item">`+"終了です。"+`</li>`);
                            }
                            return;
                        }
                        $('.top_items').append(`<li id = "${i}" class="top_item">`+`<div class=img_wrap>`+`<a id = "link-${i}img" class = "link-${i}" target="_blank">`+`<img id = "img${i}" alt="">`+`</a>`+`</div>`+`<div>`+`<p class="title_name">` +`<a  id= "link-${i}name" class="link-name" target="_blank"> `+ news[i].name +`</a>`+ `</p>`+`<p class="common_message message${i}">` + news[i].message + `</p>`+`</div>`+`</li>`);
                        document.getElementById(`img${i}`).src=news[i].img;
                        document.getElementById(`link-${i}img`).href=news[i].url;
                        document.getElementById(`link-${i}name`).href=news[i].url;
                    }
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
                io.observe(targets);
            });
        }
    }
</script>

