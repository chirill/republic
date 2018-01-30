@extends('layouts.admin')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading text-center">
            <h2>User view - <strong>{{$user->name}}</strong></h2>
        </div>
        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Nume utilizator</th>
                            <td>{{$user->name}}</td>
                        </tr>
                        <tr>
                            <th>Locatia:</th>
                            <td>{{$user->location_id !=null ? $user->location->name:'locatie nu a fost setata'}}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{$user->email}}</td>
                        </tr>
                        <tr>
                            <th>Locatia:</th>
                            <td>{{$user->department_id !=null ? $user->department->name:'departamentul nu este setat'}}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{$user->status==1?'Activ':'Disabled'}}</td>
                        </tr>
                        <tr>
                            <th>Hobby</th>
                            <td>{{$user->profile !=null?$user->profile->hobby:'no hobby'}}</td>
                        </tr>
                    </table>
                    <a href="{{route('users.edit',$user->id)}}" class="btn btn-default">Edit</a>
                </div>
                <div class="col-md-6">
                    @if(!empty($user->profile->avatar))
                        <img src="{{$user->profile->avatar}}" alt="{{$user->name}}" >
                    @else
                        no picture
                    @endif

                </div>
            </div>



        </div>

    </div>
    @stop