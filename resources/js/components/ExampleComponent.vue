<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Example Component</div>
          <div class="card-body">
            <ul>
              <li>youtube!</li>
              <li>
                <router-link to="/">home</router-link>
                <div class="">{{youtube}}</div>  
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import youtube from '../../json/youtube.json'
export default {

  data: function(){
        return {
            data :"天才",
            youtube:youtube  
        }
  },
  methods:{
    getitem(){
      axios.get("/api/example/")
      .then((res)=> {
        console.log(res.data);
        this.data = res.data;
      })
      .catch(function (error) {
                console.log("エラー");
      })
    }
  },
  mounted() {
    this.getitem();
    console.log("Component mounted.");
  },
};

</script>
