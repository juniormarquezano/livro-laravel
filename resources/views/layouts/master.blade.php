<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>@yield('title', 'Desenvolvendo com Laravel')</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>
        @section('footerScripts')
            <script src="app.js"></script>
        @show
    </body>
</html>