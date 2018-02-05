<script type="text/javascript" src="http://static.fusioncharts.com/code/latest/fusioncharts.js"></script>
<?php
$Date = date ('Y-m-d');
#Temperature query
$TempQuery = mysqli_query($link,"SELECT TMP,id from minutedata WHERE Datex='$Date' ORDER BY id DESC");
$TMP = mysqli_fetch_row($TempQuery);

#Waterflow query
$WaterQuery = mysqli_query($link,"SELECT WFR,id FROM minutedata ORDER BY id DESC");
$WFR = mysqli_fetch_row($WaterQuery);

#OilFlow query
$OilQuery = mysqli_query($link,"SELECT OFR,id FROM minutedata ORDER BY id DESC");
$OFR = mysqli_fetch_row($OilQuery);

#GasFlow query
$GasQuery = mysqli_query($link,"SELECT GFR,id FROM minutedata ORDER BY id DESC");
$GFR = mysqli_fetch_row($GasQuery);
?>

<div class="row">
    <div class="col-md-3">
        <div class="mini-stat clearfix">
            <font size="1"><b>Process Temp</b></font>
            <span class="mini-stat-icon green"><i class="fa fa-thermometer-half"></i></span>
            <div class="mini-stat-info">
               <button type="button" class="btn btn-danger btn-xs"><?=$TMP[0]?> °C</button><font size="2"></font><br>
                </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="mini-stat clearfix">
            <font size="1"><b>WaterFlow</b></font>
            <span class="mini-stat-icon tar"><i class="fa fa-shower"></i></span>
            <div class="mini-stat-info">
                <button type="button" class="btn btn-info btn-xs"><?=$WFR[0]?> </button><font size="2"> (Sm3/d)</font><br>
             
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="mini-stat clearfix">
            <font size="1"><b>OilFlow</b></font> 
            <span class="mini-stat-icon pink"><i class="fa fa-tint"></i></span>
            <div class="mini-stat-info">
            <button type="button" class="btn btn-info btn-xs"><?=$OFR[0]?></button><font size="2"> (Sm3/d)</font><br>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="mini-stat clearfix">
            <font size="1"><b>GasFlow</b></font>
            <span class="mini-stat-icon green"><i class="fa fa-soundcloud"></i></span>
            <div class="mini-stat-info">
                <button type="button" class="btn btn-info btn-xs"><?=$GFR[0]?></button><font size="2"> (Sm3/d)</font>
                <br>
            </div>
        </div>
    </div>
</div>
 <div class="row">
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
                                    y: parseInt(result[i].valory)
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
}
</script>
</head>
<body>
<div id="chart" style="height: 370px; max-width: 920px; margin: 0px auto;""></div>
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
                Nivel de pH en el agua
            </header>
            <div class="panel-body"> 
                <div class="table-responsive">
                    </table>
                    </div>
                    </div>
                    </section>
                    </div>
                    </div>