@extends('layout')

@section('content')
<br>
    <form action="/update/{{$todo['id']}}" method="POST" style="max-width: 500px; margin: auto;">
    <!-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif -->
    <!-- untuk mengirim data ke controller yang nantinya di tampung oleh Request $request -->
    @csrf
    {{-- karena atribute method pada tag form cuman bisa GET/POST sedangkan buat update data itu pake method PATCH, jadi method=--}}
    @method('PATCH')
        <div class="d-flex flex-column">
            <label style="color: white;">Title</label>
            <input type="text" name="title" value="{{$todo['title']}}">
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="d-flex flex-column">
            <label style="color: white;">Date</label>
            <input type="date" name="date" value="{{$todo['date']}}">
            @error('date')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="d-flex flex-column">
            <label style="color: white;">Description</label>
            {{-- kenapa textarea gapunya attribute value?--}}
            <textarea name="description" id="" cols="30" rows="10">{{$todo['description']}}</textarea>
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <button type="submit" class="tombol_login">Kirim</button>
    </form>
@endsection