<!-- admin view table fo voluntter -->
<?php use App\project;
    use App\Volunteeer;
  $project_name=project::all();
  $array=[];
  $values=[];
  $counts=[];
  foreach($project_name as $proj)
  {
      array_push($array,$proj->name);
      array_push($values,$proj->donated_amount);
      $sub=Volunteeer::where('projects',$proj->name)->get();
      array_push($counts,count($sub));
  }
  $array=json_encode($array);
  $values=json_encode($values);
  $counts=json_encode($counts);

?>
@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-lg-6">
	<a href="{{url('/')}}/member"><button class="btn btn-primary btn-lg full-width" style="width:300px; margin-left:120px; ">Add Members</button></a>
</div>
</div>
<div class="row">
        @if(count($tempvolunteers))
    <div class="col-lg-12">
        <div class="container">      
            <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-8"><h2>Volunteer <b>Requests</b></h2></div>
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
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach($tempvolunteers as $temp)
                            <tr id="row{{$temp->id}}">
                                <td>{{$temp->name}}</td>
                                <td>{{$temp->email}}</td>
                                <td>{{$temp->mobile_no}}</td>
                                <td>{{$temp->type}}</td>
                                <td>{{$temp->gender}}</td>
                                <td>
                                    <a href="{{URL::to('/approve/'.$temp->id)}}" class="edit" title="Edit" data-toggle="tooltip">
                                <!-- Approve --><i class="fa fa-check"  icon-3x aria-hidden="true"></i></a>
                                <span style="width:10px;"></span>
                                    <a href="{{URL::to('/delete/'.$temp->id)}}" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                                </td>
                            </tr>    
                            @endforeach    
                            
                        </tbody>
                    </table>
            </div>    
        </div>
    </div>
    @else
        <h4 style="margin-left:150px;">No Volunteer Offers Yet!</h4>
    @endif
</div>

<hr>

<div class="container">
    <div class="row">
    
            <div style="width:500px; height:300px;">
                    <canvas id="line-chart" width="500" height="300"></canvas>
            </div>
       
        <div class="col-lg-6">
            <div style="width:500px; height:300px;">
                    <canvas id="line-chart2" width="500" height="300"></canvas>
            </div>
        </div>
    </div>
    <hr>
    <h4>Heat Map for Volunteer Activity</h4>
    <div class="row">
        <div id='map' style='width: 600px; height: 300px;'></div>
    </div>
</div>


    <script>
        function chart4(){
            new Chart(document.getElementById("line-chart"), {
            type: 'bar',
            data: {
            labels: <?php echo $array;?>,
            datasets: [{ 
            data:<?php echo $values;?>,
            label: "Projects",
            borderColor: "#002d23",
            fillOpacity: .7,
            fill: true
            }]
        },
        options: {
            title: {
            display: true,
            text: 'Donation vs Projects'
            }
        }
        });
        }

        function chart3(){
            new Chart(document.getElementById("line-chart2"), {
            type: 'bar',
            data: {
            labels: <?php echo $array;?>,
            datasets: [{ 
            data:<?php echo $counts;?>,
            label: "Volunteers",
            borderColor: "#002d23",
            fillOpacity: .7,
            fill: true
            }]
        },
        options: {
            title: {
            display: true,
            text: 'Projects vs Volunteers'
            }
        }
        });
        }
        function start() {
            chart4();
            chart3();
        }
        window.onload = start;
    </script>

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
</script>



@endsection
