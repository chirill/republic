@extends('layouts.admin')
@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading text-center">Locations table</div>
        <div class="panel-body">
            <div class="box-body">
                <table class="table table-bordered table-hover">
                    <thead>
                    <th>Nr</th>
                    <th>Location</th>
                    <th>Address</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @if($locations->count()>0)
                        @foreach($locations as $location)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$location->name}}</td>
                            <td>{{$location->address}}</td>
                            <td>
                                <a href="{{route('locations.edit',$location->id)}}" class="btn btn-xs btn-success">Edit</a>
                            </td>
                            <td>
                                {!! Form::open(['method'=>'DELETE','action'=>['LocationsController@destroy',$location->id]]) !!}
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