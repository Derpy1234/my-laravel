<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;


class RegisterController extends Controller
{
    public function register(Request $request){
        $validateDate = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]); 

        $validateDate['password'] = bcrypt($validateDate['password']);

        User::create($validateDate);

        // return back()->with('berhasil', 'Register Berhasil');
        Alert::toast('Register berhasil', 'success');
        return redirect('/');
    }
}
