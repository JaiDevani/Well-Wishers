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
                        <th>Project Domain</th>
                        <th>Project Description</th>
                        <th>Project Start Date</th>
                        <th>Funds Raised</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($posts) > 0 )
                    @foreach ($posts as $u)
                            <tr>
                                <td>{{$u->name}}</td>
                                <td>{{$u->domain}}</td>
                                <td>{{$u->description}}</td>
                                <td>{{$u->date_started_at}}</td>
                                <td>{{$u->donated_amount}}</td>
                            </tr>
                    @endforeach
                    @endif
                    </tr>        
                </tbody>
            </table>
    </div>
    <div class="row">

    <div class="col-lg-6">
        <h3>Schools that we serve:</h3>
        <div id='map' style='width: 600px; height: 300px; margin-left:300px;margin-top:20px;'></div>
    </div>
    </div>
</div>



<script>
mapboxgl.accessToken = '';
var map = new mapboxgl.Map({
container: 'map',
style: 'mapbox://styles/mapbox/dark-v9',
center: [72.8777,19.0760],
zoom: 7.9
});
 
map.on('load', function() {
// Add a geojson point source.
// Heatmap layers also work with a vector tile source.
map.addSource('earthquakes', {
"type": "geojson",
"data": <?php echo $data;?>

});
 
map.addLayer({
"id": "earthquakes-heat",
"type": "heatmap",
"source": "earthquakes",
"maxzoom": 9,
"paint": {
// Increase the heatmap weight based on frequency and property magnitude
"heatmap-weight": [
"interpolate",
["linear"],
["get", "mag"],
0, 0,
6, 1
],
// Increase the heatmap color weight weight by zoom level
// heatmap-intensity is a multiplier on top of heatmap-weight
"heatmap-intensity": [
"interpolate",
["linear"],
["zoom"],
0, 1,
9, 3
],
// Color ramp for heatmap.  Domain is 0 (low) to 1 (high).
// Begin color ramp at 0-stop with a 0-transparancy color
// to create a blur-like effect.
"heatmap-color": [
"interpolate",
["linear"],
["heatmap-density"],
0, "rgba(33,102,172,0)",
0.2, "rgb(103,169,207)",
0.4, "rgb(209,229,240)",
0.6, "rgb(253,219,199)",
0.8, "rgb(239,138,98)",
1, "rgb(178,24,43)"
],
// Adjust the heatmap radius by zoom level
"heatmap-radius": [
"interpolate",
["linear"],
["zoom"],
0, 2,
9, 20
],
// Transition from heatmap to circle layer by zoom level
"heatmap-opacity": [
"interpolate",
["linear"],
["zoom"],
7, 1,
9, 0
],
}
}, 'waterway-label');
 
map.addLayer({
"id": "earthquakes-point",
"type": "circle",
"source": "earthquakes",
"minzoom": 7,
"paint": {
// Size circle radius by earthquake magnitude and zoom level
"circle-radius": [
"interpolate",
["linear"],
["zoom"],
7, [
"interpolate",
["linear"],
["get", "mag"],
1, 1,
6, 4
],
16, [
"interpolate",
["linear"],
["get", "mag"],
1, 5,
6, 50
]
],
// Color circle by earthquake magnitude
"circle-color": [
"interpolate",
["linear"],
["get", "mag"],
1, "rgba(33,102,172,0)",
2, "rgb(103,169,207)",
3, "rgb(209,229,240)",
4, "rgb(253,219,199)",
5, "rgb(239,138,98)",
6, "rgb(178,24,43)"
],
"circle-stroke-color": "white",
"circle-stroke-width": 1,
// Transition from heatmap to circle layer by zoom level
"circle-opacity": [
"interpolate",
["linear"],
["zoom"],
7, 0,
8, 1
]
}
}, 'waterway-label');
});
var longtitude=<?php echo $longtitude;?>;
var latitude=<?php echo $latitude;?>;
var schoolname=<?php echo $schoolname;?>;
console.log(longtitude);
console.log(latitude);
for(var i=0;i<longtitude.length;i++){
    var popup = new mapboxgl.Popup({closeOnClick: false})
    .setLngLat([longtitude[i], latitude[i]])
    .setHTML(schoolname[i])
    .addTo(map);
}



</script>



@endsection