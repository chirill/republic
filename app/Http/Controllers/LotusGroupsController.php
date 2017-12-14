<?php

namespace App\Http\Controllers;

use App\Http\Requests\LotusGroupsRequest;
use App\LotusGroups;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LotusGroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.lotus_groups.index')->with('lotus_groups',LotusGroups::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.lotus_groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LotusGroupsRequest $request)
    {
        //
        LotusGroups::create($request->all());
        Session::flash('success','Ai adaugat grupul lotus '.$request->name.' cu succes');
        return redirect()->route('lotus_groups.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LotusGroups  $lotusGroups
     * @return \Illuminate\Http\Response
     */
    public function show(LotusGroups $lotusGroups)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LotusGroups  $lotusGroups
     * @return \Illuminate\Http\Response
     */
    public function edit(LotusGroups $lotusGroup)
    {
        //
        return view('admin.lotus_groups.edit')->with('lotus_group',$lotusGroup);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LotusGroups  $lotusGroups
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LotusGroups $lotusGroup)
    {
        //
        $lotusGroup->update($request->all());
        Session::flash('success','Ai actualizat cu succes grupul lotus');
        return redirect()->route('lotus_groups.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LotusGroups  $lotusGroups
     * @return \Illuminate\Http\Response
     */
    public function destroy(LotusGroups $lotusGroup)
    {
        //
        $lotusGroup->delete();
        Session::flash('success','Ai sters grupul de lotus cu succes');
        return redirect()->back();
    }
}
