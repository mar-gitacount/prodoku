<template>
  <ul class="channels" id="channels">
  
    <li class="channel_section channel_section_achtive pickup" @click="getpageitems(pickup='pickup')" data-id='pickup'>
      <!-- デフォルトでアンダーライン -->
      <div class="">本日の北斎漫画</div>
      <!-- <img src=" {{ secure_asset('/storage/hokusaimannga08.gif') }}" alt=""> -->
      <!-- <img alt="ロゴ" src="{{ asset('/img/logo.png') }}"> -->
    </li>
    <!-- <li class="channel_section" data-id='news'>
      <div>北斎ニュース</div>
    </li> -->
    <li class="channel_section" data-id='why'>
      <div class="">北斎漫画日和について</div>
    </li>
    <li class="channel_section" data-id='admin-youtube'>
      <div class="">管理人youtube</div>
    </li>
  </ul>
  <!-- 上記のデータを出し分ける。帰ってきた値をfor文かforeachで回す。 -->
    <div class="choice_items_observer">
    </div>
  <ul class="top_items">
  <!-- 監視する要素↓↓ -->
  </ul>
  <div class="choice_items_observer" v-if="bunki">
    <ul class="choice_items"  v-for="item in items" :key="item.id">
      <li>{{item.id}}</li>
    </ul>
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

var AWS = require('aws-sdk');
var s3 = new AWS.S3();
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
            image:null
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
          // 実行するとitemsに一覧を入れる。vueではv-forで回す。
          this.bunki = true;
          this.page += 10;
          // ここでパラメータを渡してバックエンドと応答する。
          console.log(this.page);
          // this.items = [
          //               {id:'fv9Iz0CWpPk'},
          //               {id:'HpdO5Kq3o7Y'},
          //               {id:'QOjmvL3e7Lc'},
          //               {id:'j8JNpKgVkuc'},
          //               {id:'uhp-LKQIbno'},
          // ];
          // this.image = "https://s3-ap-northeast-1.amazonaws.com/masarubucket/hokusaimanga/1c441d4608219327e193f9bce72b8e38.jpg";
          // document.getElementById("hokusaiimage").src = "https://s3-ap-northeast-1.amazonaws.com/masarubucket/hokusaimanga/1c441d4608219327e193f9bce72b8e38.jpg";
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
              console.log("yes");
            })
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
                    console.log("タレコミapiです")
                    console.log(this.tarekomis);
                })
            .catch(function (error) {
                console.log("test");
            })
        },
    },
    mounted:function(){
        // this.getitems();
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
            this.gettarekomis();
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
                  $(".choice_items").empty();
                  // ローディング処理スタート。
                  $('#channels').append(`<div class="channelarea loading-filter"><div class="loading-circle"></div></div>`);
                  // ページ切り替えの値をこの関数に引数として渡してページ切り替えをする。
                  // レコード数をサーバー側に渡して
                  // if(page_name_resurt === "why"){
                  //   // 北斎漫画日和についての概要を差し込んでreturn
                    
                  //   $(".channelarea").remove();
                  //   return;
                  // }
                  switch(page_name_resurt){
                    case "why":
                      console.log("why");
                      $(".channelarea").remove();
                      return;
                    case "admin-youtube":

                      console.log("youtuebe!");
                      $(".channelarea").remove();
                      return;
                  }
                  axios.get(`api/tarekomiapi.show/${page_name_resurt}`, {
                    params: {
                      page: page_name_resurt,
                    }
                  })
                  .then((res) => {
                      // ここにサーバー側で帰ってきた処理を書くデータがあるはずなのでview側を整形する処理もここに書く。
                      const items = [
                        {id:"1c441d4608219327e193f9bce72b8e38.jpg"},
                        {id:"1c441d4608219327e193f9bce72b8e38.jpg"},
                        {id:"1c441d4608219327e193f9bce72b8e38.jpg"},
                      ]
                      //item_stock.push(page_name_resurt);
                      //this.gettest();
                      console.log(res);
                      $.each(items,function(index,item){
                          // itemは各連想配列item.idで中身を出力する。
                          const id = item.id;
                          const viewname = 'tarekomi';
                          // $('.top_items').append(`<li class="top_item"><a href="{{ route(${viewname}) }}" ><img src="https://i.ytimg.com/vi/${id}/hqdefault.jpg" alt=""></a></li>`);
                          $('.top_items').append(`<li class="top_item"><a href="{{ route(${viewname}) }}" ><img src="https://s3-ap-northeast-1.amazonaws.com/masarubucket/hokusaimanga/${id}" alt=""></a></li>`);
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
