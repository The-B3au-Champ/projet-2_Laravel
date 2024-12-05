<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/app.css') }}">
    <title>@yield('title','Accueil')</title>
    <script src="{{asset('js/script.js') }}" defer></script>
</head>
<body>
    <header>
        @include('task.nav')
    </header>
    <main>
        @yield('content')
    </main>
    @include('task.footer')
</body>

</html>