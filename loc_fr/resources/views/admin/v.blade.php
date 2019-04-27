<!-- admin view table fo voluntter -->
@extends('layouts.app')

@section('content')

<div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Volunteers</b></h2></div>
                </div>
            </div>
            <table class="table table-striped table-hover table-bordered" style="background-color:white;">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile Number</th>
                        <th>Type</th>
                        <th>Gender</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($volunteers) > 0 )
                    @foreach ($volunteers as $u)
                            <tr>
                                <td>{{$u->name}}</td>
                                <td>{{$u->email}}</td>
                                <td>{{$u->mobile_no}}</td>
                                <td>{{$u->type}}</td>
                                <td>{{$u->gender}}</td>
                    @endforeach
                    @endif
                    </tr>        
                </tbody>
            </table>
    </div>

    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Members</b></h2></div>
                </div>
            </div>
            <table class="table table-striped table-hover table-bordered" style="background-color:white;">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile Number</th>
                        <th>Type</th>
                        <th>Gender</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($members) > 0 )
                    @foreach ($members as $u)
                            <tr>
                                <td>{{$u->name}}</td>
                                <td>{{$u->email}}</td>
                                <td>{{$u->mobile_no}}</td>
                                <td>{{$u->type}}</td>
                                <td>{{$u->gender}}</td>
                    @endforeach
                    @endif
                    </tr>       
                </tbody>
            </table>
        </div>
    </div>

    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Donors</b></h2></div>
                </div>
            </div>
            <table class="table table-striped table-hover table-bordered" style="background-color:white;">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile Number</th>
                        <th>Type</th>
                        <th>Gender</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($donors) > 0 )
                    @foreach ($donors as $u)
                            <tr>
                                <td>{{$u->name}}</td>
                                <td>{{$u->email}}</td>
                                <td>{{$u->mobile_no}}</td>
                                <td>{{$u->type}}</td>
                                <td>{{$u->gender}}</td>
                    @endforeach
                    @endif
                    </tr>       
                </tbody>
            </table>
    </div>
@endsection