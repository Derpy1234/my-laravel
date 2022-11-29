@extends('layout')

@section('content')
<br>
    <table class="table table-success table-striped table-bordered">
        <tr>
            <td>No</td>
            <td>Kegiatan</td>
            <td>Deskripsi</td>
            <td>Batas Waktu</td>
            <td>Status</td>
            <td>Aksi</td>
        </tr>
        @php
            $no = 1;
        @endphp
        @foreach ($todos as $todo)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $todo['tittle'] }}</td>
            <td>{{ $todo['description'] }}</td>
            <!-- carbon : package date pada laravel, nntinya si date yang 2022-11-22 formatnya jadi 22 november 2022 -->
            <td>{{ \Carbon\Carbon::parse($todo['date'])->format('j F, Y') }}</td>
            <!-- konsep ternary, if statusnya 1 nampilin teks complated kalo 0 nampilin teks on-procces, status tuh boolean kan? cuman antara 1 atau 0 -->
            <td>{{ $todo['status'] ? 'Complated' : 'On-process'}}</td>
            <td>
                <a href="#">Edit</a> | <a href="#">Hapus</a>
            </td>
        </tr>
        @endforeach
    </table>
@endsection