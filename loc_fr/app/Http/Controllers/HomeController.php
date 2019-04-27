<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

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
        /*
        if($user->type === 'admin') 
        {
            return view('/admin');
        }
        else if($user->type === 'donor')
        {
            return view('/donor');
        }
        else if($user->type === 'volunteer')
        {
            return view('/volunteer');
        }
        else if($user->type === 'member')
        {
            return view('/member');
        }
        else
        {
        return view('home');
       }
       */
      return view('admin.index');
    }
}
