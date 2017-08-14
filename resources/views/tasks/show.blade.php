{{--
<h1>ID: {{ $id }}</h1>
<a href="{{ route('tasks.show', $id) }}">Task Show [{{ $id }}]</a><br>
<a href="{{ route('tasks.show', [$id, $userId]) }}">2 Parâmetros [{{ $id }} | {{ $userId }}]</a><br>
<a href="{{ route('tasks.show', ['id' => $id, 'userId' => $userId]) }}">2 Parâmetros [{{ $id }} | {{ $userId }}]</a><br>
<a href="{{ route('tasks.show', ['id' => $id, 'userId' => $userId, 'op' => 'a']) }}">
    Passando um terceiro parâmetro, no caso op=a
</a>
--}}

<!-- TODO - View Composer - Mostrar o carregando de uma variável passada para determinadas views -->
@include('partials.header')
@include('partials.sidebar')

<h2>{{ $task->name }}</h2>
<p>{{ $task->description }}</p>

<!-- TODO - Diretivas personalizadas do Blade -->
@isTest

<!-- TODO - Parâmetros em diretivas personalizadas do Blade -->
<p>@newlinesToBr('<br>') test</p>

@ifPublic()
    <p>&copy; Copyright MyApp LLC</p>
@else
    <p>&copy; Copyright Client 1</p>
@endif

<!-- TODO - Componentes frontend - Usando uma tradução -->
{{--<a href="{{ route('tasks.index') }}">{{ __('navigation.back') }}</a> --}}
<!-- TODO - Componentes frontend - Parâmetros em traduções -->
<a href="{{ route('tasks.index') }}">{{ __('navigation.back', ['section' => 'Tasks']) }}</a>