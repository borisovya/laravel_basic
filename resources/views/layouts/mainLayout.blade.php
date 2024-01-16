<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <title>Laravel test project</title>
</head>
<body>
<div class="container">
        <nav class="row m-lg-3">
            <ul class="nav mt-1 mb-1">
                <li class="nav-item"> <a href="{{route('main.index')}}"> Main </a></li>
                <li class="nav-item mx-2"> <a href="{{route('post.index')}}"> Posts </a></li>
                <li class="nav-item mx-2"> <a href="{{route('contact.index')}}"> Contacts </a></li>
                <li class="nav-item mx-2"> <a href="{{route('about.index')}}"> About </a></li>
            </ul>
        </nav>

@yield('content')
</div>

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
