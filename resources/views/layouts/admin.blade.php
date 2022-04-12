<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    <div id="app">
        <side-bar></side-bar>
        <top-nav></top-nav>
        <router-view></router-view>
    </div>
<script src="{{  asset('js/app.js ')  }}"></script>
</body>
</div>

</html>