<script type="text/javascript" src="http://static.fusioncharts.com/code/latest/fusioncharts.js"></script>
<?php
?>

<div class="row">
    <div class="col-md-3">
        <div class="mini-stat clearfix">
            <font size="1"><b>Temperatura en el agua</b></font>
            <span class="mini-stat-icon green"><i class="fa fa-thermometer-half"></i></span>
            <div class="mini-stat-info">
               <button type="button" class="btn btn-danger btn-xs"><?=$t_max?> °C</button><font size="2"> Máxima</font><br>
                <button type="button" class="btn btn-info btn-xs"><?=$t_min?>°C</button><font size="2"> Mínima</font>
                </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="mini-stat clearfix">
            <font size="1"><b>pH en el agua</b></font>
            <span class="mini-stat-icon tar"><i class="fa fa-tint"></i></span>
            <div class="mini-stat-info">
                <button type="button" class="btn btn-info btn-xs"><?=$pH_max?> </button><font size="2"> Máxima</font><br>
                <button type="button" class="btn btn-danger btn-xs"><?=$pH_min?> </button><font size="2"> Mínima</font>
             
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="mini-stat clearfix">
            <font size="1"><b>Nivel de Comida</b></font> 
            <span class="mini-stat-icon pink"><i class="fa fa-soundcloud"></i></span>
            <div class="mini-stat-info">
            <button type="button" class="btn btn-info btn-xs"><?=$Comi_max?></button><font size="2"> Máxima</font><br>
                <button type="button" class="btn btn-danger btn-xs"><?=$Comi_min?></button><font size="2"> Mínima</font>  
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="mini-stat clearfix">
            <font size="1"><b>Calidad del ambiente</b></font>
            <span class="mini-stat-icon green"><i class="fa fa-heart"></i></span>
            <div class="mini-stat-info">
                <button type="button" class="btn btn-info btn-xs"><?=$Calidad?></button><font size="2">  </font>
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