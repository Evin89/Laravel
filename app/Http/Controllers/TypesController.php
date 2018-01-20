<?php

namespace Mordheim\Http\Controllers;

use Mordheim\Http\Requests;
use Mordheim\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Mordheim\Type;
use Mordheim\Warband;
use Illuminate\Http\Request;

class TypesController extends Controller
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
            $types = Type::paginate($perPage);
        } else {
            $types = Type::paginate($perPage);
        }

        return view('types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('types.create');
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

        Type::create($requestData);

        return redirect('/types')->with('flash_message', 'Type added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $type = Type::find($id);

        if ( $type) {

            $warbands = Warband::with('user', 'type')->get()->where('type_id', $id);

            return view('types.show', ['type' => $type, 'warbands' => $warbands]);
        } else {
            return view ('errorPage');
        }
    }

    public function destroy($id)
    {

        // Check if user is author and has right to edit.
        if (Auth::user()) {
            // Get the currently authenticated user...
            $user = Auth::user();
            if ($user->is_author == true) {
                Type::destroy($id);

                return redirect('types/')->with('flash_message', 'Warband deleted!');
            } else {
                return view('errorPage');
            }
        } else {
            return view('auth.login');
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
        $type = Type::findOrFail($id);

        // Check if user is logged in and has right to edit.
        if (Auth::user()) {
            // Get the currently authenticated user...
            $user = Auth::user();
            if ($user->is_author == true){

                return view('types.edit', compact('type'), ['type' => $type]);
            } else {
                return view('errorPage');
            }
        } else {
            return view('auth.login');
        }
    }

    public function update(Request $request, $id)
    {

        $requestData = $request->all();

        $type = Type::findOrFail($id);

//
        // Check if user is logged in and has right to edit.
        if (Auth::user()) {
            // Get the currently authenticated user...
            $user = Auth::user();
            if ($user->is_author == true) {
                $type->update($requestData);

                return redirect('types/'.$id)->with('flash_message', 'Type updated!');
            } else {
                return view('errorPage');
            }
        } else {
            return view('auth.login');
        }

        return redirect('warbands')->with('flash_message', 'Warband updated!');
    }
}
