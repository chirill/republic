<?php

namespace App\Http\Controllers;

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
        $employments = EmploymentForm::orderBy('sheet_id')->get()->all();

        return view('admin.employment_forms.index',compact('employments'));
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


        return view('admin.employment_forms.create',compact('locations','employee_signatures','users','lotusGroups','windowsGroup','departments'));
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

        if ($request->approved_acquisitions_budget == 'NU' && $request->approved_employment_budget=='NU'){
            Session::flash('error','Nu puteti angaja o persoana fara a avea bugetul aprobat');
            return redirect()->back();
        }
        $input = $request->all();
        $input['employee_manager'] = User::whereId($request->employee_manager)->select('name')->get()->first();
        $input['manager_id']=$request->employee_manager;
        $manager = User::whereId($request->employee_manager)->select('name')->get()->first();
        $input['employee_manager']= $manager->name;
        $employment = EmploymentForm::create($input);
        $employment->sheet_id = $employment->id;
        $employment->save();
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
        return view('');

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


    //FUNCTIE PENTRU A CREA FISA DE UPDATE IN BAZA FISEI DE IN

    public function update_form($id){
        $employment = EmploymentForm::whereSheetId($id)->latest()->first();
        //dd($update);
        $lotusGroups = LotusGroups::pluck('name','name')->all();
        if(count($lotusGroups) ==0 ){
            Session::flash('info','you need to have at leaste 1 lotus group');
            return redirect()->back();
        }
        $windowsGroup = WindowsGroup::pluck('name','name')->all();
        $employee_signatures = LotusSignature::pluck('name','name')->all();
        if(count($employee_signatures) ==0 ){
            Session::flash('info','you need to have at leaste 1 lotus signature');
            return redirect()->back();
        }
        $locations = Location::pluck('name','name')->all();
        $users = User::pluck('name','id')->all();
        $departments = Department::pluck('name','name')->all();
        return view('admin.employment_forms_update.create',compact('departments','employment','lotusGroups','windowsGroup','employee_signatures','locations','users'));
    }

    public function update_store(Request $request){
        if ($request->approved_acquisitions_budget == 'NU' && $request->approved_employment_budget=='NU'){
            Session::flash('error','Nu puteti angaja o persoana fara a avea bugetul aprobat');
            return redirect()->back();
        }
        $input = $request->all();
        $input['employee_manager'] = User::whereId($request->employee_manager)->select('name')->get()->first();
        $input['manager_id']=$request->employee_manager;
        $manager = User::whereId($request->employee_manager)->select('name')->get()->first();

        $input['employee_manager']= $manager->name;
        EmploymentForm::create($input);
        Session::flash('success','Fisa de angajare creata cu succces');
        return redirect()->route('employment_forms.index');
    }
    public function out($id=null){
        $employment = EmploymentForm::whereSheetId($id)->latest()->first();

        $locations = Location::pluck('name','name')->all();
        $departments = Department::pluck('name','name')->all();
        $users = User::pluck('name','id')->all();
        return view('admin.employment_out.create',compact('locations','departments','users','employment'));
    }
    public function out_store(){
        dd(request()->all());
        return redirect()->back();
    }



}
