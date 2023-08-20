@extends('layout.app')

@section('content')
    <h3>Edit Todo</h3>
    <hr>

    <form class="ui form" method="POST" action="{{ route('edit-todo',$todo->id) }}">
        @csrf
        @method('PATCH')
        <div class="field">
            <input type="text" name="title" value="{{ $todo->title }}">
        </div>

        <div class="field">
            <div class="ui checkbox">
                @if ($todo->completed)
                    <input type="checkbox" name="completed" value="1" checked>
                @else
                    <input type="checkbox" name="completed" value="1">
                @endif

                <label>Complete</label>
            </div>
        </div>

        <button class="ui button" type="submit">Edit</button>
    </form>
@endsection
