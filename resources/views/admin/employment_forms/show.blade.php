@extends('layouts.admin')
@section('content')
    <h2>Show lotus grup</h2>
    {{$lotusGroup->name}}
    <br>
    <br>
    <a href="{{route('lotus_groups.edit',$lotusGroup->id)}}"><button class="btn btn-info">Edit</button></a>

    @stop