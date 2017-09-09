<template lang="html">
  <div class="container">
    Dashboard Message: <strong>{{ message }}</strong>

    <input type="text" name="" class="form-control"
      v-model="message" @keyup="add" >
    <div class="row" v-for="item in items" >
      <div class="">
        {{message}}{{item.value}}
      </div>
    </div>

    <div class="panel-body">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Hora</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="book in bookings">
            <td><a v-bind:href="book.fecha">{{book.nombre}}</a></td>
            <td>{{book.hora}}</td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Add New Books</h3>
      </div>
      <div class="panel-body">
         <form id="form" class="form-inline" v-on:submit.prevent="addBook">
          <div class="form-group">
            <label for="bookTitle">Title:</label>
            <input type="text" id="bookTitle" class="form-control" v-model="newBook.title">
          </div>
          <div class="form-group">
            <label for="bookAuthor">Author:</label>
            <input type="text" id="bookAuthor" class="form-control" v-model="newBook.author">
          </div>
          <div class="form-group">
            <label for="bookUrl">Url:</label>
            <input type="text" id="bookUrl" class="form-control" v-model="newBook.url">
          </div>
          <input type="submit" class="btn btn-primary" value="Add Book">
        </form>
      </div>
    </div>


  </div>
</template>

<script>

  import Firebase from 'firebase'
  let config = {
      apiKey: "AIzaSyAfigVQQr7AJ62FSsfDkwrwK55JwT--3l4",
      authDomain: "faster-items.firebaseapp.com",
      databaseURL: "https://faster-items.firebaseio.com",
      projectId: "faster-items",
      storageBucket: "faster-items.appspot.com",
      messagingSenderId: "88753616585"
    };

  let app = Firebase.initializeApp(config)
  let db = app.database()
  let bookingsRef = db.ref('bookings')


export default {
  name:'Welcome',
  firebase: {
    bookings: bookingsRef
  },
  data(){
    return{
        message:'Hi hell Vue, What kind o magic is this!',
        items:[],
        newBook: {
            nombre: '',
            fecha: '',
            hora: '00:00'
        }
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
