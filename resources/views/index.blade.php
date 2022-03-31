<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Vue</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-default">
    {{-- container vue --}}
    <div id="app" class="container-fluid">
        <nav-bar></nav-bar>
        <router-view></router-view>
        <h1 class="text-center fw-bold text-white">Halaman Vue</h1>
        <h1 class="text-white">Lorem ipsum dolor sit amet.</h1>
        <h1 class="text-white">Lorem ipsum dolor sit amet.</h1>
        <h1 class="text-white">Lorem ipsum dolor sit amet.</h1>
        <h1 class="text-center fw-bold text-white py-2 border-bottom border-2">ini component Vue</h1>
        {{-- component vue --}}
        <example-component></example-component> 
        <hello-ukom></hello-ukom>
        {{-- component vue --}}
        <hr>
        {{-- data dari vue --}}
        <h1 class="text-center fw-bold text-white py-2 border-bottom border-2">Data Dari Vue</h1>
        <h1>Data Dari Vue : @{{ title }}</h1>
        {{-- data dari vue --}}
        <hr>
        {{-- data dari controller laravel --}}
        <h1 class="text-center fw-bold text-white py-2 border-bottom border-2">Data Dari Laravel</h1>
        <h1>Data Dari Laravel : {{ $title }}</h1>
        {{-- data dari controller laravel --}}
        <component-footer></component-footer>
    </div>
    {{-- container vue --}}

    <script src="{{  asset('js/app.js ')  }}"></script>
</body>
</html>
<style>
    .bg-default{
        background-color: #F8EEE2;
    }
</style>