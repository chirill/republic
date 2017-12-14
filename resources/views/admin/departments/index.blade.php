@extends('layouts.admin')
@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading text-center">Departments table</div>
        <div class="panel-body">
            <div class="box-body">
                <table class="table table-bordered table-hover">
                    <thead>
                    <th>Nr</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @if($departments->count()>0)
                        @foreach($departments as $department)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$department->name}}</td>
                            <td>{{$department->description}}</td>
                            <td>
                                <a href="{{route('departments.edit',$department->id)}}" class="btn btn-xs btn-success">Edit</a>
                            </td>
                            <td>
                                {!! Form::open(['method'=>'DELETE','action'=>['DepartmentsController@destroy',$department->id]]) !!}
                                {!! Form::submit('delete',['class'=>'btn btn-xs btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="text-center">No data to display</td>
                        </tr>
                    @endif

                    </tbody>
                </table>
            </div>

        </div>
    </div>

@stop