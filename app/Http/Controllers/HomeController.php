<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (\Auth::user()->type == 'admin') {
            return redirect()->route('admin');
        } elseif (\Auth::user()->type == 'agent') {
            return redirect()->route('agent');
        } elseif (\Auth::user()->type == 'default') {
            return redirect()->route('oops');
        }
        
    }

    public function oops(){
        return view('layouts.default_user');
    }
}
