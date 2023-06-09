<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class UserController extends Controller
{
    public function register()
    {
        return view('user.register', ['data' => 'Register']);
    }

    public function register_action(Request $request)
    {
        $request->validate([
            'name'             => 'required',
            'email'            => 'required|email:dns',
            'password'         => 'required',
            'password_confirm' => 'required|same:password'
        ]);

        $user =  User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password)
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect('/email/verify');
    }

    public function login()
    {
        return view('user.login', ['data' => 'Login']);
    }

    public function login_action(Request $request)
    {
        $credentials = $request->validate([
            'email'     => 'required',
            'password'  => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'password' => 'Wrong Username or Password'
        ]);
    }

    public function password()
    {
        return view('user.password', ['data' => 'Change Password']);
    }

    public function password_action(Request $request)
    {
        $request->validate([
            'old_password'  => 'required|current_password',
            'new_password'  => 'required|confirmed'
        ]);

        $user = User::find(Auth::id());
        $user->password = Hash::make($request->new_password);
        $user->save();
        $request->session()->regenerate();

        return redirect('/dashboard')->with('status', 'Success Password Changed!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
