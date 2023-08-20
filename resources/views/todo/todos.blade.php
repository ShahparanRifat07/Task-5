<table class="ui celled table">
    <thead>
        <tr>
            <th>Title</th>
            <th>Completed</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($todos as $todo)
            <tr>
                <td> {{ $todo->title }} </td>
                @if ($todo->completed == true)
                    <td> Yes </td>
                @else
                    <td> No </td>
                @endif

                <td style="display: flex">
                    <a href="{{ route('edit-todo', $todo->id) }}" class="ui orange basic button">Edit</a>

                    <form action="{{route('delete-todo',$todo->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="ui red basic button">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
