@extends('layout.app')

@section('content')
<h3>Add To-Do</h3>
<hr>
<form class="ui form" method="POST">
    <div class="field">
      <input type="text" name="todo" placeholder="Enter Your To-Do">
    </div>
    <button class="ui button" type="submit">Add</button>
  </form>
@endsection