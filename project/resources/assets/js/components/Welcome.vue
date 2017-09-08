<template lang="html">
  <div class="container">
    Dashboard Message: <strong>{{ message }}</strong>

    <input type="text" name="" class="form-control"
      v-model="message" v-on:keyup="add" >
      <div class="row" v-for="item in items" >
        <div class="">
          {{message}}{{item.value}}
        </div>
      </div>
  </div>
</template>

<script>
export default {
  data(){
    return{
        message:'Hi hell Vue, What kind o magic is this!',
        items:[]
    }
  },
  methods:{
    add(){
      console.log("!ddd")
      this.items.push({value:""});
    }
  }
}
</script>
