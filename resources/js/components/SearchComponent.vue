<template>
    <ul class="top_items"><li></li></ul>
</template>
<script>
export default{
    mounted:function(){
        var path = location.pathname
        if(path == "/search"){
            $(".search_wrap").addClass("under_line");
        }
    }
}
</script>
