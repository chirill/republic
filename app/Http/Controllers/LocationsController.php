<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocationsRequest;
use App\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LocationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.locations.index')->with('locations',Location::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.locations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LocationsRequest $request)
    {
        //
        Location::create($request->all());
        Session::flash('success','Ai adaugat locatia '.$request->name.' cu succes');
        return redirect()->route('locations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return view('admin.locations.edit')->with('location',Location::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LocationsRequest $request, $id)
    {
        //
        $location = Location::findOrFail($id);
        $location->update($request->all());
        Session::flash('success','Ai actualizat cu succes locatia');
        return redirect()->route('locations.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Location::findOrFail($id)->delete();
        Session::flash('success','Ai sters locatia cu succes');
        return redirect()->back();
    }
}
