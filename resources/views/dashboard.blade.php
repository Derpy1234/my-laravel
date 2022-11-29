@extends('layout')
@section('content')
<br>
    @if (Session::get('addTodo'))
        <div class="alert alert-success">
            {{ Session::get('addTodo') }}
        </div>
    @endif 
<br>
<h1 style="color: white;">Selamat Datang di Halaman Dashboard</h1>
<br>
<h1 style="color: white;">Username : {{ auth()->user()->username }}</h1>
<h1 style="color: white;">Email : {{ auth()->user()->email }}</h1>

@if(session('isGuest'))
<h2>
    <b>
        <i>
            {{ session('isGuest') }}
        </i>
    </b>
</h2>
@endif
@endsection