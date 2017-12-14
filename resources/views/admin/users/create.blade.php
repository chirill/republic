@extends('layouts.admin')
@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading text-center">Add user</div>
        <div class="panel-body">
            {!! Form::open(['method'=>'POST','files'=>true,'action'=>'UsersController@store']) !!}
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group{{$errors->has('name')?' has-error':''}}">
                        {!! Form::label('name','Name') !!}
                        {!! Form::text('name',null,['class'=>'form-control']) !!}
                        @if($errors->has('name'))
                            <span class="help-block">
                                <strong>{{$errors->first('name')}}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{$errors->has('email')?' has-error':''}}">
                        {!! Form::label('email','Email') !!}
                        {!! Form::email('email',null,['class'=>'form-control']) !!}
                        @if($errors->has('email'))
                            <span class="help-block">
                                <strong>{{$errors->first('email')}}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{$errors->has('password')?' has-error':''}}">
                        {!! Form::label('password','Password') !!}
                        {!! Form::password('password',['class'=>'form-control']) !!}
                        @if($errors->has('password'))
                            <span class="help-block">
                                <strong>{{$errors->first('password')}}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{$errors->has('location_id')?' has-error':''}}">
                        {!! Form::label('location_id','Location') !!}
                        {!! Form::select('location_id',[''=>'select a location']+$locations,null,['class'=>'form-control']) !!}
                        @if($errors->has('location_id'))
                            <span class="help-block">
                                <strong>{{$errors->first('location_id')}}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group{{$errors->has('status')?' has-error':''}}">
                        {!! Form::label('status','Status') !!}
                        {!! Form::select('status',[''=>'choose status','0'=>'disabled','1'=>'active'],null,['class'=>'form-control']) !!}
                        @if($errors->has('status'))
                            <span class="help-block">
                                <strong>{{$errors->first('status')}}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        {!! Form::label('hobby','Hobby') !!}
                        {!! Form::text('hobby',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('about','About') !!}
                        {!! Form::text('about',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('avatar','Update your picture') !!}
                        {!! Form::file('avatar',null,['class'=>'form-control']) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">{!! Form::submit('Add user',['class'=>'btn btn-primary']) !!}</div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@stop