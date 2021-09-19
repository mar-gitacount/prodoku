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
                console.log(inputvalue);
                console.log(selectvalue);
            });
            function search_add_object(){
                const csvPathList = [
                    {btnName:'浮世絵ニュース検索',csvPath:'/csv/news.csv'},
                    {btnName:'hokusaimanga',csvPath:'/csv/article.csv'}
                ];
                $.each(csvPathList, function(index, value){
                    console.log(value.btnName);
                })
            }
        });
    }
}
</script>
