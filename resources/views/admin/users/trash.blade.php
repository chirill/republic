@extends('layouts.admin')
@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading text-center">Users table</div>
        <div class="panel-body">
            <div class="box-body">
                <table class="table table-bordered table-hover">
                    <thead>
                    <th>Nr</th>
                    <th>Picture</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Restore</th>
                    <th>Delete</th>
                    </thead>
                    <tbody>
                    @php($i = 1)
                    @foreach($users as $user)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>
                                @if(!empty($user->profile->avatar))
                                    <img src="{{$user->profile->avatar}}" alt="{{$user->name}}" width="50px">
                                @else
                                    no picture
                                @endif
                            </td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>


                            <td>
                                {!! Form::open(['method'=>'POST','action'=>['UsersController@restore',$user->id]]) !!}
                                {!! Form::submit('restore',['class'=>'btn btn-xs btn-success']) !!}
                                {!! Form::close() !!}
                            </td>
                            <td>
                                {!! Form::open(['method'=>'DELETE','action'=>['UsersController@kill',$user->id]]) !!}
                                {!! Form::submit('delete',['class'=>'btn btn-xs btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

@stop