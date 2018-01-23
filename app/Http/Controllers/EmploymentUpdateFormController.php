<?php

namespace App\Http\Controllers;

use App\EmploymentForm;
use App\EmploymentUpdateForm;
use App\Location;
use App\LotusGroups;
use App\LotusSignature;
use App\User;
use App\Company;
use App\WindowsGroup;
use App\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EmploymentUpdateFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $employments = EmploymentForm::all();

//        orderBy('employment_form_id','asc')->get();

        //$employments = $bb->groupBy('employment_form_id');
        //dd($employments);
        return view('admin.employment_forms_update.index',compact('employments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //create2 aduce datele din fisa de in pentru a crea o noua fisa de update
    public function create2($id)
    {
        //
        $employmentUpdateForm = EmploymentForm::find($id)->updateFoms->last();

        if ($employmentUpdateForm!=null){
            $employmentUpdateForm->first();
        }else{
            $employmentUpdateForm=null;
        }

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

        return view('admin.employment_forms_update.create',compact('locations','employee_signatures','users','lotusGroups','windowsGroup','departments','companies','employmentUpdateForm'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if($request->employment_form_id ===0){
            $employmentForm = EmploymentForm::create($request->all());
            $input[]=$request->all();
            $input['employment_form_id']=$employmentForm->id;
        }
        EmploymentUpdateForm::create($request->all());

        return redirect()->route('employment_forms_update.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\EmploymentUpdateForm  $employmentUpdateForm
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $employmentUpdateForm = EmploymentUpdateForm::find($id);
        return view('admin.employment_forms_update.show',compact('employmentUpdateForm'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EmploymentUpdateForm  $employmentUpdateForm
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
       if (strpos($id, 'in') ) {
           $employmentUpdateForm = EmploymentForm::findOrFail($id)->first();
           $form_type = 'in';
       }else{
           $employmentUpdateForm = EmploymentUpdateForm::findOrFail($id)->first();

       }
        $companies = \App\Company::pluck('name','name')->all();
        if(count($companies)==0){
            Session::flash('info','Nu aveti nici o companie');
            return redirect()->back();
        }

        $users = \App\User::pluck('name','id')->all();
        if(count($users)==0){
            Session::flash('info','Nu aveti nici un utilizator');
            return redirect()->back();
        }
        $locations = \App\Location::pluck('name','name')->all();
        if(count($locations)==0){
            Session::flash('info','Nu aveti nici o locatie');
            return redirect()->back();
        }
        $employee_signatures = \App\LotusSignature::pluck('name','name')->all();
        if(count($employee_signatures)==0){
            Session::flash('info','Nu aveti nici o semnatura de lotus');
            return redirect()->back();
        }
        $lotusGroups = \App\LotusGroups::pluck('name','name')->all();
        if(count($lotusGroups)==0){
            Session::flash('info','Nu aveti nici un grup de lotus definit');
            return redirect()->back();
        }
        $windowsGroup = \App\WindowsGroup::pluck('name','name')->all();
        if(count($windowsGroup)==0){
            Session::flash('info','Nu aveti nici un grup de lotus definit');
            return redirect()->back();
        }
        $departments = \App\Department::pluck('name','name')->all();
        if(count($departments)==0){
            Session::flash('info','Nu aveti nici un departament definit');
            return redirect()->back();
        }
        return view('admin.employment_forms_update.create2',compact('employmentUpdateForm','locations','employee_signatures','users','lotusGroups','windowsGroup','departments','companies'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EmploymentUpdateForm  $employmentUpdateForm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmploymentUpdateForm $employmentUpdateForm)
    {
        //
        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EmploymentUpdateForm  $employmentUpdateForm
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmploymentUpdateForm $employmentUpdateForm)
    {
        //
    }

    public function action($id,$action) {
        $employmentForm = EmploymentUpdateForm::findOrFail($id);

        $employmentForm->update(['status'=>$action]);
        Session::flash('success','fisa setata');
        return redirect()->back();
    }
}
