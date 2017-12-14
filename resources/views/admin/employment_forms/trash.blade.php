@extends('layouts.admin')
@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h2 class="text-center">Employment Forms Trash</h2>
        </div>
        <div class="panel-body">
            @if(count($employments)>0)
                <table class="table">
                    <thead>
                    <th>Nr</th>
                    <th>Employee Name</th>
                    <th>Employee Manager</th>
                    <th>Start Date</th>
                    <th>Status</th>
                    <th>Update</th>
                    <th>Restore</th>
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
                                    <a href="{{route('employment_forms.create',$employment->sheet_id)}}  ">update</a>
                                @endif
                            </td>
                            <td>
                                {!! Form::open(['method'=>'POST','action'=>['EmploymentFormsController@restore',$employment->id]]) !!}
                                {!! Form::submit('restore',['class'=>'btn btn-xs btn-success']) !!}
                                {!! Form::close() !!}
                            </td>
                            <td>
                                {!! Form::open(['method'=>'DELETE','action'=>['EmploymentFormsController@kill',$employment->id],'onsubmit'=>'return confirm("are you sure ?")']) !!}
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