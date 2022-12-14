<?php

namespace App\Http\Controllers;

use App\Models\UserLoggingLog;
use Illuminate\Http\Request;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userLoggingLogs = UserLoggingLog::whereUserId(auth()->user()->id)->with(['user'])->latest()->paginate(10);

        return view('home', compact('userLoggingLogs'));
    }
}
