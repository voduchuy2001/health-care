<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/">
    <title>{{ config('app.name', 'SPACanTho') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    @include('guess.layouts.css')
</head>

<body>
    @include('guess.components.header')

    @include('guess.components.nav-bar')

    @yield('content')

    @include('guess.components.footer')

    @include('guess.components.loader')

    @include('guess.layouts.javascript')
</body>

</html>