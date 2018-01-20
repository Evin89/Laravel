<?php

namespace Mordheim\Http\Controllers;

use Illuminate\Http\Request;
use Mordheim\Warband;
use Illuminate\Support\Facades\Auth;

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

        $user = Auth::user();
        $id = Auth::id();


        $warbands = Warband::with('user', 'type')
            ->get()
            ->where('user_id', $id);
        return view('home', ['warbands' => $warbands], ['user' => $user]);
    }
}
