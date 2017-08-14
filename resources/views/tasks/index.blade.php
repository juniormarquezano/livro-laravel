@extends('layouts.master')

@section('content')

    <h1>tasks.index</h1>

    <a href="{{ route('tasks.create') }}" class="btn btn-success">New Task</a><br><br>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th class="text-left">Tasks</th>
            <th></th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tasks as $task)
        <tr>
            <td>{{ $task->name }}</td>
            <td>{{ $task->description }}</td>
            <td><a href="{{ route('tasks.show', $task->id) }}" class="btn btn-xs btn-primary">Show</a></td>
        </tr>
        @endforeach
        </tbody>
    </table>

    {{ $tasks->links() }}

    <h2>Capítulo 4 - Templates do Blade</h2>
    <h3>Estruturas de Controle</h3>

    <div class="col-md-6">
        <h4>Condicionais</h4>
        <p>
            @if(count($tasks) === 1)
                There is one talk at this time period.
            @elseif(count($tasks) === 0)
                There are no talks at this time period.
            @else
                There are {{ count($tasks) }} talks at this time period.
            @endif
        </p>

        {{-- Oposto de @if --}}
        @unless(!$task)
            unless e endunless é o oposto de if
        @endunless

        <h4>Loops</h4>

        <span>for</span><br>
        @for($i = 0; $i < count($tasks); $i++)
            The number is {{ $i }}<br>
        @endfor
        <br>
        <span>foreach</span><br>
        @foreach($tasks as $task)
            {{ $task->name }} - {{ $task->description }}<br>
        @endforeach
        <br>
        <span>forelse</span><br>
        @forelse($tasks as $task)
            {{ $task->name }} - {{ $task->description }}<br>
        @empty
            No talks
        @endforelse
        <br>
        <span>$loop-></span>
        <ul>
            @foreach($pages as $page)
                <li>
                    {{ $loop->iteration }}: {{ $page }}
                    @if($tasks)
                        <ul>
                            @foreach($tasks as $task)
                                <li>
                                    {{ $loop->parent->iteration }}.
                                    {{ $loop->iteration }}:
                                    {{ $task->name }}
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>

    <div class="col-md-6">
        @<span>include()</span>
        <div class="content" data-page-name="{{ $pages[0] }}">
            <p>Here's why you should up for our app: <strong>It's Great.</strong></p>
            @include('partials.button', ['text' => ' See just how great it is'])
        </div>
        <br>
        @<span>each()</span>
        @include('partials.sidebar')
        <br>
        <!-- TODO - Componentes frontend - Pluralização -->
        <h2>Capítulo 5 - Componentes frontend</h2>
        <h3>Pluralização</h3>
        @if($numTasksDeleted > 0)
            {{ trans_choice('messages.task-deletion', $numTasksDeleted) }}
        @endif

    </div>

@endsection

@section('footerScripts')
    @parent
    <script src="dashboard.js"></script>
@endsection
