@extends('layouts.admin')
@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading text-center">Roles table</div>
        <div class="panel-body">
            <div class="box-body">
                <table class="table table-bordered table-hover">
                    <thead>
                    <th>Nr</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>User</th>
                    <th>Location</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @if($computers->count()>0)
                        @foreach($computers as $computer)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$computer->name}}</td>
                            <td>{{$computer->description}}</td>
                            <td>{{$computer->status}}</td>
                            <td>{{$computer->user_id?$computer->user->name:'nealocat'}}</td>
                            <td>{{$computer->location_id?$computer->location->name:'locatia nu e setata'}}</td>
                            <td>
                                <a href="{{route('computers.edit',$computer->id)}}" class="btn btn-xs btn-success">Edit</a>
                            </td>
                            <td>
                                {!! Form::open(['method'=>'DELETE','action'=>['ComputersController@destroy',$computer->id],'onsubmit'=>'return confirm("are you sure ?")']) !!}
                                {!! Form::submit('delete',['class'=>'btn btn-xs btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8" class="text-center">No data to display</td>
                        </tr>
                    @endif

                    </tbody>
                </table>
            </div>

        </div>
    </div>

@stop