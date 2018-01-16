@extends('layouts.admin')
@section('content')

    <div class="panel panel-primary">
        <div class="panel panel-heading text-center">Update Companie</div>
        <div class="panel panel-body">
            <div class="row">
                {!! Form::model($company,['method'=>'PATCH','action'=>['CompanyController@update',$company->id]]) !!}
                <div class="col-lg-4">
                    <div class="form-group{{$errors->has('name')?' has-error':''}}">
                        {!! Form::label('name','Company Name') !!}
                        {!! Form::text('name',null,['class'=>'form-control']) !!}
                        @if($errors->has('name'))
                            <span class="help-block">
                                <strong>{{$errors->first('name')}}</strong>
                            </span>
                        @endif
                    </div>
                    {!! Form::submit('Update Company',['class'=>'btn btn-primary']) !!}
                </div>

                {!! Form::close() !!}
            </div>

        </div>
    </div>
@stop