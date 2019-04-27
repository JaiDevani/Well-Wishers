@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default">
               <div class="panel-heading"><b>Donation W.R.T History</b></div>
               <div class="panel-body">
                    <canvas id="linechart" width="1000" height="600"></canvas>
               </div>
           </div>
        </div>
        <div class="col-lg-6">
            <div class="panel panel-default">
               <div class="panel-heading"><b>Donation W.R.T History</b></div>
               <div style="align:center;"><h3>School:<?php echo $schoolname;?></h3></div>
               <div class="panel-body" style="align:center;">
                    <canvas id="piechart" width="1000" height="600"></canvas>
               </div>
           </div>
        </div>
    </div>
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
<script>
    function chart1(){
        console.log(<?php echo $dates;?>);
        new Chart(document.getElementById("linechart"), {
                type: 'line',
                data: {
                    labels: <?php echo $dates;?>,
                    datasets: [{ 
                        data: <?php echo $transarray;?>,
                        label: "Donations",
                        borderColor: "#3e95cd",
                        fill: false
                    }
                    ]
                },
                options: {
                    title: {
                    display: true,
                    text: 'Donations V Dates'
                    }
                }
        });
    }

    function chart2(){
        console.log(<?php echo $present;?>);
        // var myDoughnutChart = new Chart(ctx, {
        //     type: 'doughnut',
        //     data: [<?php echo $present;?>,<?php echo $total;?>],
        //     options: options
        // });
        new Chart(document.getElementById("piechart"), {
            type: 'doughnut',
            data: {
                labels: ["Present", "Absent"],
                datasets: [{
                backgroundColor: [
                    "#2ecc71",
                    "#3498db"
                ],
                data: [<?php echo $present;?>,<?php echo $total;?>]
                }]
            },
            
        });
    }

function start() {
    //fetch();
    chart1();
    chart2();
}
window.onload = start;

</script>



@endsection
