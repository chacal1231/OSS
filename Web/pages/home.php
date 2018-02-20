<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
<?php
if (isset($_POST['dau'])) {
    if($_POST['dau']=='Start'){
        $Command = '1';
        echo '<div class="alert alert-success" role="alert">
                    <button type="button" font size="10" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                     <strong>Testing is now starting, wait 60s for see the info.</div></strong>';
	$start_date = date('Y-m-d H:i:s');
        //Query para ver el estado de la variable id
        $query_id=mysqli_query($link,"SELECT * FROM testing ORDER BY id DESC");
        $row_id=mysqli_fetch_array($query_id);
        $id=($row_id['id']+1);
        //Query ver ID testing
        $Query_start_id=mysqli_query($link,"SELECT * FROM minutedata ORDER BY id DESC");
        $Row_start=mysqli_fetch_row($Query_start_id);
	if(is_null($result['column'])){
		$start_id='1';	
	}else{
		$start_id=$Row_start['0'];
	}
        mysqli_query($link,"INSERT INTO testing(id,start,stop,start_id,stop_id,status) VALUES('$id','$start_date','0','$start_id','0','1')");
	echo mysqli_error($link);
    }elseif ($_POST['dau']=='Stop') {
        $Command = '2';
        echo '<div class="alert alert-success" role="alert">
                    <button type="button" class="close" font size="10" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                     <strong>Testing is now stop.</div></strong>';
	 //Query para ver el estado de la variable id
        $query_id=mysqli_query($link,"SELECT * FROM testing ORDER BY id DESC");
        $row_id=mysqli_fetch_array($query_id);
        $id=($row_id['id']);
	//Stop Date
	$stop_date = date('Y-m-d H:i:s');
	//Stop id
	$Query_start_id=mysqli_query($link,"SELECT * FROM minutedata ORDER BY id DESC");
        $Row_start=mysqli_fetch_row($Query_start_id);
        $stop_id=$Row_start['0'];
	mysqli_query($link,"UPDATE testing SET stop='$stop_date',stop_id='$stop_id',status='0' WHERE id='$id'");
	echo mysqli_error($link);
    }

$host="127.0.0.1";
$port = 7774;
//echo $Command;
$message="C=". $Command . "\r\n";
 
// create socket
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP) or die("Could not create socket try again\n");
 
// connect to server
$result = socket_connect($socket, $host, $port) or die("Could not connect to server try again\n");
 
//socket_read ($socket, 1024) or die("Could not read server response\n");
 
// send string to server
socket_write($socket, $message, strlen($message)) or die("Could not send data to server try again\n");
 
// get server response
//$result = socket_read ($socket, 1024) or die("Could not read server response\n");
 
// end session
//socket_write($socket, "exit", 3) or die("Could not end session\n");
 
// close socket
socket_close($socket);
 
// clean up result
//$result = trim($result);
//$result = substr($result, 0, strlen($result)-1);
}else
$Date = date ('Y-m-d');
#Temperature query
$TempQuery = mysqli_query($link,"SELECT TMP,hour from minutedata ORDER BY hour DESC");
$TMP = mysqli_fetch_row($TempQuery);

#Waterflow query
$WaterQuery = mysqli_query($link,"SELECT WFR,hour FROM minutedata ORDER BY hour DESC");
$WFR = mysqli_fetch_row($WaterQuery);

#OilFlow query
$OilQuery = mysqli_query($link,"SELECT OFR,hour FROM minutedata ORDER BY hour DESC");
$OFR = mysqli_fetch_row($OilQuery);

#GasFlow query
$GasQuery = mysqli_query($link,"SELECT GFR,hour FROM minutedata ORDER BY hour DESC");
$GFR = mysqli_fetch_row($GasQuery);

$result=mysqli_query($link,"SELECT * FROM testing ORDER BY id DESC");

?>
 <div class="row">
  <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                Testing historial
            </header>
            <section class="panel">
                        <div class="panel-body">
                         <div class="table-responsive">
                                <table  class="display table table-bordered table-striped" id="dynamic-table">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Start testing</th>
                                            <th>Stop testing</th>
                                            <th>Duration</th>
                                            <th><i class="fa fa-eye"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach( $result as $row => $field ) : ?> <!-- Mulai loop -->
                                        <tr class="text-besar">
                                            <td><?php echo $field['id']; ?></td>
                                            <td><?php echo $field['start']; ?></td>
                                            <td><?php echo $field['stop']; ?></td>
                                            <td><?php echo $field['status']; ?></td>
                                            <td>
                                                <a class="btn btn-success btn-xs" href="?page=eli_activo&id=<?php echo $field['id']; ?>" title="Ver reporte">
                                                    <i class="fa fa-eye"></i>
                                                </a>
</td>
                                        </tr>
                                        <?php endforeach; ?> <!-- Selesai loop -->                                  
                                    </tbody>
</table>
                        </div>
            </section>
        </section>
    </div>
</div>
<script src="backend/js/jquery.min.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
setInterval(function(){
$("#status").load('pages/button.php')
}, 1000);
});
</script>
     <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
               <div id="status"></div>
            </header>
            <section class="panel">
                        <div class="panel-body"> 
                            <form action="" method="post">
                            <input id='submit_tea'  class="btn btn-success"  type='submit' name = 'dau' value = 'Start' />
                            <input id='submit_tea'  class="btn btn-danger"  type='submit' name = 'dau' value = 'Stop' />
                            </form>
                            <hr/>
                            <head>
	                    	<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
		                      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.js"></script>
		                      <script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
		                      <script type="text/javascript" language="javascript" src="js/dataTables.scroller.js"></script>
			    <script type="text/javascript" language="javascript" >
                            $(document).ready(function() {
                                var dataTable = $('#employee-grid').DataTable( {
                                    "processing": true,
                                    "serverSide": true,
                                    "searching": false,
                                    "responsive": true,
                                    "columnDefs": [
                                    { className: "dt-body-center", "targets": [ 0 ] }
                                    ],
                                    "ajax":{
                                    url :"data.php", // json datasource
                                    type: "post",  // method  , by default get
                                    error: function(){  // error handling
                                        $(".employee-grid-error").html("");
                                        $("#employee-grid").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                                        $("#employee-grid_processing").css("display","none");
                                    }
                                }
                            } );
                                setInterval( function () {
                                    dataTable.ajax.reload();
                                }, 50000 );
                            } );
                        </script>
                        <style>
                        div.container {
                            margin: 0 auto;
                            max-width:990px;
                        }
                        div.header {
                            margin: 100px auto;
                            line-height:30px;
                            max-width:990px;
                        }
                        body {
                            background: #f7f7f7;
                            color: #333;
                            font: 90%/1.45em "Helvetica Neue",HelveticaNeue,Verdana,Arial,Helvetica,sans-serif;
                        }
                    </style>
                </head>
                <body>
                    <div class="container">
                        <div class="table-responsive"> 
                            <table id="employee-grid" cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered dt-responsive nowrap">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Hour</th>
                                <th>LiquidFlow (Sm3/d)</th>
                                <th>OilFlow</th>
                                <th>GasFlow</th>
                                <th>WC</th>
                                <th>GVF</th>
                                <th>Temp</th>
                                <th>Pressure</th>
                            </tr>
                        </thead>
                        </div>
                    </table>
                </div>

            </div>
        </div>
    </section>
</div>
    <div class="col-sm-6">
        <section class="panel">
            <header class="panel-heading">
               Process Temperature
            </header>
            <div class="panel-body"> 
                <div class="table-responsive">
                    <table class="display table table-bordered table-striped">
                    <!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function () {
                var dataLength = 0;
                var data = [];
                var updateInterval = 500;
                updateChart();
                function updateChart() {
                    $.getJSON("pages/jsonchar.php", function (result) {
                        if (dataLength !== result.length) {
                            for (var i = dataLength; i < result.length; i++) {
                                data.push({
                                    label: (result[i].valorx),
                                    y: parseFloat(result[i].valory)
                                });
                            }
                            dataLength = result.length;
                            chart.render();

                        }
                    });
                }
                var chart = new CanvasJS.Chart("chart", {
                    zoomEnabled: true,
                    title: {
                        text: "Process Temperature"
                    },
                    axisX: {
                        title: "chart updates every " + 60 + " secs"
                    },
                    axisY: {
                        title: "Temperature",

                        suffix: " °C",

                    },
                    data: [{type: "line",
                            toolTipContent: "{label} : {y} °C",
                             lineColor: "red", 
                            dataPoints: data}],
                });
                setInterval(function () {
                    updateChart()
                }, updateInterval);

                //Chart 2

                var dataLength2 = 0;
                var data2 = [];
                var updateInterval2 = 500;
                updateChart2();
                function updateChart2() {
                    $.getJSON("pages/jsoncharoil.php", function (result2) {
                        if (dataLength2 !== result2.length) {
                            for (var i = dataLength2; i < result2.length; i++) {
                                data2.push({
                                    label: (result2[i].valorx),
                                    y: parseFloat(result2[i].valory)
                                });
                            }
                            dataLength2 = result2.length;
                            chart2.render();
                        }
                    });
                }
                var chart2 = new CanvasJS.Chart("chart2", {
                    zoomEnabled: true,
                    title: {
                        text: "Oil Flow Rate"
                    },
                    axisX: {
                        title: "chart updates every " + 60 + " secs"
                    },
                    axisY: {
                        title: "Sm3/d",

                        suffix: " Sm3/d",

                    },
                    data: [{type: "line",
                             toolTipContent: "{label} : {y} Sm3/d",
                             lineColor: "red", 

                            dataPoints: data2}],
                });
                setInterval(function () {
                    updateChart2()
                }, updateInterval);


}
</script>
</head>
<body>
<div id="chart" style="height: 350px; max-width: 920px; margin: 0px auto;""></div>
<script src="backend/js/canvasjs.min.js"></script>
</body>
</html>     
                    </table>
                </div>
            </div>
        </section>
    </div>

        <div class="col-sm-6">
        <section class="panel">
            <header class="panel-heading">
                Oil Flow rate 
            </header>
            <div class="panel-body"> 
                <div class="table-responsive">
                    <div id="chart2" style="height: 370px; max-width: 920px; margin: 0px auto;""></div>
                    <script src="backend/js/canvasjs.min.js"></script>
                </div>
            </div>
        </section>
    </div>
</body>

