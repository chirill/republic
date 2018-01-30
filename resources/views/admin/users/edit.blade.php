@extends('layouts.admin')
@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading text-center">Update user {{$user->name}}</div>
        <div class="panel-body">
            <div class="row">
                {!! Form::model($user,['method'=>'PATCH','files'=>true,'action'=>['UsersController@update',$user->id]]) !!}
                <div class="col-lg-4">

                    <div class="form-group{{$errors->has('name')?' has-error':''}}">
                        {!! Form::label('name','Name') !!}
                        {!! Form::text('name',$user->name,['class'=>'form-control']) !!}
                        @if($errors->has('name'))
                            <span class="help-block">
                                <strong>{{$errors->first('name')}}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{$errors->has('email')?' has-error':''}}">
                        {!! Form::label('email','Email') !!}
                        {!! Form::email('email',$user->email,['class'=>'form-control']) !!}
                        @if($errors->has('email'))
                            <span class="help-block">
                                <strong>{{$errors->first('email')}}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        {!! Form::label('password','Password') !!}
                        {!! Form::password('password',['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group{{$errors->has('location_id')?' has-error':''}}">
                        {!! Form::label('location_id','Location') !!}
                        {!! Form::select('location_id',[''=>'choose location']+$locations,null,['class'=>'form-control']) !!}
                        @if($errors->has('location_id'))
                            <span class="help-block">
                                <strong>{{$errors->first('location_id')}}</strong>
                            </span>
                        @endif
                    </div>
                    {!! Form::submit('Update',['class'=>'btn btn-primary']) !!}
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
                        {!! Form::text('hobby',$user->profile->hobby,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('about','About') !!}
                        {!! Form::text('about',$user->profile->about,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('avatar','Update your picture') !!}
                        {!! Form::file('avatar',null,['class'=>'form-control']) !!}
                    </div>

                </div>

                <div class="pull-right">
                    <img src="{{$user->profile->avatar}}" alt="" width="250px">
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@stop