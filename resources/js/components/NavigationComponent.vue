<template>
  <ul class="channels" id="channels">
    <li class="channel_section channel_section_achtive">
      <!-- デフォルトでアンダーライン -->
      <div class="">ピックアップ</div>

    </li>
    <li class="channel_section">
      <div>日本</div>
    </li>
    <li class="channel_section">
      <div>海外</div>
    </li>
    <li class="channel_section">
      <div class=""> prodoku管理人youtube</div>
    </li>
    <li class="channel_section">
      <div class="">その他</div>
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
                $(".channel_section").on('click',function(){
                  $(".channel_section").attr("class","channel_section channel_section_passive");
                  $(this).attr("class","channel_section channel_section_achtive");
                });
            });
    }
}

</script>
