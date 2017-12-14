@extends('layouts.admin')
@section('content')
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>

    </section>
<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>{{\App\Location::all()->count()}}</h3>

                <p>Locations</p>
            </div>
            <div class="icon">
                <a href="{{route('locations.create')}}" class="text-primary"><i class="ion ion-navigate"></i></a>

            </div>
            <a href="{{route('locations.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Bounce Rate</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>{{\App\User::all()->count()}}</h3>

                <p>User Registrations</p>
            </div>
            <div class="icon">
                <a href="{{route('users.create')}}" class="text-warning"><i class="ion ion-person-add"></i></a>

            </div>
            <a href="{{route('users.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>{{\App\EmploymentForm::all()->count()}}</h3>

                <p>Fisa angajare</p>
            </div>
            <div class="icon">
                <a href="{{route('employment_forms.create')}}" class="text-danger"><i class="ion ion-ios-paper"></i></a>

            </div>
            <a href="{{route('employment_forms.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>
<!-- /.row -->
@stop