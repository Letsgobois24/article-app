<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SignUpController extends Controller
{
    function index()
    {
        return view('signup', ['title' => 'Contact Us']);
    }

    function store(Request $request)
    {
        $validatedData = $request->validate([
            "name" => "required|max:255",
            "email" => ['required', 'email:dns', 'unique:users,email'],
            "username" => ["required", "unique:users,username"],
            "password" => ["required", 'min:8'],
            "confirm-password" => 'required'
        ]);

        User::create($validatedData);

        return redirect('/dashboard/posts')->with('status', [
            'theme' => 'success',
            'message' => 'New post has been added!'
        ]);

        return redirect('/sign-in')->with('status', [
            'theme' => 'success',
            'message' => 'Registration Successful. Please login!'
        ]);
    }
}
