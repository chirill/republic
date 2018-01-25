@extends('layouts.admin')
@section('content')

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h2 class="text-center">Employment update</h2>
        </div>
        <div class="panel-body">
            @if(count(\App\EmploymentUpdateForm::all())>0)
                <table class="table table-bordered table-hover">
                    <thead>
                    <th>Nr</th>
                    <th>Employee Name</th>
                    <th>Employee Manager</th>
                    <th>Start Date</th>
                    <th>Status</th>
                    <th>Actiune</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Created at</th>
                    </thead>
                    <tbody>


                    @foreach($employments as $form)
                        @php($employment  = \App\EmploymentUpdateForm::where('employment_form_id',$form->id)->latest()->first())
                        <tr>
                            <td>{{$employment->id}}</td>
                            <td>
                                <a href="{{route('employment_forms_update.show',$employment->id)}}">{{$employment->employee_name}}</a>
                            </td>
                            <td>
                                {{$employment->manager->name}}
                            </td>
                            <td>
                                {{$employment->start_date}}
                            </td>
                            <td>
                                {{$employment->status}}
                            </td>
                            <td>
                                <a href="{{route('employment_forms_update.action',['id'=>$employment->id,'action'=>'in procesare'])}}">proces</a>
                                |
                                <a href="{{route('employment_forms_update.action',['id'=>$employment->id,'action'=>'open'])}}">open</a>
                                |
                                <a href="{{route('employment_forms_update.action',['id'=>$employment->id,'action'=>'close'])}}">close</a>
                            </td>
                            <td>
                                @if($employment->status == 'open')
                                    <a href="{{route('employment_forms.edit',$employment->id)}}" class="btn btn-xs btn-success">Edit</a>
                                @else
                                    <a href="{{route('employment_forms.edit',$employment->id)}}" class="btn btn-xs btn-success disabled">Edit</a>
                                @endif

                            </td>
                            <td>
                                {!! Form::open(['method'=>'DELETE','action'=>['EmploymentUpdateFormController@destroy',$employment->id],'onsubmit'=>'return confirm("are you sure ?")']) !!}
                                {!! Form::submit('Trash',['class'=>'btn btn-xs btn-danger']) !!}
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