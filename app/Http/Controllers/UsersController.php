<?php

namespace Mordheim\Http\Controllers;

use Mordheim\Http\Requests;
use Mordheim\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Mordheim\user;
use Mordheim\warband;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $users = user::paginate($perPage);
        } else {
            $users = user::paginate($perPage);
        }

        return view('users.index', compact('users'));
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

        $user = user::find($id);

        if ( $user) {
            $warbands = Warband::with('user', 'type')->get()->where('user_id', $id);
            return view('users.show', compact('user'), ['warbands' => $warbands]);
        } else {
            return view ('errorPage');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        $suser = User::all();
        return view('users.create', ['types' => $suser]);
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

        User::create($requestData);

        return redirect('users')->with('flash_message', 'User added!');
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
        $user = User::findOrFail($id);

        // Check if user is logged in and has right to edit.
        if (Auth::user()) {
            // Get the currently authenticated user...
            $editingUser = Auth::user();
            if ($editingUser->is_admin == true) {

                return view('users.edit', compact('user'));
            } elseif ( $editingUser->id == $id) {
                return view('users.edit', compact('user'));
            }
        } else {
            return view('errorPage');
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

        $user = User::findOrFail($id);

//
        // Check if user is logged in and has right to edit.
        if (Auth::user()) {
            // Get the currently authenticated user...
            $editingUser = Auth::user();
            if ($editingUser->is_admin == true) {
                $user->update($requestData);

                return redirect('users/'.$id)->with('flash_message', 'Warband updated!');
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

        // Check if user is logged in and has right to edit.
        if (Auth::user()) {
            // Get the currently authenticated user...
            $editingUser = Auth::user();
            if ($editingUser->is_admin == true) {
                User::destroy($id);

                return redirect('users/')->with('flash_message', 'User deleted!');
            } else {
                return view('errorPage');
            }
        } else {
            return view('auth.login');
        }
    }
}
