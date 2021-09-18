<template>
  <ul class="top_items"></ul>
  <div class="choice_items_observer"></div>
</template>
<script>
// ジャンル毎にjsonファイルを書き換える。
import hokusai from"../../json/HokusaiDayOfWeekjsons/gunlejsonfiles/animal.json";
var AWS = require('aws-sdk');
var s3 = new AWS.S3();
export default{
    data: function(){
        return {
            // axiosでテーブルに保存されている値を格納する。初期は何も入れない
            // おすすめ書籍にアンダーラインを引くためにクラスの付与-first_contactclass-他のボタンを押下したらremove
            items:[],
            youtube:false,
            tarekomis :[],
            qiitas :[],
            fullheight: window.innerHeight,
            choice_items_observer : null,
            page : 0,
            image:null,
        }
    },
    created() {
      window.addEventListener("scroll", this.handleScroll);
    },
    destroyed() {
      window.removeEventListener("scroll", this.handleScroll);
    },
    methods: {
        getitems(){
          this.page += 10;
          // ここでパラメータを渡してバックエンドと応答する。
          if(20 < this.page){
            const value = { id: '999'};
            for(var i = 0; i<9; i++){
              this.items.push(value);
            }
          }
          axios.get("api/tarekomiget") 
              .then((res)=> {
                // console.log(res.data);
                //this.data = res.data;
          })
              .catch(function (error) {
                // console.log("エラー");
              })
        },
        getpageitems(page){
          axios.get(`api/topdata/${page}`, {
                    params: {
                      page: page,
                    }
          }).then((res) => {
              // console.log(res);
              // console.log("yes");
            })
        },
        screenresize(){
          this.fullheight = window.innerHeight+'px';
          // console.log(this.fullheight);
        },
        destroyed() {
          window.removeEventListener("scroll", this.handleScroll);
        },
        gettarekomis(){
            axios.get('api/tarekomiapi')
                .then((res) => {
                    // テーブルに格納されている値をtarekomisに入れる
                    this.tarekomis = res.data;
                    // console.log("タレコミapiです")
                    // console.log(this.tarekomis);
                })
            .catch(function (error) {
                // console.log("test");
            })
        },
    },
    mounted:function(){
        jQuery(function($){
          $(".under_line").attr("class","delete_line");
          $(".channel_section").on('click',function(){
            $(".channel_section").attr("class","channel_section channel_section_passive");
            var page_name = $(this).data('id');
            $(this).attr("class",`channel_section channel_section_achtive ${page_name}`);
          });
          var path = location.pathname
          if(path == "/animal"){
            $("#animal").addClass("channel_section_achtive");
          }
          let page = 0;
          // 各種<li>messageアイテムの高さ配列に格納してみる
          let top_item_heights = [];
          function pageappend(){
            // console.log(page);
            for(var i = page; i < page + 10; i++){
              // const hokusaiobject = hokusai[i];
              // console.log(hokusai[i]);
              // jsonファイルの中身があるかどうか判定する。
              if(hokusai[i] == undefined){
                // 「終了です。」クラスが存在しない場合「終了です。」タグを追加する。
                if(!$('li').hasClass('end_item')) {
                  $('.top_items').append(`<li class="end_item">`+"終了です。"+`</li>`);
                }
                return;
              }
              $('.top_items').append(`<li id = "${i}" class="top_item">`+`<div class=img_wrap>`+`<img id = "img${i}" alt="">`+`</div>`+`<div>`+`<p class="title_name">` + hokusai[i].name + `</p>`+`<p class="common_message message${i}">` + hokusai[i].message + `</p>`+`<p class="readmore-btn${i} click-btn click-btn-status">`+"続きを読む"+`</p>` + `</div>`+`</li>`);
              document.getElementById(`img${i}`).src=hokusai[i].img;
              $(`.message${i}`).innerText = hokusai[i].message;
              var messageHeight =  $(`.message${i}`).height();
              top_item_heights.push(messageHeight);
              var lineHeight = parseFloat($(`.common_message`).css('line-height'));
              var lineNum = 4;
              var messageNewHeight = lineHeight * lineNum;
              // 各messageの高さ-隠す文messageに引いた分の値を足し合わせる。
              // console.log(messageHeight+'は元々のメッセージの高さ'+messageNewHeight+'は比べる値の高さ');
              if (messageHeight < messageNewHeight){
                $(`.readmore-btn${i}`).css({
                  'display':'none',
                    'text-align': 'center'
                  });
              }else{
                $(`.message${i}`).css({
                  // messageオブジェクトは96pxに変更されて、それを超えている文章をhiddenを使って隠している。
                  'height':messageNewHeight,
                  'overflow':'hidden'
                });
                $(`.readmore-btn${i}`).css({
                  'text-align': 'center'
                  });
                $(`.readmore-btn${i}`).click(function(eo){
                  let message = $(this).prev();
                  let current_parent_top_item = message.closest(".top_item");
                  // 補完してた引いた分のheightを取り出す。
                  let current_parent_top_item_arraynum = top_item_heights[Number(current_parent_top_item[0].id)];
                  // 現段階のmessageのheightを取り出して上記の値を足す
                  let messageheight = message.height();
                  // console.log(top_item_heights[current_parent_top_item_arraynum]);
                  let text = $(this)[0].innerText;
                  let html = $(this)[0].innerHTML;
                  if(text == "続きを読む"){
                    $(this)[0].innerText = "閉める";
                    let final_message_height =  current_parent_top_item_arraynum;
                    $(this).toggleClass("click-btn");
                    // console.log(final_message_height);
                    message.css(
                      'height',final_message_height
                    );
                  }else{
                    $(this)[0].innerText = "続きを読む";
                    $(this).toggleClass("click-btn");
                    // クリックした際、画像のところに戻るようにする。※スマホのみ
                    message.css(
                      'height','96px',
                      'overflow','hidden'
                    );
                  }
                });
              }
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
          // console.log({targets});
          io.observe(targets);
        });
    }
}

</script>
