<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function create() {
        return view('users.register');
    }

    public function store (Request $request) {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);
        $formFields['password'] = bcrypt($formFields['password']);
        $user = User::create($formFields);

        // login
        auth()->login($user);

        return redirect('/')->with('message', 'Welcome '.auth()->user()->name);
    }

    public function logout (Request $request) {
        auth()->logout();

        return redirect('/')->with('message', 'You have been logged out');
    }

    public function login (Request $request) {
        return view('users.login');
    }

    public function authenticate (Request $request) {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required|min:6'
        ]);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();
            return redirect('/')->with('message', 'Welcome back '.auth()->user()->name);
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

}
