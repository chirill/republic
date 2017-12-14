@extends('layouts.admin')
@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading text-center">Windows Groups table</div>
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
                    @if($windowsGroups->count()>0)
                        @foreach($windowsGroups as $wgroup)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$wgroup->name}}</td>
                            <td>{{$wgroup->description}}</td>
                            <td>
                                <a href="{{route('windows_groups.edit',$wgroup->id)}}" class="btn btn-xs btn-success">Edit</a>
                            </td>
                            <td>
                                {!! Form::open(['method'=>'DELETE','action'=>['WindowsGroupsController@destroy',$wgroup->id]]) !!}
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