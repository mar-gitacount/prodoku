<template>
    <!-- <div class="item">{{message}}</div> -->
    <!-- 表示される -->
    <!-- <div>{{tarekomis}}</div> -->
    <!-- 表示される -->
    <!-- <div>{{items}}</div> -->
<!-- 
    <ul v-for="item in items" :key="item.message">
        <li>
            {{item.message}}
        </li>
    </ul> -->

    <!-- タレコミ一覧が表示される。 -->
    <div  v-for="tarekomi in tarekomis" :key="tarekomi.id">
        {{trekomis}}
        <ul v-for="t_item in tarekomi" :key="t_item.id">
            <li>
                {{t_item.id}}
            </li>
            <li>
                {{t_item.title}}
            </li>
            <li>
                {{t_item}}
                <router-link v-bind:to="{name:'tarekomi.show',params:{tarekomiid:tarekomi.id}}">
                    <button class="btn btn-primary">show</button>
                </router-link>
            </li>
        </ul>
    </div>
</template>

<script>
export default{
    data: function(){
        return {
            // axiosでテーブルに保存されている値を格納する。初期は何も入れない
            message:'otintin',
            items:[],
            tarekomis :[]
        }
    },
    methods: {

        itemadd(){
            this.items = [{"message":"Foo"},{"message":"Bar"}];
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
            this.gettarekomis();
            this.itemadd();
        }
}
</script>

