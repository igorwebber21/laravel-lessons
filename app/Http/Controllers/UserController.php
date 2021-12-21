<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //

    public function create()
    {

        return view('user.create');

    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'avatar' => 'nullable|image',
        ]);

        //dd($request->all());

        if($request->hasFile('avatar'))
        {
            $folder = date('Y-m-d');
            $avatar = $request->file('avatar')->store('images/'.$folder);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'avatar' => $avatar ?? null
        ]);

        session()->flash('success', 'Регистрация успешна');

        Auth::login($user);

        return redirect()->home();

    }

    public function loginForm()
    {
        return view('user.login');
    }

    public  function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt([ 'email' => $request->email, 'password' => $request->password ])){
            return redirect()->home();
        }

        return redirect()->back()->with('error', 'Incorrect login or password');
    }

    public  function logout()
    {
        Auth::logout();
        return redirect()->home();
    }
}
