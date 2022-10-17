<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AccountController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the user account info.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit()
    {
        return view('account.edit');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' =>'required|min:4|string|max:255',
            'email'=>'required|email|string|max:255'
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;

        if(trim($request->password)) {
            $user->password = Hash::make(trim($request->password));
        }

        $user->save();

        Session::flash('success', 'Your Account Settings have been updated!');
        return back();
    }
}
