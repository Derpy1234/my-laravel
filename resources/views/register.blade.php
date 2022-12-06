@extends('layout')

@section('content')
    <body>
        <div class="kotak_register">
		<p class="tulisan_register" style="font-size:30px";><strong>Sign Up</strong></p>
 
			<form action="/register" method="POST">
			@csrf
			<label>Name</label>
			<input type="string" name="name" class="form_login" placeholder="Enter name">
            <label>Email</label>
			<input type="email" name="email" class="form_login" placeholder="Enter email">
            <label>Username</label>
			<input type="string" name="username" class="form_login" placeholder="Enter username">
			<label>Password</label>
			<input type="password" name="password" class="form_login" placeholder="Enter password">
 
			<input type="submit" class="tombol_login" value="REGISTER NOW">
			<!-- <button type="submit">REGISTER NOW</button> -->
			<a href="/" class="text-center text-black" > 
			<div class="sign">	  
				<br> sign in here!</a>
			</div>	
		</form>
<div>
{{
 Session('berhasil') }}
		
	</div> 
@endsection