<template>
  <ul class="channels" id="channels">
  
    <li class="channel_section channel_section_achtive pickup" data-id='pickup'>
      <!-- デフォルトでアンダーライン -->
      <div class="">ピックアップ</div>
      <!-- <img src="https://i.ytimg.com/vi/fv9Iz0CWpPk/default.jpg" alt=""> -->
    </li>
    <li class="channel_section" data-id='japan'>
      <div>日本</div>
    </li>
    <li class="channel_section" data-id='abroad'>
      <div>海外</div>
    </li>
    <li class="channel_section" data-id='admin-youtube'>
      <div class=""> prodoku管理人youtube</div>
    </li>
    <li class="channel_section" data-id='another'>
      <div class="">その他</div>
    </li>
  </ul>
  <!-- 上記のデータを出し分ける。帰ってきた値をfor文かforeachで回す。 -->
  <ul class="top_items">
  </ul>
  <ul class="test">
    <li>
      <router-link to="/example">example</router-link>
    </li>
  </ul>
</template>

<script>



export default{
    data: function(){
        return {
            // axiosでテーブルに保存されている値を格納する。初期は何も入れない
            // おすすめ書籍にアンダーラインを引くためにクラスの付与-first_contactclass-他のボタンを押下したらremove
            items:[],
            tarekomis :[],
            qiitas :[],
        }
    },
    methods: {
        getQiitaapi(){
          axios.get("api/qiitaapi")
                .then((res) => {
                  console.log(res.data);
                  this.qiitas = res.data;
                })
                .catch(function (error) {
                console.log("エラー");
            })
        },
        gettarekomis(){
            axios.get('api/tarekomiapi')
                .then((res) => {
                    // テーブルに格納されている値をtarekomisに入れる
                    this.tarekomis = res.data;
                    //console.log(this.tarekomis);
                })
            .catch(function (error) {
                console.log("test");
            })
        },
    },
    mounted:function(){
            // DOM作成後に呼び出される。
            //this.gettarekomis();
            jQuery(function($){
                // サーバーへの負荷を軽くするために一度訪問したページはストックしておく。
              　// デフォルトではpickupが入る。
              let Changeanimation = require("../class/index");
              // ジャンルをクリックしたらその部分に黒い下線を追加する処理。
                page_choice("pickup");
                $(".channel_section").on('click',function(){
                  $(".channel_section").attr("class","channel_section channel_section_passive");
                  $(this).attr("class","channel_section channel_section_achtive");
                  var page_name = $(this).data('id');
                  page_choice(page_name);
                });
                //axiosで出しわけする。
                function page_choice(page_name_resurt){
                  // top-items要素を一旦空にする。
                  // parentemptychildappendメソッド
                  $('.top_items').empty();
                  // ローディング処理スタート。
                  $('#channels').append(`<div class="channelarea loading-filter"><div class="loading-circle"></div></div>`);
                  // ページ切り替えの値をこの関数に引数として渡してページ切り替えをする。
                  // レコード数をサーバー側に渡して
                  axios.get(`api/topdata/${page_name_resurt}`, {
                    params: {
                      page: page_name_resurt,
                    }
　　　　　　　　　　　})
                  .then((res) => {
                    // ここにサーバー側で帰ってきた処理を書くデータがあるはずなのでview側を整形する処理もここに書く。
                    // 帰ってきた値を配列に格納
                      //console.log("値は"+res.data);
                      const items = [
                        {id:'fv9Iz0CWpPk'},
                        {id:'HpdO5Kq3o7Y'},
                        {id:'QOjmvL3e7Lc'},
                        {id:'j8JNpKgVkuc'},
                        {id:'uhp-LKQIbno'}
                      
                      ];
                      //item_stock.push(page_name_resurt);
                      console.log(res);
                      // この中で配列を回してliを配列の数だけtop_itemsに追加、appendする。
                      server_responce_append_object(items);
                      //Changeanimation.server_responce_append_object(items,`<li class="top_item"><img src="https://i.ytimg.com/vi/${id}/hqdefault.jpg" alt=""></li>`);
                      $.each(items,function(index,item){
                          // itemは各連想配列item.idで中身を出力する。
                          const id = item.id;
                          const viewname = 'tarekomi';
                          $('.top_items').append(`<li class="top_item"><a href="{{ route(${viewname}) }}" ><img src="https://i.ytimg.com/vi/${id}/hqdefault.jpg" alt=""></a></li>`);
                      })
                      $(".channelarea").remove();
                  })
                  // 上記処理完了したらローディング処理終了の処理を書いてローディングを消す。
                  //.then($(".loading-filter").remove())
                  .catch(function (error) {
                  console.log("エラー");
                  });
                }
                //スクロール関数
                $('.top_wrap').scroll(function(){
                  console.log("スクロール")
                });
                //帰ってきたオブジェクトをhtmlに追加する関数。
                function server_responce_append_object(object,tag,childtag){
                }
                // itemをストックするための自作関数、item_stockがfalseの時に実行する。
            });
    }
}

</script>
