@extends('layouts.admin')
@section('content')

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h2 class="text-center">Employment</h2>
        </div>
        <div class="panel-body">
            @if(count($employments)>0)

            <table class="table table-bordered table-hover" id="example">
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
                            <td>{{$employment->id}}</td>
                            <td>
                                <a href="{{route('employment_forms.show',$employment->id)}}">{{$employment->employee_name}}</a>
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
                                @if($employment->status != 'open')

                                <a href="{{route('employment_forms_update.create2',$employment->id)}}" class="btn btn-xs btn-primary">update</a>
                                    @else
                                    <a href="" class="btn btn-xs btn-primary disabled">update</a>
                                @endif
                            </td>

                            <td>

                                <a href="#" class="btn btn-xs btn-warning">out</a>

                            </td>
                            <td>
                                <a href="{{route('employment_forms.action',['id'=>$employment->id,'action'=>'in procesare'])}}">proces</a>
                                |
                                <a href="{{route('employment_forms.action',['id'=>$employment->id,'action'=>'open'])}}">open</a>
                                |
                                <a href="{{route('employment_forms.action',['id'=>$employment->id,'action'=>'close'])}}">close</a>
                            </td>
                            <td>
                                @if($employment->status == 'open')
                                <a href="{{route('employment_forms.edit',$employment->id)}}" class="btn btn-xs btn-success">Edit</a>
                                    @else
                                <a href="{{route('employment_forms.edit',$employment->id)}}" class="btn btn-xs btn-success disabled">Edit</a>
                                @endif

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
@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jq-3.2.1/dt-1.10.16/b-1.5.1/b-colvis-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/datatables.min.css"/>
@stop
@section('scripts')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.16/b-1.5.1/b-flash-1.5.1/b-html5-1.5.1/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>

    <script>
        $(document).ready(function() {
            var printCounter = 0;

            // Append a caption to the table before the DataTables initialisation
            $('#example').append('<caption style="caption-side: bottom">test function</caption>');

            $('#example').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copy',
                    {
                        extend: 'excel',
                        messageTop: 'The information in this table is copyright to Sirius Cybernetics Corp.'
                    },
                    {
                        extend: 'pdf',
                        messageBottom: null
                    },
                    {
                        extend: 'print',
                        messageTop: function () {
                            printCounter++;

                            if ( printCounter === 1 ) {
                                return 'This is the first time you have printed this document.';
                            }
                            else {
                                return 'You have printed this document '+printCounter+' times';
                            }
                        },
                        messageBottom: null
                    }
                ]
            } );
        } );
    </script>
@stop