@extends('layouts.admin')
@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading text-center">Add location</div>
        <div class="panel-body">
            <div class="row">
                {!! Form::open(['method'=>'POST','action'=>'LocationsController@store']) !!}
                <div class="col-lg-4">
                    <div class="form-group{{$errors->has('name')?' has-error':''}}">
                        {!! Form::label('name','Location name') !!}
                        {!! Form::text('name',null,['class'=>'form-control']) !!}
                        @if($errors->has('name'))
                            <span class="help-block">
                                <strong>{{$errors->first('name')}}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{$errors->has('address')?' has-error':''}}">
                        {!! Form::label('address','Address') !!}
                        {!! Form::text('address',null,['class'=>'form-control']) !!}
                        @if($errors->has('address'))
                            <span class="help-block">
                                <strong>{{$errors->first('address')}}</strong>
                            </span>
                        @endif
                    </div>
                    {!! Form::submit('Add location',['class'=>'btn btn-primary']) !!}

                </div>
            </div>
        </div>
    </div>

@stop