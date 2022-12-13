<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
    }
      
    

    public function register()
    {
        return view('register');
    }

    public function dashboard()
    {
        return view('dashboard');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request ->validate([
            'title' => 'required | min:3',
            'date' => 'required',
            'description' => 'required | min:8',
        ]);
        
        // yg ' ' = nama column
        // yg $request -> = value name di input
        // kenapa kirim 5 data pdhl di input ada 3 inputan? kalau di cek di table todos itu akan ada 6 column yg harus diisi, salah satunya column done_date yg nullable, kalau nullable itu gausa diisi gpp jg ga diisi dulu
        // user_id ngambil id dari fitur auth (history login), supaya tau itu todo punya siapa
        // column status kan boolean, jd kalo status si todo blm dikerjain = 0
        Todo::create([
            'title' => $request->title,
            'date' => $request->date,
            'description' => $request->description,
            'user_id' => Auth::user()->id,
            'status' => 0,
        ]);

        // kalau berhasil tambah ke db, bakal diarahin ke halaman dashboard dengan menampilkan pemberitahuan 
        Alert::toast('Berhasil Menambahkan Data', 'success');
        return redirect ('/dashboard');
    }

    public function data()
    {
        // ambil data dari table todos
        $todos = Todo::all();
        // compact untuk mengirim data ke bladenya
        // isi di compact hrs sama kaya nama variablenya
        return view('data', compact('todos'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //parameter $id mengambil data path dinamis {id}
        //ambil satu baris data yang memiliki value column id sama dengan data path dinamis id yang dikirim ke route
        $todo = Todo::where('id' , $id)->first();
        //kemudian arahkan/tampilan file view yang bernama edit.blade.php dan kirim data dari $todo ke file edit tersebut dengan bantuan compact
        return view('edit', compact('todo'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validasi
        $request->validate([
            'title' => 'required|min:3',
            'date' => 'required',
            'description' => 'required|min:8',
        ]);
    //cari baris data yang punya value column id sama dengan id yang dikirim ke route
    Todo::where('id', $id)->update([
        'title' => $request->title,
        'date' => $request->date,
        'description' => $request->description,
        'user_id' => Auth::user()->id,
        'status' => 0,
    ]);
    //kalau berhasil, arahkan ke halaman data dengan pemberitahuan berhasil
    return redirect('/data')->with('successUpdate', 'berhasil mengubah data!');
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Todo::where('id', $id)->delete();

        return redirect('/data')->with('successDelete', 'Berhasil menghapus data Todo!');
        
    }

    public function UpdateToComplated(Request $request, $id)
    {
        //cari data yang akan diupdate
        //baru setelahnya data di update ke database melalui model
        //status tipenya boolean (0/1) : 0 (on-process) & 1 (complated)
        //carbon : package laravel yang mengelola segala hal yanng berhubungan dengan date
        //now() : mengambil tanggal hari ini 
        Todo::where('id', '=', $id)->update([
            'status' => 1,
            'done_time' => \Carbon\Carbon::now(),
        ]);
       //jika berhasil, akan dibalikan ke halaman awal (halaman tempat button complated berada). kembalikan dengan pemberitahuan
       Alert::toast('Berhasil', 'success');
       return redirect()->back();
    }
}
