<h1>tasks.index</h1>

<a href="{{ route('tasks.create') }}">New Task</a><br>

<table>
    <thead>
    <tr>
        <th style="text-align: left">Tasks</th>
    </tr>
    </thead>
    <tbody>
    @foreach($tasks as $task)
    <tr>
        <td>{{ $task->name }} - {{ $task->description }}</td>
    </tr>
    @endforeach
    </tbody>
</table>