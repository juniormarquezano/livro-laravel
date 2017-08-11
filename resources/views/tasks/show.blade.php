{{--
<h1>ID: {{ $id }}</h1>
<a href="{{ route('tasks.show', $id) }}">Task Show [{{ $id }}]</a><br>
<a href="{{ route('tasks.show', [$id, $userId]) }}">2 Parâmetros [{{ $id }} | {{ $userId }}]</a><br>
<a href="{{ route('tasks.show', ['id' => $id, 'userId' => $userId]) }}">2 Parâmetros [{{ $id }} | {{ $userId }}]</a><br>
<a href="{{ route('tasks.show', ['id' => $id, 'userId' => $userId, 'op' => 'a']) }}">
    Passando um terceiro parâmetro, no caso op=a
</a>
--}}

<h2>{{ $task->name }}</h2>
<p>{{ $task->description }}</p>