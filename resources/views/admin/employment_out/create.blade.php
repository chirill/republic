@extends('layouts.admin')
@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h2 class="text-center">Fisa OUT</h2>
        </div>
        <div class="panel-body">
            {!! Form::model($employment,['method'=>'POST','action'=>'EmploymentFormsController@out_store']) !!}

            {!! Form::hidden('form_applicant',Auth::user()->name) !!}
            {!! Form::hidden('status','neprocesat') !!}
            {!! Form::hidden('form_type','fisa_out') !!}
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group{{$errors->has('employer_name')?' has-error': ''}}">
                        {!! Form::label('employer_name','Employer Name') !!}
                        {!! Form::select('employer_name',  [
                            ''=>'Choose Employer',
                            'lugera & makler srl'=>'Lugera & Makler SRL',
                            'lugera & makler broker'=>'Lugera & Makler Broker',
                            'lugera & makler payroll' => 'Lugera & Makler Payroll',
                        ],null,['class'=>'form-control']) !!}
                        @if ($errors->has('employer_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('employer_name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{$errors->has('location')?' has-error': ''}}">
                        {!! Form::label('location','Location:') !!}
                        {!! Form::select('location',[''=>'Choose Location'] + $locations,null,['class'=>'form-control']) !!}
                        @if ($errors->has('location'))
                            <span class="help-block">
                                <strong>{{ $errors->first('location') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{$errors->has('department')?' has-error':''}}">
                        {!! Form::label('department','Department') !!}
                        {!! Form::select('department',[''=>'Selectati departamentul']+$departments,null,['class'=>'form-control']) !!}
                        @if($errors->has('department'))
                            <span class="help-block">
                                <strong>{{$errors->first('department')}}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{$errors->has('budget_code')?' has-error':''}}">
                        {!! Form::label('budget_code','Cod Buget') !!}
                        {!! Form::text('budget_code',null,['class'=>'form-control']) !!}
                        @if($errors->has('budget_code'))
                            <span class="help-block">
                                <strong>{{$errors->first('budget_code')}}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('employee_name')?' has-error':'' }}">
                        {!! Form::label('employee_name','Nume angajat') !!}
                        {!! Form::text('employee_name',null,['class'=>'form-control','placeholder'=>'Nume Prenum1....']) !!}
                        @if($errors->has('employee_name'))
                            <span class="help-block">
                                <strong>{{$errors->first('employee_name')}}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('employee_role')?' has-error':'' }}">
                        {!! Form::label('employee_role','Functie companie') !!}
                        {!! Form::text('employee_role',null,['class'=>'form-control']) !!}
                        @if($errors->has('employee_role'))
                            <span class="help-block">
                                <strong>{{$errors->first('employee_role')}}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('employee_manager')?' has-error':'' }}">
                        {!! Form::label('employee_manager','Managej Angajator') !!}
                        {!! Form::select('employee_manager',[''=>'selectati manager angajarot']+$users,isset($employment->manager_id)?$employment->manager_id:null,['class'=>'form-control']) !!}
                        @if($errors->has('employee_manager'))
                            <span class="help-block">
                                <strong>{{$errors->first('employee_manager')}}</strong>
                            </span>
                        @endif
                    </div>
                    {{--//'sn_laptop' => 'required',--}}
                    {{--//'computername' => 'required',--}}
                    {{--//'laptop_condition' => 'required',--}}
                    {{--//'laptop_accessories' => 'required',--}}
                    {{--//'laptop_accessories' => 'required',--}}


                </div>
                <div class="col-lg-4">
                    <div class="form-group{{$errors->has('laptop_model')?' has-error':''}}">
                        {!! Form::label('laptop_model','Model calculator') !!}
                        {!! Form::text('laptop_model',null,['class'=>'form-control']) !!}
                        @if($errors->has('laptop_model'))
                            <span class="help-block">
                                <strong>{{$errors->first('laptop_model')}}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{$errors->has('sn_laptop')?' has-error':''}}">
                        {!! Form::label('sn_laptop','SN calculator') !!}
                        {!! Form::text('sn_laptop',null,['class'=>'form-control']) !!}
                        @if($errors->has('sn_laptop'))
                            <span class="help-block">
                                <strong>{{$errors->first('sn_laptop')}}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{$errors->has('computername')?' has-error':''}}">
                        {!! Form::label('computername','Nume calculator') !!}
                        {!! Form::text('computername',null,['class'=>'form-control']) !!}
                        @if($errors->has('computername'))
                            <span class="help-block">
                                <strong>{{$errors->first('computername')}}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{$errors->has('laptop_condition')?' has-error':''}}">
                        {!! Form::label('laptop_condition','Stare calculator') !!}
                        {!! Form::text('laptop_condition',null,['class'=>'form-control']) !!}
                        @if($errors->has('laptop_condition'))
                            <span class="help-block">
                                <strong>{{$errors->first('laptop_condition')}}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{$errors->has('laptop_accessories')?' has-error':''}}">
                        {!! Form::label('laptop_accessories','Accesorii laptop') !!}
                        {!! Form::text('laptop_accessories',null,['class'=>'form-control']) !!}
                        @if($errors->has('laptop_accessories'))
                            <span class="help-block">
                                <strong>{{$errors->first('laptop_accessories')}}</strong>
                            </span>
                        @endif
                    </div>
                </div>
    {{--partea de mobil--}}
                <div class="col-lg-4">
                    <div class="form-group{{$errors->has('phone_model')?' has-error':''}}">
                        {!! Form::label('phone_model','Model telefon') !!}
                        {!! Form::text('phone_model',null,['class'=>'form-control']) !!}
                        @if($errors->has('phone_model'))
                            <span class="help-block">
                                <strong>{{$errors->first('phone_model')}}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{$errors->has('phone_sn')?' has-error':''}}">
                        {!! Form::label('phone_sn','SN telefon') !!}
                        {!! Form::text('phone_sn',null,['class'=>'form-control']) !!}
                        @if($errors->has('phone_sn'))
                            <span class="help-block">
                                <strong>{{$errors->first('phone_sn')}}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{$errors->has('phone_name')?' has-error':''}}">
                        {!! Form::label('phone_name','Nume intern telefon') !!}
                        {!! Form::text('phone_name',null,['class'=>'form-control']) !!}
                        @if($errors->has('phone_name'))
                            <span class="help-block">
                                <strong>{{$errors->first('phone_name')}}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{$errors->has('phone_condition')?' has-error':''}}">
                        {!! Form::label('phone_condition','Stare telefon') !!}
                        {!! Form::text('phone_condition',null,['class'=>'form-control']) !!}
                        @if($errors->has('phone_condition'))
                            <span class="help-block">
                                <strong>{{$errors->first('phone_condition')}}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{$errors->has('phone_accessories')?' has-error':''}}">
                        {!! Form::label('phone_accessories','Accesorii telefon') !!}
                        {!! Form::text('phone_accessories',null,['class'=>'form-control']) !!}
                        @if($errors->has('phone_accessories'))
                            <span class="help-block">
                                <strong>{{$errors->first('phone_accessories')}}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{$errors->has('phone_number')?' has-error':''}}">
                        {!! Form::label('phone_number','numar mobil') !!}
                        {!! Form::text('phone_number',null,['class'=>'form-control']) !!}
                        @if($errors->has('phone_number'))
                            <span class="help-block">
                                <strong>{{$errors->first('phone_number')}}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            {!! Form::submit('fisa out',['class'=>'btn btn-default']) !!}
            {!! Form::close() !!}
        </div>
    </div>


    @stop