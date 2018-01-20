<?php

namespace Mordheim\Http\Controllers;

use Illuminate\Http\Request;
use Mordheim\Warband;

class WelcomeController extends Controller
{
    public function index ()
    {

        $warbands = Warband::with('user', 'type')->get()->where('active', true)->sortByDesc('rating');
        return view('welcome', ['warbands' => $warbands]);

    }
}
