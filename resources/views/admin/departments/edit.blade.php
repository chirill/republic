@extends('layouts.admin')
@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading text-center">Edit role: {{$department->name}}</div>
        <div class="panel-body">
            <div class="row">
                {!! Form::model($department,['method'=>'PATCH','action'=>['DepartmentsController@update',$department->id]]) !!}
                <div class="col-lg-4">
                    <div class="form-group{{$errors->has('name')?' has-error':''}}">
                        {!! Form::label('name','Department name') !!}
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
                                <strong>{{$errors->first('address')}}</strong>
                            </span>
                        @endif
                    </div>
                    {!! Form::submit('Update',['class'=>'btn btn-primary']) !!}

                </div>
            </div>
        </div>
    </div>

@stop