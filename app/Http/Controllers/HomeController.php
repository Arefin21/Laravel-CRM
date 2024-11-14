<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

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
        $id = Auth::user()->id;
        return view('home',compact('id'));
    }


    public function noindex()
    {
        $id = Auth::user()->id;
//        $subscriber =   Registration::find($id);
        $subscriber =   DB::table('registrations')->where('subscriber_id', $id)->first();
        return view('nohome',compact('subscriber'));
    }

    public function adminHome()
    {
        return view('adminHome');
    }
}
