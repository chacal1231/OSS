<script type="text/javascript" src="http://static.fusioncharts.com/code/latest/fusioncharts.js"></script>
<?php
$Date = date ('Y-m-d');
#Temperature query
$TempQuery = mysqli_query($link,"SELECT MAX(TMP),MIN(TMP) from minutedata WHERE Datex='$Date'");
$ArrayTempQuery = mysqli_fetch_array($TempQuery);
$MinTMP = $ArrayTempQuery[1];
$MaxTMP = $ArrayTempQuery[0];

#Waterflow query
$WaterQuery = mysqli_query($link,"SELECT WFR,hour FROM minutedata ORDER BY hour DESC");
$WFR = mysqli_fetch_row($WaterQuery);

#OilFlow query
$OilQuery = mysqli_query($link,"SELECT OFR,hour FROM minutedata ORDER BY hour DESC");
$OFR = mysqli_fetch_row($OilQuery);

#GasFlow query
$GasQuery = mysqli_query($link,"SELECT GFR,hour FROM minutedata ORDER BY hour DESC");
$GFR = mysqli_fetch_row($GasQuery);
?>

<div class="row">
    <div class="col-md-3">
        <div class="mini-stat clearfix">
            <font size="1"><b>DAU Temp</b></font>
            <span class="mini-stat-icon green"><i class="fa fa-thermometer-half"></i></span>
            <div class="mini-stat-info">
               <button type="button" class="btn btn-danger btn-xs"><?=$MaxTMP?> °C</button><font size="2"> Max</font><br>
                <button type="button" class="btn btn-info btn-xs"><?=$MinTMP?>°C</button><font size="2"> Min</font>
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
               DAU Temperature
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
                        text: "DAU Temperature"
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