<?php

namespace App\Http\Controllers;

use App\Company;
use App\Department;
use App\EmploymentForm;
use App\Http\Requests\EmploymentFormsRequest;
use App\Location;
use App\LotusGroups;
use App\LotusSignature;
use App\User;
use App\WindowsGroup;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EmploymentFormsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use SoftDeletes;
    public function index()
    {
        //
        $e = EmploymentForm::find(1);
        $employments = EmploymentForm::all();

        return view('admin.employment_forms.index',compact('employments','e'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $companies = Company::pluck('name','name')->all();
        if(count($companies)==0){
            Session::flash('info','Nu aveti nici o companie');
            return redirect()->back();
        }

        $users = User::pluck('name','id')->all();
        if(count($users)==0){
            Session::flash('info','Nu aveti nici un utilizator');
            return redirect()->back();
        }
        $locations = Location::pluck('name','name')->all();
        if(count($locations)==0){
            Session::flash('info','Nu aveti nici o locatie');
            return redirect()->back();
        }
        $employee_signatures = LotusSignature::pluck('name','name')->all();
        if(count($employee_signatures)==0){
            Session::flash('info','Nu aveti nici o semnatura de lotus');
            return redirect()->back();
        }
        $lotusGroups = LotusGroups::pluck('name','name')->all();
        if(count($lotusGroups)==0){
            Session::flash('info','Nu aveti nici un grup de lotus definit');
            return redirect()->back();
        }
        $windowsGroup = WindowsGroup::pluck('name','name')->all();
        if(count($windowsGroup)==0){
            Session::flash('info','Nu aveti nici un grup de lotus definit');
            return redirect()->back();
        }
        $departments = Department::pluck('name','name')->all();
        if(count($departments)==0){
            Session::flash('info','Nu aveti nici un departament definit');
            return redirect()->back();
        }

        return view('admin.employment_forms.create',compact('locations','employee_signatures','users','lotusGroups','windowsGroup','departments','companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmploymentFormsRequest $request)
    {
        //
        if ($request->approved_acquisitions_budget == 'NU' && $request->approved_employment_budget=='NU'){
            Session::flash('error','Nu puteti angaja o persoana fara a avea bugetul aprobat');
            return redirect()->back();
        }
        EmploymentForm::create($request->all());
        Session::flash('success','Fisa de angajare creata cu succces');
        return redirect()->route('employment_forms.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EmploymentForm  $employmentForm
     * @return \Illuminate\Http\Response
     */
    public function show(EmploymentForm $employmentForm)
    {
        //
        return view('admin.employment_forms.show',compact('employmentForm'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EmploymentForm  $employmentForm
     * @return \Illuminate\Http\Response
     */
    public function edit(EmploymentForm $employmentForm)
    {
        //
        if($employmentForm->status == 'in procesare'){
            Session::flash('error','Aceasta fisa este in procesare si nu mai poate fi editata');
            return redirect()->back();
        }
        $locations = \App\Location::pluck('name','name')->all();
        $lotusSignature = LotusSignature::pluck('name','name')->all();
        $users = User::pluck('name','id')->all();
        $lotusGroups = LotusGroups::pluck('name','name')->all();
        $windowsGroup = WindowsGroup::pluck('name','name')->all();
        $companies = Company::pluck('name','name')->all();

        return view('admin.employment_forms.edit',compact('employmentForm','locations','lotusSignature','users','lotusGroups','windowsGroup','companies'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EmploymentForm  $employmentForm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmploymentForm $employmentForm)
    {
        //
        if ($request->approved_acquisitions_budget == 'NU' && $request->approved_employment_budget=='NU'){
            Session::flash('error','Nu puteti angaja o persoana fara a avea bugetul aprobat');
            return redirect()->back();
        }
        $employmentForm->update($request->all());
        Session::flash('success','Fisa de angajare updatata cu succces');
        return redirect()->route('employment_forms.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EmploymentForm  $employmentForm
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmploymentForm $employmentForm)
    {
        //
        $employmentForm->delete();
        Session::flash('success','Ati mutat fisa de angajare in cosul de gunoi');
        return redirect()->back();
    }
    public function trash(){
        $employments = EmploymentForm::onlyTrashed()->get();
        return view('admin.employment_forms.trash',compact('employments'));
    }
    public function restore($id){
        EmploymentForm::onlyTrashed()->whereId($id)->restore();

        Session::flash('success','Form restored successfully');
        return redirect()->back();
    }
    public function kill($id){
        EmploymentForm::withTrashed()->whereId($id)->forceDelete();
        //$employmentForm->forceDelete();
        Session::flash('success','Ati ster cu succes fisa de angajare');
        return redirect()->back();
    }

    public function action($id,$action) {
        $employmentForm = EmploymentForm::findOrFail($id);

       $employmentForm->update(['status'=>$action]);
       Session::flash('success','fisa setata');
       return redirect()->back();
    }

    public function addUser(Request $request){
        EmploymentForm::findOrFail($request->only('employmentFormId'))->first()->update($request->except('employmentFormId'));
        Session::flash('success','Fisa a fost completata cu succes');
        return redirect()->back();
    }



}