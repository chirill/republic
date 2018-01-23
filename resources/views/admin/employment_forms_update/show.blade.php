@extends('layouts.admin')
@section('content')

    <div class="panel panel-default">
        <div class="panel-heading text-center">
            <h2>Fisa update angajare - <strong>{{$employmentUpdateForm->employee_name}}</strong></h2>
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Compania angajatoare:</th>
                            <td>{{$employmentUpdateForm->employer_name}}</td>
                        </tr>
                        <tr>
                            <th>Locatia:</th>
                            <td>{{$employmentUpdateForm->location}}</td>
                        </tr>
                        <tr>
                            <th>Departament</th>
                            <td>{{$employmentUpdateForm->department}}</td>
                        </tr>
                        <tr>
                            <th>Cod Buget</th>
                            <td>{{$employmentUpdateForm->budget_code}}</td>
                        </tr>
                        <tr>
                            <th>Nume angajat:</th>
                            <td>{{$employmentUpdateForm->employee_name}}</td>
                        </tr>
                        <tr>
                            <th>Functie angajat:</th>
                            <td>{{$employmentUpdateForm->employee_role}}</td>
                        </tr>
                        <tr>
                            <th>Semnatura angajat:</th>
                            <td>{{$employmentUpdateForm->employee_signature}}</td>
                        </tr>
                        <tr>
                            <th>Data de incepere</th>
                            <td>{{$employmentUpdateForm->start_date}}</td>
                        </tr>
                        <tr>
                            <th>Grupuri Lotus</th>
                            <td>
                                @foreach($employmentUpdateForm->lotus_groups as $lgrup)
                                    <span class="label label-success">{{$lgrup}}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>Grupuri Windows</th>
                            <td>
                                @foreach($employmentUpdateForm->windows_groups as $wgrup)
                                    <span class="label label-primary">{{$wgrup}}</span>
                                @endforeach
                            </td>
                        </tr>

                        <tr class="{{$employmentUpdateForm->alert('computername')}}">
                            <th>Calculator alocat</th>
                            <td>{{!empty($employmentUpdateForm->computername)?$employmentUpdateForm->computername:'camp necompletat'}}</td>
                        </tr>


                        <tr class="{{$employmentUpdateForm->alert('ad_user')}}">
                            <th>User Windows</th>
                            <td>{{!empty($employmentUpdateForm->ad_user)?$employmentUpdateForm->ad_user:'camp necompletat'}}</td>
                        </tr>
                        <tr class="{{$employmentUpdateForm->alert('ad_pass')}}">
                            <th>Parola Windows</th>
                            <td>{{!empty($employmentUpdateForm->ad_pass)?$employmentUpdateForm->ad_pass:'camp necompletat'}}</td>
                        </tr>
                        <tr class="{{$employmentUpdateForm->alert('lotus_user')}}">
                            <th>User Lotus</th>
                            <td>{{!empty($employmentUpdateForm->lotus_user)?$employmentUpdateForm->lotus_user:'camp necompletat'}}</td>
                        </tr>
                        <tr class="{{$employmentUpdateForm->alert('lotus_pass')}}">
                            <th>Parola Lotus</th>
                            <td>{{!empty($employmentUpdateForm->lotus_pass)?$employmentUpdateForm->lotus_pass:'camp necompletat'}}</td>
                        </tr>
                    </table>
                </div>
            </div>




        </div>

    </div>

@stop