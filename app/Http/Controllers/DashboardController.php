<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class DashboardController extends Controller
{
    /**
     * Just Users Logged in
     *
     * @return void
     */
    public function __construct(){
        $this->middleware("auth");
    }

    /**
     * Show dashboard index
     *
     * @return view
     */
    public function index(){
    	if(!\Auth::user()->isAdmin()){
    		return redirect('/home');
    	}
        $users = User::where('role_id', 2)->get();
        return view('dashboard.index', compact('users'));
    }


    
}
