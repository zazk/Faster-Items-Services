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
            <th>Fecha</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="book in bookings">
            <td><span v-on:click="editBook(book)">{{book.nombre}}</span></td>
            <td>{{book.hora}}</td>
            <td>{{book.fecha}}</td>
            <td><span class="glyphicon glyphicon-trash" aria-hidden="true" v-on:click="removeBook(book)"></span></td>
          </tr>
        </tbody>
      </table>
      <span class="btn btn-xs btn-primary" v-on:click="clearForm()"> Add Booking</span>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Add New Book</h3>
      </div>
      <div class="panel-body">
         <form id="form" class="form-inline" v-on:submit.prevent="addBook">
          <div class="form-group">
            <label for="bookTitle">Nombre:</label>
            <input type="text" id="bookTitle" class="form-control" v-model="newBook.nombre">
          </div>
          <div class="form-group">
            <label for="bookAuthor">Fecha:</label>
            <input type="date" id="bookAuthor" class="form-control" v-model="newBook.fecha">
          </div>
          <div class="form-group">
            <label for="bookUrl">Hora:</label>
            <input type="time" id="bookUrl" class="form-control" v-model="newBook.hora">
          </div>
          <input type="submit" v-show="!edit" class="btn btn-primary" value="Add Booking">
          <input type="submit" v-show="edit" class="btn btn-primary" value="Edit Booking">

        </form>
      </div>
    </div>


  </div>
</template>

<script>

  import Firebase from 'firebase';
  import toastr from 'toastr';

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
        edit:false,
        newBook: {
            nombre: '',
            fecha: '',
            hora: '00:00'
        },
        booking:null
    }
  },
  methods:{
    addBook: function (book) {
      if(this.edit == true){
        console.log(this.newBook);
        let key = this.newBook['.key'];
        bookingsRef.child(key).child('nombre').set(this.newBook.nombre);
        bookingsRef.child(key).child('fecha').set(this.newBook.fecha);
        bookingsRef.child(key).child('hora').set(this.newBook.hora);
      }else{
        bookingsRef.push(this.newBook,function(error){
          if(!error){
            toastr.success("Booking added Successfuly!");
          }
        });
      }
      this.clearForm();
    },
    clearForm (){
      this.newBook = {
        nombre :'',
        fecha:'',
        hora:''
      };
      this.edit = false;
    },
    editBook:function(book){
      console.log("edit book:", book);
      this.edit = true;
      this.newBook = book;
    },
    removeBook:function(book){
      bookingsRef.child(book['.key']).remove(function(error){
        if (!error) {
          // removed!
          toastr.success('Booking removed Successfuly')
        }
      });
    },
    add(){
      console.log("!ddd")
      this.items.push({value:""});
    }
  }
}
</script>
