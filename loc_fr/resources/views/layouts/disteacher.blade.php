<!-- admin view table fo voluntter -->

@extends('layouts.app')

@section('content')
<div class="row">

</div>
<div class="row">
    <div class="col-lg-12">
        <div class="container">      
            <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-8"><h2>Teacher<b>Details</b></h2></div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover table-bordered" style="background-color:white;">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile Number</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($teachers as $temp)
                                <td>{{$temp->name}}</td>
                                <td>{{$temp->email}}</td>
                                <td>{{$temp->mobile_no}}</td>
                            </tr>    
                            @endforeach    
                        </tbody>
                    </table>
            </div>    
        </div>
    </div>
</div>






   
@endsection
