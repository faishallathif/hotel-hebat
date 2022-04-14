<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hotel Hebat</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    {{-- container vue --}}
    <div id="app" >
        {{-- <nav-bar></nav-bar> --}}
        <router-view></router-view>
        {{-- <component-footer></component-footer> --}}
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