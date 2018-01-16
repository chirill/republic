@extends('layouts.admin')
@section('content')
    <a href="{{route('companies.create')}}" class="btn btn-danger">Add new Company</a>
    <br><br>
    <div class="panel panel-primary">
        <div class="panel panel-heading text-center">
            COmpany table
        </div>
        <div class="panel panel-body">
            <div class="box-body">
                @if(count($companies)>0)
                <table class="table table-bordered table-hover">
                    <thead>
                        <th>id</th>
                        <th>Company name</th>
                        <th>edit</th>
                        <th>delete</th>
                    </thead>
                    <tbody>
                        @foreach($companies as $company)
                            <tr>
                                <td>{{$company->id}}</td>
                                <td>{{$company->name}}</td>
                                <td>
                                    <a href="{{route('companies.edit',$company->id)}}" class="btn btn-xs btn-warning">Update</a>
                                </td>
                                <td>
                                    {!! Form::open(['method'=>'DELETE','action'=>['CompanyController@destroy',$company->id],'onsubmit'=>'return confirm("are you sure ?")']) !!}
                                    {!! Form::submit('delete',['class'=>'btn btn-xs btn-danger']) !!}
                                </td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
                    @else
                <h2>no company saved</h2>
                    @endif
            </div>
        </div>
    </div>
@stop