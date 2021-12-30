<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    @include('layouts.script')
    @include('layouts.style')

</head>

<body style="background: @yield('style')">
    <div id="app">
        <x-navbar></x-navbar>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
