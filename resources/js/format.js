const { default: axios } = require('axios');

require('./bootstrap');
jQuery(function($){
    $(".btn").on('click',function(){
        let update = "formatから";
        let params = new URLSearchParams();
        params.append('update',update);
        axios.post('../php/update.php',params).then(response => {
            console.log(response.data);
        }).catch(error => {
        // エラーを受け取る
        console.log(error);
        });
    });
});
