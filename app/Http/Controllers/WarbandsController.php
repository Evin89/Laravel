<?php

namespace Mordheim\Http\Controllers;

use Mordheim\Http\Requests;
use Mordheim\Http\Controllers\Controller;

use Mordheim\Warband;
use Illuminate\Http\Request;

class WarbandsController extends Controller
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
//        return view('warband.warbands.index', compact('warbands'));

        // Getting all companies
        $warbands = Warband::with('user', 'type')->get()->where('active', true);
        if (isset($warbands)) {
            return view('warband/warbands/index', ['warbands' => $warbands]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('warbands.warbands.create');
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

        return redirect('warbands/warbands')->with('flash_message', 'Warband added!');
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
        $warband = Warband::findOrFail($id);

        return view('warbands.warbands.show', compact('warband'));
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

        return view('warbands.warbands.edit', compact('warband'));
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
        $warband->update($requestData);

        return redirect('warbands/warbands')->with('flash_message', 'Warband updated!');
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
        Warband::destroy($id);

        return redirect('warbands/warbands')->with('flash_message', 'Warband deleted!');
    }
}
