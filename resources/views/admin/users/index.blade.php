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
                        <th colspan="2">Status</th>
                        <th>Edit</th>
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

                                @if(Auth::user()->id != $user->id)
                                    @if($user->status)
                                        <td>active</td>
                                        <td>
                                        <a href="{{route('users.disabled',$user->id)}}" class="btn btn-xs btn-danger">disable user</a>
                                        </td>
                                    @else
                                    <td>not active</td>
                                    <td>
                                        <a href="{{route('users.active',$user->id)}}" class="btn btn-xs btn-success">activate user</a>
                                    </td>
                                    @endif
                                @else
                                    <td></td>
                                    <td></td>
                                @endif
                            <td><a href="{{route('users.edit',$user->id)}}" class="btn btn-xs btn-success">Edit</a></td>
                            <td>
                                {!! Form::open(['method'=>'DELETE','action'=>['UsersController@destroy',$user->id]]) !!}
                                {!! Form::submit('trash',['class'=>'btn btn-xs btn-danger']) !!}
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