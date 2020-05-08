<?php

namespace App\Http\Controllers;

use App\User;
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

//        if(!ctype_digit($id)){
//            return redirect('/home')->with('err_msg', __('Invalid operation was performed.'));
//        }
        //$user = User::find($id);
        return view('home');
    }
}
