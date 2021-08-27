<template>
  <ul class="channels" id="channels">
  
    <li class="channel_section channel_section_achtive pickup"  @click="getpageitems(pickup='pickup')" data-id='pickup'>
      <!-- デフォルトでアンダーライン -->
      <div class="">ピックアップ</div>
      <!-- <img src=" {{ secure_asset('/storage/hokusaimannga08.gif') }}" alt=""> -->
      <!-- <img alt="ロゴ" src="{{ asset('/img/logo.png') }}"> -->
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
  <div class="" v-if="bunki">
    <ul class="choice_items"  v-for="item in items" :key="item.id">
        <li><img src="storage/hokusaimannga08.gif" alt="">{{item.id}}</li>
    </ul>
  </div>
  
  <!-- 監視する要素↓↓ -->
  <div class="choice_items_observer">
  </div>
  <ul class="test">
    <li>
      <router-link to="/example">example</router-link>
      <!-- tarekomitest -->
    </li>
  </ul>
</template>

<script>
import Changeanimation from '../class/index';



export default{
    data: function(){
        return {
            // axiosでテーブルに保存されている値を格納する。初期は何も入れない
            // おすすめ書籍にアンダーラインを引くためにクラスの付与-first_contactclass-他のボタンを押下したらremove
            items:[],
            bunki : false,
            tarekomis :[],
            qiitas :[],
            fullheight: window.innerHeight,
            choice_items_observer : null,
            page : 0,
        }
    },

    created() {
      window.addEventListener("scroll", this.handleScroll);
    },
    destroyed() {
      window.removeEventListener("scroll", this.handleScroll);
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
        getitems(){
          // 実行するとitemsに一覧を入れる。vueではv-forで回す。
          this.bunki = true;
          this.page += 10;
          // ここでパラメータを渡してバックエンドと応答する。
          console.log(this.page);
          this.items = [
                        {id:'fv9Iz0CWpPk'},
                        {id:'HpdO5Kq3o7Y'},
                        {id:'QOjmvL3e7Lc'},
                        {id:'j8JNpKgVkuc'},
                        {id:'uhp-LKQIbno'},
          ];
          if(20 < this.page){
            const value = { id: '999'};
            this.items.push(value);
          }
          axios.get("api/tarekomiget") 
              .then((res)=> {
                console.log(res.data);
                //this.data = res.data;
          })
              .catch(function (error) {
                console.log("エラー");
              })
        },
        getpageitems(page){
          axios.get(`api/topdata/${page}`, {
                    params: {
                      page: page,
                    }
　　　　　   }).then((res) => {
              console.log(res);
            })
        },
        handleScroll(){
          //channelsを基準にする。
          // const top_items = document.querySelector('.top_items');
          // // 最後の子供を取得することでスクロールし続けても更新し続ける。
          // const childitem = top_items.lastElementChild;
          // const rect = childitem.getBoundingClientRect().bottom;
          // body要素の高さ指定
          // const bodyHeight = document.body.clientHeight;
          // // windowの高さ
          // const windowHeight = window.innerHeight;
          // // スクロール量
          // const currentPos = window.pageYOffset;
          // //body要素とスクロール量を引く
          // const bottomPoint = bodyHeight - currentPos;
          // console.log('子要素'+rect);
          // console.log("スクロール量"+currentPos);
          // console.log(windowHeight);
          // console.log(bodyHeight);
          // if(bottomPoint < currentPos){
          //   console.log("末端");
          // }
        },
        screenresize(){
          this.fullheight = window.innerHeight+'px';
          console.log(this.fullheight);
        },
        destroyed() {
          window.removeEventListener("scroll", this.handleScroll);
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
        this.observer = new IntersectionObserver(entries =>{
            const entry = entries[0]
            if (entry && entry.isIntersecting) {
              console.log('入りました');
              this.getitems();
            }
      　})
        // 監視対象オブジェクト
        const choice_items_observer = document.querySelector('.choice_items_observer');
        this.observer.observe(choice_items_observer);

        window.addEventListener('screenresize', this.screenresize);
        this.screenresize;
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
                  var page_name = $(this).data('id');
                  $(this).attr("class",`channel_section channel_section_achtive ${page_name}`);
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
                        {id:'uhp-LKQIbno'},
                      ];
                      //item_stock.push(page_name_resurt);
                      //this.gettest();
                      console.log(res);
                      // この中で配列を回してliを配列の数だけtop_itemsに追加、appendする。
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
                  console.log("エラー!!");
                  });
                }
            });
    }
}

</script>
