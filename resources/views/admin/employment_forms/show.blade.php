@extends('layouts.admin')
@section('content')

    <div class="panel panel-default">
        <div class="panel-heading text-center">
           <h2>Fisa angajare - <strong>{{$employmentForm->employee_name}}</strong></h2>
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Compania angajatoare:</th>
                            <td>{{$employmentForm->employer_name}}</td>
                        </tr>
                        <tr>
                            <th>Locatia:</th>
                            <td>{{$employmentForm->location}}</td>
                        </tr>
                        <tr>
                            <th>Departament</th>
                            <td>{{$employmentForm->department}}</td>
                        </tr>
                        <tr>
                            <th>Cod Buget</th>
                            <td>{{$employmentForm->budget_code}}</td>
                        </tr>
                        <tr>
                            <th>Nume angajat:</th>
                            <td>{{$employmentForm->employee_name}}</td>
                        </tr>
                        <tr>
                            <th>Functie angajat:</th>
                            <td>{{$employmentForm->employee_role}}</td>
                        </tr>
                        <tr>
                            <th>Semnatura angajat:</th>
                            <td>{{$employmentForm->employee_signature}}</td>
                        </tr>
                        <tr>
                            <th>Data de incepere</th>
                            <td>{{$employmentForm->start_date}}</td>
                        </tr>
                        <tr>
                            <th>Grupuri Lotus</th>
                            <td>
                                @foreach($employmentForm->lotus_groups as $lgrup)
                                    <span class="label label-success">{{$lgrup}}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>Grupuri Windows</th>
                            <td>
                                @foreach($employmentForm->windows_groups as $wgrup)
                                    <span class="label label-primary">{{$wgrup}}</span>
                                @endforeach
                            </td>
                        </tr>

                        <tr class="{{$employmentForm->alert('computername')}}">
                            <th>Calculator alocat</th>
                            <td>{{!empty($employmentForm->computername)?$employmentForm->computername:'camp necompletat'}}</td>
                        </tr>


                        <tr class="{{$employmentForm->alert('ad_user')}}">
                            <th>User Windows</th>
                            <td>{{!empty($employmentForm->ad_user)?$employmentForm->ad_user:'camp necompletat'}}</td>
                        </tr>
                        <tr class="{{$employmentForm->alert('ad_pass')}}">
                            <th>Parola Windows</th>
                            <td>{{!empty($employmentForm->ad_pass)?$employmentForm->ad_pass:'camp necompletat'}}</td>
                        </tr>
                        <tr class="{{$employmentForm->alert('lotus_user')}}">
                            <th>User Lotus</th>
                            <td>{{!empty($employmentForm->lotus_user)?$employmentForm->lotus_user:'camp necompletat'}}</td>
                        </tr>
                        <tr class="{{$employmentForm->alert('lotus_pass')}}">
                            <th>Parola Lotus</th>
                            <td>{{!empty($employmentForm->lotus_pass)?$employmentForm->lotus_pass:'camp necompletat'}}</td>
                        </tr>
                    </table>

                </div>
                {{--Zona petru completare de IT--}}
                <div class="col-md-6">
                    {!! Form::open(['method'=>'POST', 'action'=>'EmploymentFormsController@addUser']) !!}
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>User Windows:</th>
                            <td>
                                <div class="form-group{{$errors->has('ad_user')?' has-error':''}}">

                                    {!! Form::text('ad_user',$employmentForm->ad_user,['class'=>'form-control']) !!}
                                    @if($errors->has('ad_user'))
                                        <span class="help-block">
                                            <strong>{{$errors->first('ad_user')}}</strong>
                                        </span>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>Parola Windows:</th>
                            <td>
                                <div class="form-group{{$errors->has('ad_pass')?' has-error':''}}">
                                    {!! Form::text('ad_pass',$employmentForm->ad_pass,['class'=>'form-control']) !!}
                                    @if($errors->has('ad_pass'))
                                        <span class="help-block">
                                            <strong>{{$errors->first('ad_pass')}}</strong>
                                        </span>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>ID Lotus:</th>
                            <td>
                                <div class="form-group{{$errors->has('lotus_user')?' has-error':''}}">
                                    {!! Form::text('lotus_user',$employmentForm->lotus_user,['class'=>'form-control']) !!}
                                    @if($errors->has('lotus_user'))
                                        <span class="help-block">
                                            <strong>{{$errors->first('lotus_user')}}</strong>
                                        </span>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>Parola Lotus:</th>
                            <td>
                                <div class="form-group{{$errors->has('lotus_pass')?' has-error':''}}">
                                    {!! Form::text('lotus_pass',$employmentForm->lotus_pass,['class'=>'form-control']) !!}
                                    @if($errors->has('lotus_pass'))
                                        <span class="help-block">
                                            <strong>{{$errors->first('lotus_pass')}}</strong>
                                        </span>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>Calculator alocat:</th>
                            <td>
                                <div class="form-group{{$errors->has('computername')?' has-error':''}}">
                                    {!! Form::text('computername',$employmentForm->computername,['class'=>'form-control']) !!}
                                    @if($errors->has('computername'))
                                        <span class="help-block">
                                            <strong>{{$errors->first('computername')}}</strong>
                                        </span>
                                    @endif
                                </div>
                            </td>
                        </tr>

                    </table>
                    {!! Form::hidden('employmentFormId',$employmentForm->id) !!}
                    {!! Form::hidden('status','in procesare') !!}
                    {!! Form::submit('Add Info',['class'=>'btn btn-warning']) !!}
                    {!! Form::close() !!}

                </div>
            </div>

                @if(count($employmentForm->updateFoms) > 0)
                <div class="col-md-12">
                    <table class="table table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>nume</th>
                            <th>angajator</th>
                            <th>status</th>
                            <th>data</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($employmentForm->updateFoms as $uform)
                            <tr>
                                <td><a href="{{route('employment_forms_update.show',$uform->id)}}">{{$uform->employee_name}}</a></td>
                                <td>{{$uform->employee_name}}</td>
                                <td>{{$uform->status}}</td>
                                <td>{{$uform->created_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="col-md-12">
                    <span class="text-danger">Nu avem fise de update</span>
                </div>
                @endif


        </div>

    </div>

    @stop