@extends('layouts.admin')
@section('content')
    <div class="panel panel-{{ count($errors->all())>0?'danger':'primary' }}">
        <div class="panel-heading">
            <h2>Employment Sheet Update</h2>
        </div>
        <div class="panel-body">
            {!! Form::model($employmentUpdateForm,['method'=>'POST','action'=>['EmploymentUpdateFormController@store']]) !!}

            {!! Form::hidden('form_applicant',Auth::user()->name) !!}
            {!! Form::hidden('status','open') !!}
            @if($employmentUpdateForm != null)
                {!! Form::hidden('employment_form_id',$employmentUpdateForm->id) !!}
            @else
                {!! Form::hidden('employment_form_id',0) !!}
            @endif
            <div class="row">
                <div class="col-lg-4">

                    <div class="form-group{{$errors->has('employer_name')?' has-error': ''}}">
                        {!! Form::label('employer_name','Employer Name') !!}
                        {!! Form::select('employer_name',  [
                            ''=>'Choose Employer'] +$companies,null,['class'=>'form-control']) !!}
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

                    <div class="form-group{{ $errors->has('employee_signature')?' has-error':'' }}">
                        {!! Form::label('employee_signature','Semnatura Lotus') !!}
                        {!! Form::select('employee_signature',[''=>'Select signature']+$employee_signatures,null,['class'=>'form-control']) !!}
                        @if($errors->has('employee_signature'))
                            <span class="help-block">
                                <strong>{{$errors->first('employee_signature')}}</strong>
                            </span>
                        @endif
                    </div>



                    <div class="form-group{{ $errors->has('user_id')?' has-error':'' }}">
                        {!! Form::label('user_id','Managej Angajator') !!}
                        {!! Form::select('user_id',[''=>'selectati manager angajarot']+$users,null,['class'=>'form-control']) !!}
                        @if($errors->has('user_id'))
                            <span class="help-block">
                                <strong>{{$errors->first('user_id')}}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('start_date')?' has-error':'' }}">
                        <div class="form-group{{ $errors->has('start_date')?' has-error':'' }}">
                            {!! Form::label('start_date','Data angajare') !!}
                            {!! Form::date('start_date',null,['class'=>'form-control']) !!}
                            @if($errors->has('start_date'))
                                <span class="help-block">
                                    <strong>{{$errors->first('start_date')}}</strong>
                                </span>
                            @endif

                        </div>

                        @if($errors->has('start_date'))
                            <span class="help-block">
                                    <strong>{{$errors->first('start_date')}}</strong>
                                </span>
                        @endif

                    </div>

                    <div class="form-group{{ $errors->has('contract_type')?' has-error':'' }}">
                        {!! Form::label('contract_type','Tip Contract') !!}
                        {!! Form::text('contract_type',null,['class'=>'form-control']) !!}
                        @if($errors->has('contract_type'))
                            <span class="help-block">
                                    <strong>{{$errors->first('contract_type')}}</strong>
                                </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('hours_per_day')?' has-error':'' }}">
                        {!! Form::label('hours_per_day','Hours per Day') !!}
                        {!! Form::text('hours_per_day',null,['class'=>'form-control']) !!}
                        @if($errors->has('hours_per_day'))
                            <span class="help-block">
                                    <strong>{{$errors->first('hours_per_day')}}</strong>
                                </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('desk')?' has-error':'' }}">
                        {!! Form::label('desk','Desk') !!}
                        {!! Form::select('desk',[''=>'Select Option','DA'=>'DA','NU'=>'NU'],null,['class'=>'form-control']) !!}
                        @if($errors->has('desk'))
                            <span class="help-block">
                                    <strong>{{$errors->first('desk')}}</strong>
                                </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('chair')?' has-error':'' }}">
                        {!! Form::label('chair','Chair') !!}
                        {!! Form::select('chair',[''=>'Select Option','DA'=>'DA','NU'=>'NU'],null,['class'=>'form-control']) !!}
                        @if($errors->has('chair'))
                            <span class="help-block">
                                    <strong>{{$errors->first('chair')}}</strong>
                                </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('land_line')?' has-error':'' }}">
                        {!! Form::label('land_line','Telefon fix') !!}
                        {!! Form::select('land_line',[''=>'Select Option','DA'=>'DA','NU'=>'NU'],null,['class'=>'form-control']) !!}
                        @if($errors->has('land_line'))
                            <span class="help-block">
                                    <strong>{{$errors->first('land_line')}}</strong>
                                </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('car')?' has-error':'' }}">
                        {!! Form::label('car','Masina') !!}
                        {!! Form::select('car',[''=>'Select Option','DA'=>'DA','NU'=>'NU'],null,['class'=>'form-control']) !!}
                        @if($errors->has('car'))
                            <span class="help-block">
                                <strong>{{$errors->first('car')}}</strong>
                            </span>
                        @endif
                    </div>

                </div>

                <div class="col-lg-4">

                    <div class="form-group{{ $errors->has('business_card')?' has-error':'' }}">
                        {!! Form::label('business_card','Card businex') !!}
                        {!! Form::select('business_card',[''=>'Select Option','DA'=>'DA','NU'=>'NU'],null,['class'=>'form-control']) !!}
                        @if($errors->has('business_card'))
                            <span class="help-block">
                                <strong>{{$errors->first('business_card')}}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('access_card')?' has-error':'' }}">
                        {!! Form::label('access_card','Card Acces birou') !!}
                        {!! Form::select('access_card',[''=>'Select Option','DA'=>'DA','NU'=>'NU'],null,['class'=>'form-control']) !!}
                        @if($errors->has('access_card'))
                            <span class="help-block">
                                <strong>{{$errors->first('access_card')}}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('keys')?' has-error':'' }}">
                        {!! Form::label('keys','Chei birou') !!}
                        {!! Form::select('keys',[''=>'Select Option','DA'=>'DA','NU'=>'NU'],null,['class'=>'form-control']) !!}
                        @if($errors->has('keys'))
                            <span class="help-block">
                                <strong>{{$errors->first('keys')}}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('desktop')?' has-error':'' }}">
                        {!! Form::label('desktop','desktop') !!}
                        {!! Form::select('desktop',[''=>'Select Option','DA'=>'DA','NU'=>'NU'],null,['class'=>'form-control']) !!}
                        @if($errors->has('desktop'))
                            <span class="help-block">
                                <strong>{{$errors->first('desktop')}}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('laptop')?' has-error':'' }}">
                        {!! Form::label('laptop','laptop') !!}
                        {!! Form::select('laptop',[''=>'Select Option','DA'=>'DA','NU'=>'NU'],null,['class'=>'form-control']) !!}
                        @if($errors->has('laptop'))
                            <span class="help-block">
                                <strong>{{$errors->first('laptop')}}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('network_printer')?' has-error':'' }}">
                        {!! Form::label('network_printer','network_printer') !!}
                        {!! Form::select('network_printer',[''=>'Select Option','DA'=>'DA','NU'=>'NU'],null,['class'=>'form-control']) !!}
                        @if($errors->has('network_printer'))
                            <span class="help-block">
                                <strong>{{$errors->first('network_printer')}}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('office_license')?' has-error':'' }}">
                        {!! Form::label('office_license','office_license') !!}
                        {!! Form::select('office_license',[''=>'Select Option','DA'=>'DA','NU'=>'NU'],null,['class'=>'form-control']) !!}
                        @if($errors->has('office_license'))
                            <span class="help-block">
                                <strong>{{$errors->first('office_license')}}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('windows_license')?' has-error':'' }}">
                        {!! Form::label('windows_license','windows_license') !!}
                        {!! Form::select('windows_license',[''=>'Select Option','DA'=>'DA','NU'=>'NU'],null,['class'=>'form-control']) !!}
                        @if($errors->has('windows_license'))
                            <span class="help-block">
                                <strong>{{$errors->first('windows_license')}}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('specific_license')?' has-error':'' }}">
                        {!! Form::label('specific_license','specific_license') !!}
                        {!! Form::select('specific_license',[''=>'Select Option','DA'=>'DA','NU'=>'NU'],null,['class'=>'form-control']) !!}
                        @if($errors->has('specific_license'))
                            <span class="help-block">
                                <strong>{{$errors->first('specific_license')}}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('antivirus')?' has-error':'' }}">
                        {!! Form::label('antivirus','antivirus') !!}
                        {!! Form::select('antivirus',[''=>'Select Option','DA'=>'DA','NU'=>'NU'],null,['class'=>'form-control']) !!}
                        @if($errors->has('antivirus'))
                            <span class="help-block">
                                <strong>{{$errors->first('antivirus')}}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('modem_3g')?' has-error':'' }}">
                        {!! Form::label('modem_3g','modem_3g') !!}
                        {!! Form::select('modem_3g',[''=>'Select Option','DA'=>'DA','NU'=>'NU'],null,['class'=>'form-control']) !!}
                        @if($errors->has('modem_3g'))
                            <span class="help-block">
                                <strong>{{$errors->first('modem_3g')}}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('internet')?' has-error':'' }}">
                        {!! Form::label('internet','internet') !!}
                        {!! Form::select('internet',[''=>'Select Option','DA'=>'DA','NU'=>'NU'],null,['class'=>'form-control']) !!}
                        @if($errors->has('internet'))
                            <span class="help-block">
                                <strong>{{$errors->first('internet')}}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('smartphone')?' has-error':'' }}">
                        {!! Form::label('smartphone','smartphone') !!}
                        {!! Form::select('smartphone',[''=>'Select Option','DA'=>'DA','NU'=>'NU'],null,['class'=>'form-control']) !!}
                        @if($errors->has('smartphone'))
                            <span class="help-block">
                                <strong>{{$errors->first('smartphone')}}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('mobile')?' has-error':'' }}">
                        {!! Form::label('mobile','mobile') !!}
                        {!! Form::select('mobile',[''=>'Select Option','DA'=>'DA','NU'=>'NU'],null,['class'=>'form-control']) !!}
                        @if($errors->has('mobile'))
                            <span class="help-block">
                                <strong>{{$errors->first('mobile')}}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('voice_subscription')?' has-error':'' }}">
                        {!! Form::label('voice_subscription','voice_subscription') !!}
                        {!! Form::select('voice_subscription',[''=>'Select Option','DA'=>'DA','NU'=>'NU'],null,['class'=>'form-control']) !!}
                        @if($errors->has('voice_subscription'))
                            <span class="help-block">
                                <strong>{{$errors->first('voice_subscription')}}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="col-lg-4">

                    <div class="form-group{{ $errors->has('data_subscription')?' has-error':'' }}">
                        {!! Form::label('data_subscription','data_subscription') !!}
                        {!! Form::select('data_subscription',[''=>'Select Option','DA'=>'DA','NU'=>'NU'],null,['class'=>'form-control']) !!}
                        @if($errors->has('data_subscription'))
                            <span class="help-block">
                                <strong>{{$errors->first('data_subscription')}}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('gsm_sim')?' has-error':'' }}">
                        {!! Form::label('gsm_sim','gsm_sim') !!}
                        {!! Form::select('gsm_sim',[''=>'Select Option','DA'=>'DA','NU'=>'NU'],null,['class'=>'form-control']) !!}
                        @if($errors->has('gsm_sim'))
                            <span class="help-block">
                                <strong>{{$errors->first('gsm_sim')}}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('ro_kpi')?' has-error':'' }}">
                        {!! Form::label('ro_kpi','ro_kpi') !!}
                        {!! Form::select('ro_kpi',[''=>'Select Option','DA'=>'DA','NU'=>'NU'],null,['class'=>'form-control']) !!}
                        @if($errors->has('ro_kpi'))
                            <span class="help-block">
                                <strong>{{$errors->first('ro_kpi')}}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('library_user')?' has-error':'' }}">
                        {!! Form::label('library_user','Library user') !!}
                        {!! Form::select('library_user',[''=>'Select Option','DA'=>'DA','NU'=>'NU'],null,['class'=>'form-control']) !!}
                        @if($errors->has('library_user'))
                            <span class="help-block">
                            <strong>{{$errors->first('library_user')}}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('wizz_user')?' has-error':'' }}">
                        {!! Form::label('wizz_user','Wizz user') !!}
                        {!! Form::select('wizz_user',[''=>'Select Option','DA'=>'DA','NU'=>'NU'],null,['class'=>'form-control']) !!}
                        @if($errors->has('wizz_user'))
                            <span class="help-block">
                            <strong>{{$errors->first('wizz_user')}}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('lotus_groups')?' has-error':'' }}">
                        {!! Form::label('lotus_groups','Lotus Grup') !!}
                        {!! Form::select('lotus_groups[]',$lotusGroups,null,['class'=>'form-control select2','data-placeholder'=>'selectati grupurile de lotus','multiple'=>'multiple']) !!}
                        @if($errors->has('lotus_groups'))
                            <span class="help-block">
                            <strong>{{$errors->first('lotus_groups')}}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('tw_consultant')?' has-error':'' }}">
                        {!! Form::label('tw_consultant','Temporary workforce consultant in lotus') !!}
                        {!! Form::select('tw_consultant',[''=>'Select Option','DA'=>'DA','NU'=>'NU'],null,['class'=>'form-control']) !!}
                        @if($errors->has('tw_consultant'))
                            <span class="help-block">
                            <strong>{{$errors->first('tw_consultant')}}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('tw_recruiter')?' has-error':'' }}">
                        {!! Form::label('tw_recruiter','Temporary recruiter in lotus list') !!}
                        {!! Form::select('tw_recruiter',[''=>'Select Option','DA'=>'DA','NU'=>'NU'],null,['class'=>'form-control']) !!}
                        @if($errors->has('tw_recruiter'))
                            <span class="help-block">
                            <strong>{{$errors->first('tw_recruiter')}}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('include_tb_ro')?' has-error':'' }}">
                        {!! Form::label('include_tb_ro','Include to TB_ro') !!}
                        {!! Form::select('include_tb_ro',[''=>'Select Option','DA'=>'DA','NU'=>'NU'],null,['class'=>'form-control']) !!}
                        @if($errors->has('include_tb_ro'))
                            <span class="help-block">
                            <strong>{{$errors->first('include_tb_ro')}}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('include_pl_ro')?' has-error':'' }}">
                        {!! Form::label('include_pl_ro','Inlcude to PL_ro') !!}
                        {!! Form::select('include_pl_ro',[''=>'Select Option','DA'=>'DA','NU'=>'NU'],null,['class'=>'form-control']) !!}
                        @if($errors->has('include_pl_ro'))
                            <span class="help-block">
                            <strong>{{$errors->first('include_pl_ro')}}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('lotus_groups')?' has-error':'' }}">
                        {!! Form::label('windows_groups','Grupui Windows') !!}
                        {!! Form::select('windows_groups[]',$windowsGroup,null,['class'=>'form-control select2','multiple'=>'multiple','data-placeholder'=>'Selectati grupurile de windows','width'=>'100%']) !!}
                        @if($errors->has('windows_groups'))
                            <span class="help-block">
                            <strong>{{$errors->first('windows_groups')}}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('approved_employment_budget')?' has-error':'' }}">
                        {!! Form::label('approved_employment_budget','approved_employment_budget') !!}
                        {!! Form::select('approved_employment_budget',[''=>'Select Option','DA'=>'DA','NU'=>'NU'],null,['class'=>'form-control']) !!}
                        @if($errors->has('approved_employment_budget'))
                            <span class="help-block">
                            <strong>{{$errors->first('approved_employment_budget')}}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('approved_acquisitions_budget')?' has-error':'' }}">
                        {!! Form::label('approved_acquisitions_budget','approved_acquisitions_budget') !!}
                        {!! Form::select('approved_acquisitions_budget',[''=>'Select Option','DA'=>'DA','NU'=>'NU'],null,['class'=>'form-control']) !!}
                        @if($errors->has('approved_acquisitions_budget'))
                            <span class="help-block">
                            <strong>{{$errors->first('approved_acquisitions_budget')}}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group">
                        {!! Form::label('description','Description') !!}
                        {!! Form::text('description',null,['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group text-center">
                            {!! Form::submit('Create Employment Sheet',['class'=>'btn btn-primary']) !!}
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>


@stop
@section('styles')
    <link rel="stylesheet" href="{{asset('app/bower_components/select2/dist/css/select2.min.css')}}">

@stop
@section('scripts')
    <script src="{{asset('app/bower_components/select2/dist/js/select2.full.min.js')}}"></script>

    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2({
                closeOnSelect: false,
                allowClear: true
            })

        })

    </script>
@stop
