<?php

namespace App\Http\Controllers;

use App\Computer;
use App\Http\Requests\ComputersRequest;
use App\Location;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ComputersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.computers.index')->with('computers',Computer::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $users = User::pluck('name','id')->all();
        $locations = Location::pluck('name','id')->all();
        if (User::all()->count() == 0){
            Session::flash('info','Nu exista nici un utilizator in baza de date');
            return redirect()->back();
        }
        if (Location::all()->count() == 0){
            Session::flash('info','Nu exista nici o locatie setata');
            return redirect()->back();
        }
        return view('admin.computers.create',compact('users','locations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ComputersRequest $request)
    {
        //
        Computer::create($request->all());
        Session::flash('success','Calculator adugat cu succes');
        return redirect()->route('computers.index');
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
        $computer = Computer::findOrFail($id);
        $locations = Location::pluck('name','id')->all();
        $users = User::pluck('name','id')->all();
        return view('admin.computers.edit',compact('computer','locations','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ComputersRequest $request,Computer $computer)
    {
        //
        $computer->update($request->all());
        Session::flash('success','Calculator updatat cu succes');
        return redirect()->route('computers.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Computer $computer)
    {
        //
        $computer->delete();
        Session::flash('success','Calculator sters cu succes');
        return redirect()->back();
    }
}
