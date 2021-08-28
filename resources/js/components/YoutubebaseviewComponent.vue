<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Youtubebiew Component</div>
          <div class="card-body">
            <ul>
              <li>{{youtube}}</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default{
    data: function(){
        return {
            //コントローラから渡された値を格納する。
            items:[],
            youtube:"youtuebeです"
        }
    },
    methods: {
        itemadd(){
            this.items = [{"message":"Foo"},{"message":"Bar"}];
            console.log(this.items);
        },
        gettarekomis(){
            axios.get('api/tarekomiapi')
                .then((res) => {
                    // テーブルに格納されている値をtarekomisに入れる
                    this.tarekomis = res.data;
                    console.log(this.tarekomis);
                })
            .catch(function (error) {
                console.log("test");
            })
        },
    },
    mounted(){
            // DOM作成後に呼び出される。
            //this.gettarekomis();
            this.itemadd();
            this.gettarekomis();
        }
}
</script>
