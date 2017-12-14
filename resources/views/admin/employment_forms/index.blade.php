@extends('layouts.admin')
@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h2 class="text-center">Employment</h2>
        </div>
        <div class="panel-body">
            @if(count($employments)>0)
            <table class="table table-bordered table-hover">
                <thead>
                    <th>Nr</th>
                    <th>Employee Name</th>
                    <th>Employee Manager</th>
                    <th>Start Date</th>
                    <th>Status</th>
                    <th colspan="3" class="text-center">Actiune</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Created at</th>
                </thead>
                <tbody>
                    @foreach($employments as $employment)
                        <tr class="{{$employment->form_type =='fisa_update'?'bg-info':''}}">
                            <td>{{$employment->sheet_id}}</td>
                            <td>
                                <a href="{{route('employment_forms.show',$employment->id)}}">{{$employment->employee_name}}</a>
                            </td>
                            <td>
                                {{$employment->employee_manager}}
                            </td>
                            <td>
                                {{$employment->start_date}}
                            </td>
                            <td>
                                {{$employment->status}}
                            </td>
                            <td>
                                @if($employment->form_type == 'fisa_in')
                                <a href="{{route('employment_forms.update_form',$employment->sheet_id)}}" class="btn btn-xs btn-primary">update</a>
                                    @endif
                            </td>
                            <td>
                                @if($employment->form_type == 'fisa_in')
                                <a href="{{route('employment_forms.out',$employment->sheet_id)}}" class="btn btn-xs btn-warning">out</a>
                                    @endif
                            </td>
                            <td>
                                @if($employment->form_type == 'fisa_in')
                                    <a href="" class="btn btn-xs btn-info">alocare</a>
                                    @endif
                            </td>
                            <td>
                                <a href="{{route('employment_forms.edit',$employment->id)}}" class="btn btn-xs btn-success">Edit</a>
                            </td>
                            <td>
                                {!! Form::open(['method'=>'DELETE','action'=>['EmploymentFormsController@destroy',$employment->id],'onsubmit'=>'return confirm("are you sure ?")']) !!}
                                {!! Form::submit('Delete',['class'=>'btn btn-xs btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                            <td>{{$employment->created_at}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @else
                <h2 class="text-center">No Employer Sheet created</h2>
            @endif
        </div>
    </div>


    @stop