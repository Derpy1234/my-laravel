@extends('layout')

@section('content')
<br>
@if(Session('successRegister'))
    <div class="alert alert-success">
        {{ Session('successRegister') }}
    </div>
@endif
    <div class="kotak_login">
        <p class="tulisan_login"><strong>Sign In</strong></p>
            <form action="{{ route('login-baru') }}" method="POST">
            @csrf
            Email <input type="email" name="email" class="form_login"  placeholder="Masukan Email">
            <br> 
            Password <input type="password" name="password" class="form_login" placeholder="Masukan Password">
            <br>
            <button type="submit" class="tombol_login">Login</button>
            <a href="register">don't have an account yet, sign up here !</a>
@endsection