@extends('layout.app')

@section('content')
    <h3>Add To-Do</h3>
    <hr>
    <form class="ui form" method="POST" action="{{ route('create-todo') }}">
        @csrf
        <div class="field">
            <input type="text" name="title" placeholder="Enter Your To-Do">
        </div>
        <button class="ui button" type="submit">Add</button>
    </form>

    @include('todo.todos')
    
@endsection
