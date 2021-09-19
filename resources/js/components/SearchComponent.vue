<template>
    <!-- 検索窓と検索ボタン -->
    <!-- csvファイル内のmessageカラムだけ調べる -->
    <div class="field s-grouped">
        <p class="control">
            <span class="select">
                <select name="select_items" id="">
                    <option selected value="news">浮世絵ニュース</option>
                    <option value = "hokusaimanga">北斎漫画</option>
                </select>
            </span>
        </p>
        <p class="control is-expanded">
            <input placeholder="検索したい概要を左から選んでください。" class="input" type="text">
        </p>
        <p class="control">
            <a class="button is-info colSearch">検索</a>
        </p>
    </div>
    <ul class="top_items">
        <li>
            <!-- 検索結果をここに入れる -->
        </li>
    </ul>
</template>

<script>
export default{
    data: function(){
        return {
            // axiosでテーブルに保存されている値を格納する。初期は何も入れない
            // おすすめ書籍にアンダーラインを引くためにクラスの付与-first_contactclass-他のボタンを押下したらremove
            csvfile:['test','test2'],
            csvCols: [],
            searchKeyword: null,
            csvPathList:[
                {btnName:'data1',csvPath:'/csv/article.csv'}
            ]
        }
    },
    methods: {
    },
    mounted:function(){
        jQuery(function($){
            $(".channel_section").attr("class","channel_section channel_section_passive");
            $("#search_wrap").on('click',function(){
                $(this).attr("class","under_line");
            });
            var path = location.pathname
            if(path == "/search"){
                $("#search_wrap").addClass("under_line");
            }
            $(".colSearch").on('click',function(){
                // userが入力した文字を取得する。
                const inputvalue = $('.input').val();
                const selectvalue = $('[name=select_items]').val();
                search_add_object(selectvalue,inputvalue);
            });
            function search_add_object(userselect,userinput){
                // ファイル指定
                const csvPathList = [
                    {btnName:'news',csvPath:'/csv/news.csv'},
                    {btnName:'hokusaimanga',csvPath:'/csv/hokusaimanga.csv'}
                ];
                $.each(csvPathList, function(index, value){
                    if(userselect == value.btnName){
                        const path = value.csvPath;
                        // console.log(value.csvPath);
                        csv_file_open(path,userinput);
                    }
                });
            }
            function csv_file_open(csvpath,userinput){
                var url = location.href;
                const request = new XMLHttpRequest();
                request.addEventListener('load', (event) => {
                    const response = event.target.responseText;
                    console.log(response);
                });
                var csv_fullpath = csvpath;
                request.open('GET',csv_fullpath,true);
                request.send();
                // new Promise((resoleve,reject) =>{
                //     var httpReq = new XMLHttpRequest();
                //     httpdReq.open("get",csvpath,true);
                // });
            }
        });
    }
}
</script>
