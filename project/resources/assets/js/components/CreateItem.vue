<template>
  <div>
    <h1>Create an Item</h1>
    <form v-on:submit.prevent="addItem" action="index.html" method="post">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Item Name:</label>
            <input type="text" class="form-control" v-model="item.name">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div>
            <label>Item Price:</label>
            <input type="text" class="form-control" v-model="item.price">
          </div>
        </div>
      </div>
      <br>
      <div>
        <button class="btn btn-primary">Add</button>
      </div>
    </form>
  </div>

</template>

<script>
export default {
  data(){
    return{
      item:{}
    }
  },
  methods:{
    addItem(){
      let uri='http://localhost:8000/items';
      this.axios.post(uri,this.item).then((response) => {
        this.$router.push({name:'DisplayItem'});
      });
    }
  }
}
</script>
