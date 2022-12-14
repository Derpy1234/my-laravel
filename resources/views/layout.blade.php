<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/css/login.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/register.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="shortcut icon" href="{{asset('assets\img\rmv.png')}}" type="image/x-icon">
    
    <title>Todo App</title>
</head>
<body>
@include('sweetalert::alert')
<br>
@if (Auth::check())
    <nav class="navbar navbar-expand-lg w-100" style="background-color: aqua">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="/assets/img/rmv.png" alt="" width="50px">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <a class="nav-link" href="/data">Data</a>
            <a class="nav-link" href="/create">Create</a>
            <div class="navbar-nav">
            <a class="nav-link btn btn-danger text-white" href="/logout">Logout</a>
        </div>
        </div>
    </div>
    </nav>
@endif
@yield('content')
</body>
</html>