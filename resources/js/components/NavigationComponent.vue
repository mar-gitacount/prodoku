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
              　// デフォルトではpickupが入る。
                page_choice("pickup");
                $(".channel_section").on('click',function(){
                  $(".channel_section").attr("class","channel_section channel_section_passive");
                  $(this).attr("class","channel_section channel_section_achtive");
                  var page_name = $(this).data('id');
                  page_choice(page_name);
                });
                //axiosで出しわけする。
                function page_choice(page_name_resurt){
                  // li要素を一旦空にする。
                  $('.top_items').empty();
                  // ページ切り替えの値をこの関数に引数として渡してページ切り替えをする。
                  axios.get("api/topdata", {
                    params: {
                      page: page_name_resurt
                      }
　　　　　　　　　　　})
                  .then((res) => {
                    // ここにサーバー側で帰ってきた処理を書くデータがあるはずなのでview側を整形する処理もここに書く。
                    // 帰ってきた値を配列に格納
                      //console.log("値は"+res.data);
                      const items = [
                        {id:'fv9Iz0CWpPk'},
                        {id:'HpdO5Kq3o7Y'},
                        {id:'QOjmvL3e7Lc'}
                      ];
                      // この中で配列を回してliを配列の数だけtop_itemsに追加、appendする。
                      $.each(items,function(index,item){
                          // itemは各連想配列item.idで中身を出力する。
                          const id = item.id;
                          console.log(id);
                          $('.top_items').append(`<li><img src="https://i.ytimg.com/vi/${id}/default.jpg" alt=""></li>`);
                          // $.each(item, function(key,id){
                          //   //console.log("id="+id);
                          //   //console.log("iditem="+id);
                          //   $('.top_items').append('<li><img src=`https://i.ytimg.com/vi/${id}/default.jpg` alt=""></li>')
                          // });
                          // 各itemが入っている。
                          //console.log(item);
                      })
                  })
                  .catch(function (error) {
                  console.log("エラー");
                  });
                }
            });
    }
}

</script>
