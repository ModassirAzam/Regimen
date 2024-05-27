<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
class SessionController extends Controller
{
    //
    public function create()
    {
        return view('auth.login');
    }

    public function store() //for login
    {
        $attributes = request()->validate([
            'email' => ['required','email'],
            'password'=> ['required']
        ]);
        Auth::attempt($attributes);
        if(!Auth::attempt($attributes))
        {
            throw ValidationException::withMessages([
                'email' => 'Sorry ! Credentials can not match'
            ]);
        }
        request()->session()->regenerate(); // for generating new session id everytime for security (session hacking)
        return redirect('/jobs');
    }
    public function destroy()
    {
        Auth::logout();
        return redirect('/');
    }
}
