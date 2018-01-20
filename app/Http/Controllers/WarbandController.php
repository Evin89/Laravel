<?php

namespace Mordheim\Http\Controllers;

use Mordheim\Http\Requests;
use Mordheim\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Mordheim\Warband;
use Mordheim\Type;
use Illuminate\Http\Request;

class WarbandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
//        $keyword = $request->get('search');
//        $perPage = 25;
//
//        if (!empty($keyword)) {
//            $warbands = Warband::paginate($perPage);
//        } else {
//            $warbands = Warband::paginate($perPage);
//        }
//
//        return view('warbands.warbands.index', compact('warbands'));

        // Getting all companies
        $warbands = Warband::with('user', 'type')->get()->where('active', true);
        if (isset($warbands)) {
            return view('warbands//index', ['warbands' => $warbands]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        $types = Type::all();
        return view('warbands.create', ['types' => $types]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $requestData = $request->all();

        Warband::create($requestData);

        return redirect('warbands')->with('flash_message', 'Warband added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {

        $warband = Warband::with('user', 'type')->find($id);

        if ($warband) {
            return view('warbands.show', compact('warband'));
        } else {
            return view ('errorPage');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $warband = Warband::findOrFail($id);
        $types = Type::all();

        // Check if user is logged in and has right to edit.
        if (Auth::user()) {
            // Get the currently authenticated user...
            $user = Auth::user();
            if ($user->id == $warband->user_id) {

                return view('warbands.edit', compact('warband'), ['types' => $types]);
            } else {
                return view('errorPage');
            }
        } else {
            return view('auth.login');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $warband = Warband::findOrFail($id);

//
        // Check if user is logged in and has right to edit.
        if (Auth::user()) {
            // Get the currently authenticated user...
            $user = Auth::user();
            if ($user->id == $warband->user_id) {
                $warband->update($requestData);

                return redirect('warbands/'.$id)->with('flash_message', 'Warband updated!');
            } else {
                return view('errorPage');
            }
        } else {
            return view('auth.login');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $warband = Warband::findOrFail($id);


        // Check if user is logged in and has right to edit.
        if (Auth::user()) {
            // Get the currently authenticated user...
            $user = Auth::user();
            if ($user->id == $warband->user_id) {
                Warband::destroy($id);

                return redirect('warbands/')->with('flash_message', 'Warband deleted!');
            } else {
                return view('errorPage');
            }
        } else {
            return view('auth.login');
        }
    }

    /**
     * Voting up
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function ratingUp ($id){
        if (Auth::user()) {
            $warband = Warband::findOrFail($id);
            $warband->rating += 1;
            $warband->update();
            return redirect('warbands');
        } else {
            return view('auth.login');
        }
    }

    /**
     * Voting down
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function ratingDown ($id){
        if (Auth::user()) {
            $warband = Warband::findOrFail($id);
            $warband->rating -= 1;
            $warband->update();
            return redirect('warbands');
        } else {
            return view('auth.login');
        }
    }

    public function search (Request $request){
//        $orders = App\Order::search('Star Trek')->get();
        $warbands = Warband::where('name', 'LIKE', '%'.$request->search.'%')->where('active', true)->get();
        return view('warbands//index', ['warbands' => $warbands]);
    }


}
