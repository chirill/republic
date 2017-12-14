@extends('layouts.admin')
@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading text-center">Lotus Signatures table</div>
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
                    @if($lotus_signatures->count()>0)
                        @foreach($lotus_signatures as $signature)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$signature->name}}</td>
                            <td>{{$signature->description}}</td>
                            <td>
                                <a href="{{route('lotus_signatures.edit',$signature->id)}}" class="btn btn-xs btn-success">Edit</a>
                            </td>
                            <td>
                                {!! Form::open(['method'=>'DELETE','action'=>['LotusSignaturesController@destroy',$signature->id]]) !!}
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