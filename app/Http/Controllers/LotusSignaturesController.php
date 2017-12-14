<?php

namespace App\Http\Controllers;

use App\Http\Requests\LotusSignatureRequest;
use App\LotusSignature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LotusSignaturesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.lotus_signatures.index')->with('lotus_signatures',LotusSignature::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.lotus_signatures.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LotusSignatureRequest $request)
    {
        //
        LotusSignature::create($request->all());
        Session::flash('success','Ai adaugat semnatura lotus '.$request->name.' cu succes');
        return redirect()->route('lotus_signatures.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LotusSignature  $lotusSignature
     * @return \Illuminate\Http\Response
     */
    public function show(LotusSignature $lotusSignature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LotusSignature  $lotusSignature
     * @return \Illuminate\Http\Response
     */
    public function edit(LotusSignature $lotusSignature)
    {
        //
        return view('admin.lotus_signatures.edit')->with('lotusSignature',$lotusSignature);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LotusSignature  $lotusSignature
     * @return \Illuminate\Http\Response
     */
    public function update(LotusSignatureRequest $request, LotusSignature $lotusSignature)
    {
        //
        $lotusSignature->update($request->all());
        Session::flash('success','Ai actualizat cu succes semnatura lotus');
        return redirect()->route('lotus_signatures.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LotusSignature  $lotusSignature
     * @return \Illuminate\Http\Response
     */
    public function destroy(LotusSignature $lotusSignature)
    {
        //
        $lotusSignature->delete();
        Session::flash('success','Ai sters semnatura de lotus cu succes');
        return redirect()->back();
    }
}
