<!-- admin view table fo voluntter -->
@extends('layouts.app')

@section('content')

<div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Current Ongoing Projects</b></h2></div>
                </div>
            </div>
            <table class="table table-striped table-hover table-bordered" style="background-color:white;">
                <thead>
                    <tr>
                        <th>Project Name</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($posts) > 0 )
                    @foreach ($posts as $u)
                            <tr>
                                <a href="/project/{{$u->project_id}}"><td>{{$u->name}}</td></a>
                            </tr>
                    @endforeach
                    @endif
                    </tr>        
                </tbody>
            </table>
    </div>
@endsection