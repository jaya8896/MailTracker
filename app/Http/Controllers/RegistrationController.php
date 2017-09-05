<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use App\Jobs\SendPasswordResetEmail;
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

    public function reset(){
        $this->validate(request(), [
            'email'=>'required|email',
            'id' => 'exists:users,id|required'
        ]);
        $toMail = request('email');
        $id = request('id');
        $job = (new SendPasswordResetEmail($toMail,$id))->delay(Carbon::now()->addSeconds(2));
        dispatch($job);
        return redirect('/');
    }
}
