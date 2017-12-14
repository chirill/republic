@extends('layouts.admin')
@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading text-center">Add Computer</div>
        <div class="panel-body">
            <div class="row">
                {!! Form::open(['method'=>'POST','action'=>'ComputersController@store']) !!}
                <div class="col-lg-4">
                    <div class="form-group{{$errors->has('name')?' has-error':''}}">
                        {!! Form::label('name','ComputerName') !!}
                        {!! Form::text('name',null,['class'=>'form-control']) !!}
                        @if($errors->has('name'))
                            <span class="help-block">
                                <strong>{{$errors->first('name')}}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{$errors->has('description')?' has-error':''}}">
                        {!! Form::label('description','Description') !!}
                        {!! Form::text('description',null,['class'=>'form-control']) !!}
                        @if($errors->has('description'))
                            <span class="help-block">
                                <strong>{{$errors->first('description')}}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{$errors->has('status')?' has-error':''}}">
                        {!! Form::label('status','Status') !!}
                        {!! Form::select('status',['','select a status'],null,['class'=>'form-control']) !!}
                        @if($errors->has('status'))
                            <span class="help-block">
                                <strong>{{$errors->first('status')}}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        {!! Form::label('user_id','Select user if need') !!}
                        {!! Form::select('user_id',[''=>'select a user if needed']+$users,null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('location_id','Select location') !!}
                        {!! Form::select('location_id',[''=>'select a location']+$locations,null,['class'=>'form-control']) !!}
                    </div>

                    {!! Form::submit('Add Computer',['class'=>'btn btn-primary']) !!}

                </div>
            </div>
        </div>
    </div>

@stop