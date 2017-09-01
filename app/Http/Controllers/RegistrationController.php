<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function create(){
        return view('signup');
    }

    public function store(){
        //dd(request('id'));

        $this->validate(request(), [
            'name'=>'required',
            'password'=>'required|confirmed',
            'id' => 'unique:users,id|required'
        ]);

        User::create(request(['id','name','password']));
        $user = User::latest()->get()->first();
        Auth::login($user);
        return redirect('/');
    }

    public function forgot(){
        return view('forgot');
    }
}
