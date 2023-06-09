<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class UserAccountController extends Controller
{
    //
    public function create()
    {
        return inertia('UserAccount/Create');
    }

    public function store(Request $request)
    {
        $user = User::create($request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]));

        // We don't need to Hash the Password anymore because it is Mutated in the User model
        // Everytime we set a User Password it will be Hashed first
        // $user->password = Hash::make($user->password);
        // $user->save();

        Auth::login($user);

        event(new Registered($user));

        return redirect()->route('listing.index')
            ->with('success', 'Account created');
    }
}
