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
            <input placeholder="検索したい概要を左から選んでください。" class="input" type="text" value="犬">
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
    <div class="choice_items_observer">
    </div>
</template>

<script>
import Papa from "papaparse";
import csv from "jquery-csv";
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
                if(!userinput){return;}
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
                const request = new XMLHttpRequest();
                request.addEventListener('load', (event) => {
                    const response = event.target.responseText;
                    // console.log(response);
                    csv_search(response,userinput);
                });
                var csv_fullpath = csvpath;
                request.open('GET',csv_fullpath,true);
                request.send();
                // function readCsv(data){
                //     var csv = $.csv.toArrays(data);
                //     console.log(csv);
                // }
                // $(function(){
                //     $.get(csvpath, readCsv, 'text');
                // });
            }
            function csv_search(csv,userinput){
                var results = Papa.parse(csv);
                // 列一覧取得
                var results_columns = results.data[0];
                // 列取得(name)
                var column = results_columns[0];
                // console.log(results.data);
                // array
                var itemsArray = results.data.slice(1);
                // csvの配列が入っているので以下のnameを探索し、trueなら、全てのオブジェクトを取得する。itemsArray[i]にする。
                // 検索結果の件数を入れる変数
                let search_Number = 0;
                $.each(itemsArray,function(index,value){
                    // ここで判定する[0]は判定対象のカラムなのでとりあえずは不動となる。
                    let csv_Value = value[0];
                    // console.log(csv_Value);
                    if(userinput_string_searchCheck(csv_Value,userinput)){
                        console.log(value);
                        search_Number ++;
                        console.log(search_Number);
                        // $('.top_items').append(`<li id = "search_${index}" class="top_item">`+`<div class=img_wrap>`+`<img id = "img_${index}" alt="">`+`</div>`+`<div>`+`<p class="title_name">` + value[0] + `</p>`+`<p class="common_message message_${index}">` + value[1] + `</p>`+`<p class="readmore-btn${index} click-btn click-btn-status">`+"続きを読む"+`</p>` + `</div>`+`</li>`);
                        //document.getElementById(`img_${index}`).src=hokusai[i].img;
                    };
                    // ここで検索結果の数を表示する。
                });
            }
            function userinput_string_searchCheck(csv_Value,userinput){
                // var re = new RegExp(csv_Value,"ig");
                // console.log(re.test(userinput));
                // let params = new URLSearchParams();
                // params.append('csv_value',csv_Value);
                // params.append('user_input',userinput);
                // // search.phpと通信する。
                // axios.post('../php/search.php',params).then(response => {
                //     // trueが帰ってきたら描画する。
                //     // console.log("成功");
                //     // console.log(response.data.isIn);
                //     console.log(response.data);
                // }).catch(error => {
                // // エラーを受け取る
                // console.log(error);
                // });
                // console.log(re.test(str));
                // console.log(userinput.indexOf(csv_Value,0));
                // 空文字が入ったらreturn
                if(!csv_Value){return false;}
                // console.log(userinput);
                // console.log(csv_Value);
                for(var i=0; i < csv_Value.length; i++){
                    if(userinput == csv_Value[i]){
                        return true;
                    }
                }
                // const index_check = userinput.indexOf(csv_Value);
                // console.log(index_check);
                // if(userinput.indexOf(csv_Value)){
                //     console.log("存在します。");
                //     return;
                // }else{
                //     console.log("存在しません");
                //     return;
                // }
            }
        });
    }
}
</script>
