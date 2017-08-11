<h1>Create Tasks</h1>

<form action="{{ route('tasks.store') }}" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <label for="name">Name:</label><br>
    <input type="text" name="name" value="{{ old('name', '') }}"><br>
    <label for="description">Description:</label><br>
    <textarea name="description" cols="30" rows="5">{{ old('description', '') }}</textarea><br>
    <input type="submit" value="Submit">
</form>