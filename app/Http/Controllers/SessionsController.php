<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function create(){
        if(Auth::check()) return redirect()->home();
        else return view('login');
    }

    public function store(){
        $id = request('id');
        $pass = request('password');
        $user = User::where('id','=',$id)->where('password','=',$pass)->get()->first();
        if($user){
            auth()->login($user);
            return redirect()->home();
        }
        else{
            return view('login');
        }
    }

    public function destroy(){
    auth()->logout();
    return redirect('');
    }

    public function dash(){
        if(Auth::check()) return view('dashboard');
        else return redirect('/');
    }
}
