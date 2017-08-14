<!-- resources/views/partials/sidebar.blade.php -->
<!-- 1. view partial, 2. array ou conjunto que ocorrerá a interação, 3. variável passada a view, 4. opcional -->
{{-- Comentado para testar a funcionalidade do view composer
<div class="sidebar">
    @each('partials.module', $modules, 'module', 'partials.empty-module')
</div>
--}}

<!-- TODO - View Composer - Variável passada pelo view composer -->
[passado pelo view composer]
<ul>
@foreach($tasks as $task)
    <li>{{ $task->name }}</li>
@endforeach
</ul>