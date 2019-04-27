<!-- admin view table fo voluntter -->
@extends('layouts.app')

@section('content')
<div class="col col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12" style="margin-left:300px; float:right; width:300px;">
        <div class="ui-block" data-mh="pie-chart" style="height: 373.4px;">
            <div class="ui-block-title">
                <div class="h6 title">Total Donations</div>
                <a href="26-Statistics.html#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg></a>
            </div>

            <div class="ui-block-content">
                <div class="swiper-container swiper-swiper-unique-id-0 initialized swiper-container-horizontal" data-slide="fade" id="swiper-unique-id-0">
                    <div class="swiper-wrapper" style="width: 1775px; transform: translate3d(-355px, 0px, 0px); transition-duration: 0ms;">
                        <div class="swiper-slide swiper-slide-active" data-swiper-slide-index="0" style="width: 355px;">
                            <div class="statistics-slide">
                            <div class="count-stat" data-swiper-parallax="-500" style="transform: translate3d(0px, 0px, 0px); transition-duration: 0ms;">{{count($posts)}}</div>
                                <div class="title" data-swiper-parallax="-100" style="transform: translate3d(0px, 0px, 0px); transition-duration: 0ms;"><span class="c-primary">Number of</span> Donations Made</div>
                            </div>
                        </div>
                        
                        </div></div>

                    <!-- If we need pagination -->
                 
                </div>
            </div>
        </div>

<div class="container" style="margin-left:2px; width:900px;">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Transactions</b></h2></div>
                </div>
            </div>
            <table class="table table-striped table-hover table-bordered" style="background-color:white;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Transaction ID</th>
                        <th>Amount</th>
                        <th>Project Name</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($posts) > 0 )
                    @foreach ($posts as $u)
                            <tr>
                                <td>{{$u->id}}</td>
                                <td>{{$u->txnid}}</td>
                                <td>{{$u->amount}}</td>
                                <td>{{$u->projectinfo}}</td>
                    @endforeach
                    @endif
                    </tr>        
                </tbody>
            </table>
    </div>

@endsection