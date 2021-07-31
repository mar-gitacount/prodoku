<template>
  <ul class="channels" id="channels">
    <li class="channel-section"  v-on:click='shoseki=channel_action(shoseki,"/")' v-bind:class="{ channel_section_achtive:shoseki }">
      <!-- デフォルトでアンダーライン -->
      <div class="">おすすめ書籍</div>
    </li>
    <li class="channel-section news" v-on:click='news=channel_action(news)' v-bind:class="{ channel_section_achtive:news}" >
      <div>プログラミングニュース</div>
    </li>
    <li class="channel-section youtube"  v-on:click='youtube=channel_action(youtube)' v-bind:class="{ channel_section_achtive: youtube }">
      <div class=""> prodoku管理人youtube</div>
    </li>
    <li class="channel-section another" v-on:click='another=channel_action(another)' v-bind:class="{ channel_section_achtive: another }">
      <div class="">その他</div>
    </li>
  </ul>
  <ul>

  </ul>
</template>

<script>
// ここでdbの値を呼び出す。デフォルトではqitaapiでおすすめ書籍の呼び出しをする。
export default{
    data: function(){
        return {
            // axiosでテーブルに保存されている値を格納する。初期は何も入れない
            // おすすめ書籍にアンダーラインを引くためにクラスの付与-first_contactclass-他のボタンを押下したらremove
            items:[],
            tarekomis :[],
            qiitas :[],
            shoseki:true,
            news:false,
            youtube:false,
            another:false,
            search:true
        }
    },
    methods: {
        test(e){
            //let e = e.currentTarget.getAttribute('data-id');
            //e = true;
            // news = false;
            //console.log(e.currentTarget.getAttribute('data-id'));
            var et = e.currentTarget.getAttribute('data-id');
            et = false;
            console.log(this.news);
            console.log(et);
            return et;
        },

        channel_action(value,test){
            console.log(test);
            this.shoseki=false;
            this.news=false;
            this.youtube=false;
            this.another=false;
            this.search=false;
            value = true;
            // このメソッドでapi呼び出し関数呼び出しする。引数にurl指定をする。calltoapiとか？
            console.log(value);
            return value;
        },

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
                    // console.log(this.tarekomis);
                })
            .catch(function (error) {
                console.log("test");
            })
        },
    },
    mounted(){
            // DOM作成後に呼び出される。
            this.gettarekomis();
            this.getQiitaapi();
    }
}
</script>
