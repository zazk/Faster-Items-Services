@extends('master')
@section('content')
  <div class="container">
    <h1>Tasks</h1>
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Description</th>
      </tr>
    </thead>
    <tbody>
      @foreach($tasks as $task)
      <tr>
        <td>{{$task['id']}}</td>
        <td>{{$task['title']}}</td>
        <td>{{$task['description']}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
@endsection
