<?php

namespace App\Http\Controllers;

use App\Http\Requests\WindowsGroupsRequest;
use App\WindowsGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class WindowsGroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.windows_groups.index')->with('windowsGroups',WindowsGroup::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.windows_groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WindowsGroupsRequest $request)
    {
        //
        WindowsGroup::create($request->all());
        Session::flash('success','Ai adaugat grup de windows '.$request->name.' cu succes');
        return redirect()->route('windows_groups.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\WindowsGroup  $windowsGroup
     * @return \Illuminate\Http\Response
     */
    public function show(WindowsGroup $windowsGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\WindowsGroup  $windowsGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(WindowsGroup $windowsGroup)
    {
        //
        return view('admin.windows_groups.edit')->with('windows_groups',$windowsGroup);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WindowsGroup  $windowsGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WindowsGroup $windowsGroup)
    {
        //
        $windowsGroup->update($request->all());
        Session::flash('success','Ai actualizat cu succes grupul windows');
        return redirect()->route('windows_groups.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WindowsGroup  $windowsGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(WindowsGroup $windowsGroup)
    {
        //
        $windowsGroup->delete();
        Session::flash('success','Ai sters drupul de windows cu succes');
        return redirect()->back();
    }
}
