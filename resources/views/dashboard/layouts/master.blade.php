<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>
<body>
    {{-- topsider --}}
    @include('dashboard.includes.topsider')
    {{-- content --}}
    @section('main-content')
    @show


    {{-- footer  --}}

    @include('dashboard.includes.footer')
    
</body>
</html>