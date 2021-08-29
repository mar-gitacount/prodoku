<template>
  <ul class="top_items">
  </ul>
  <div class="choice_items_observer">
  </div>
</template>

<script>
var AWS = require('aws-sdk');
var s3 = new AWS.S3();
export default{
    data: function(){
        return {
            // axiosでテーブルに保存されている値を格納する。初期は何も入れない
            // おすすめ書籍にアンダーラインを引くためにクラスの付与-first_contactclass-他のボタンを押下したらremove
            items:[],
            bunki : false,
            youtube:false,
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
          if(20 < this.page){
            const value = { id: '999'};
            for(var i = 0; i<9; i++){
              this.items.push(value);
            }
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
        // this.observer = new IntersectionObserver(entries =>{
        //     const entry = entries[0]
        //     if (entry && entry.isIntersecting) {
        //       console.log('入りました');
        //       this.getitems();
        //     }
        // })
        // 監視対象オブジェクト
        // const choice_items_observer = document.querySelectorAll('.top_items');
        // observerにインスタンスが入っている
        // this.observer.observe(choice_items_observer);
        window.addEventListener('screenresize', this.screenresize);
        this.screenresize;
            // DOM作成後に呼び出される。
            this.gettarekomis();
            jQuery(function($){
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
                  // $('.top_items').empty();
                  $(".choice_items").empty();
                  // ローディング処理スタート。
                  $('#channels').append(`<div class="channelarea loading-filter"><div class="loading-circle"></div></div>`);
                  axios.get(`api/tarekomiapi.show/${page_name_resurt}`, {
                    params: {
                      page: page_name_resurt,
                    }
                  })
                  .then((res) => {
                      // ここにサーバー側で帰ってきた処理を書くデータがあるはずなのでview側を整形する処理もここに書く。
                      $(".top_items").empty();
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
                // コールバック関数呼び出されるとIntersectorobsoberの第一引数が呼び出される。
                // 実行後jsonを呼びだしobsoverオブジェクトも追加する。
                const callback = (entries) => {
                  console.log({entries});
                  // entries.foreach((entry) => {
                  //   console.log({entry});
                  // });
                };
                // 監視対象のマージンをとる。-100px圏内に入ったらコールバック関数であるcallback関数を実行する。
                const option = {
                  rootMargin: "100px"
                };
                // ターゲットが閾値に入るたびにコールバック関数が呼び出される。インスタンス
                const io = new IntersectionObserver(callback, option);
                // 監視対象複数、targetをtopitemsにする。
                const targets = document.querySelector('.choice_items_observer');
                console.log({targets});
                io.observe(targets);
            });
    }
}

</script>
