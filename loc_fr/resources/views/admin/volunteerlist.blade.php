<!-- admin view table fo voluntter -->
<?php use App\User; use App\Volunteeer; use App\project;
    $user=User::where('type','Volunteer')->get();
?>
@extends('layouts.app')

@section('content')

<div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Current Status of Volunteers</b></h2></div>
                </div>
            </div>
            @foreach((project::all()) as $proj)
            <h4>{{$proj->name}}</h4>
            <?php $sub=Volunteeer::where('projects',$proj->name)->get();   
            ?>
            @if(count($sub)>0)
            <table class="table table-striped table-hover table-bordered" style="background-color:white;">
                <thead>
                    <tr>
                        <th>Volunteer Name</th>
                        <th>Volunteer Mobile Number</th>
                        <th>Volunteer Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sub as $subpar)
                        @if(count(User::find($subpar->user_id))>0)
                        <?php $usr=User::find($subpar->user_id) ?>   
                            <tr>
                                <td>{{$usr->name}}</td>
                                <td>{{$usr->mobile_no}}</td>
                                <td>{{$usr->email}}</td>
                            </tr>
                        @endif
                    @endforeach
                    </tr>        
                </tbody>
            </table>
            @else
                <h5>No Volunteers Registered Yet</h5>
            @endif
            @endforeach
           
    </div>
@endsection