<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    //sign in
    public function create()
    {
        return inertia('Auth/Login');
    }

    //store User & create session
    public function store(Request $request)
    {
        //check if login data is correct and try to autheticate with it
        if (!Auth::attempt($request->validate([
            'email' => 'required|string|email',
            'password' => 'required'
        ]), true)) {

            throw ValidationException::withMessages([
                'email' => 'The provided credentials are incorrect.'
            ]);
        }

        $request->session()->regenerate();

        return redirect()->intended(route('listing.index'));
    }

    //log out
    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('listing.index');
    }
}
