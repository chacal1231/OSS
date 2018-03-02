<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
<?php
$result=mysqli_query($link,"SELECT * FROM profile ORDER BY id DESC");
$get=$_GET['id'];
switch ($ge) {
    case '0':
        echo "Hola";
        break;
    case '1':
        echo "Adios";   
        break;
    default:
        # code...
        break;
}
?>
<div class="row">
  <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                Perfiles pozos
            </header>
             <div class="panel-body"> 
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                                <i class="fa fa-plus-square"></i> Nuevo perfil 
                            </button>
            </div>
            <section class="panel">
                        <div class="panel-body">
                         <div class="table-responsive">
                                <table  class="display table table-bordered table-striped" id="dynamic-table">
                                    <thead>
                                        <tr>
                                            <th>Perfil</th>
                                            <th><i class="fa fa-eye"></i></th>
                                            <th><i class="fa fa-trash"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach( $result as $row => $field ) : ?> <!-- Mulai loop -->
                                        <tr class="text-besar">
                                            <td><?php echo $field['name']; ?></td>
                                            <td>
                                                <form action="" method="post">
                                                <input id='submit_tea'  class="btn btn-success btn-xs"  type='submit' name = 'dau' value = 'Start' />
                                                </a>
                                            </td>
                                            <td>
                                                <a class="btn btn-danger btn-xs" target="_blank" href="pages/pdf.php?id=<?php echo $field['id']; ?>" title="Ver reporte">
                                                    <i class="fa fa-trash"></i>
                                                    </form>
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

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>

                </button>
                 <h4 class="modal-title" id="myModalLabel">Nuevo perfil</h4>

            </div>
            <div class="modal-body">
                <div role="tabpanel">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#uploadTab" aria-controls="uploadTab" role="tab" data-toggle="tab">Parameter 1</a>

                        </li>
                        <li role="presentation"><a href="#browseTab" aria-controls="browseTab" role="tab" data-toggle="tab">Parameter 2</a>

                        </li>

                        </li>
                        <li role="presentation"><a href="#P3" aria-controls="P3" role="tab" data-toggle="tab">Parameter 3</a>

                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="uploadTab">
                    <form id="modal-form" action="" method="post">
                            <b><h3>Background Information</h3></b>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Engineer *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Customer *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Oil Field *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Station Name *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Software Version *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <br>
                            <b><h3>Public</h3></b>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Oil Density(Std kg/m3) *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Water Density(Std kg/m3) *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Gas Density(Std kg/m3) *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Atmospheric Press(kPa) *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Gr *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <br>
                            <b><h3>Liquids Leg Major</h3></b>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Temperature[URV][°C] *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Temperature[LRV][°C] *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Pressure[URV][kPa] *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Pressure[LRV][kPa] *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>DP High[URV][kPa] *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>DP High[URV][kPa] *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>DP Low[URV][kPa] *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>DP Low[LRV][kPa] *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Venturi C *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Venturi E *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Venturi High(mm) *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Venturi d(mm) *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Venturi D(mm) *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Valve Mode(0->Manual,0 to 1->ratio,2->auto) *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Valve initialization(0~1) *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Valve Scale(0~1) *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Vortex[LRV](am3/h) *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Valve Latency Time(min) *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Valve Open Condition[GVF](0~1) *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Valve Close Condition[GVF](0~1) *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>

                            <br>
                            <b><h3>Liquids Leg Minor</h3></b>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Temperature[URV][°C] *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Temperature[LRV][°C] *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Pressure[URV][kPa] *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Pressure[LRV][kPa] *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>DP High[URV][kPa] *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>DP High[URV][kPa] *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>DP Low[URV][kPa] *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>DP Low[LRV][kPa] *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Venturi C *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Venturi E *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Venturi High(mm) *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Venturi d(mm) *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Venturi D(mm) *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Valve Mode(0->Manual,0 to 1->ratio,2->auto) *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Valve initialization(0~1) *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Valve Scale(0~1) *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Vortex[LRV](am3/h) *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Valve Latency Time(min) *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Valve Open Condition[GVF](0~1) *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Valve Close Condition[GVF](0~1) *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                    </form>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="browseTab">
                        <form id="modal-form" action="" method="post">
                            <b><h3>Single/Dual Transmitter</h3></b>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Single 1 Count[URV](Min) *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Single 1 Count[LRV](Min) *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Single 2 Count[URV](Min) *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Single 2 Count[LRV](Min) *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Dual Count[URV](Min) *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                             <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Dual Count[LRV](Min) *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <br>
                            <b><h3>Chief Pipe</h3></b>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Inlet Pressure[URV](kPa) *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Inlet Pressure[LRV](kPa) *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Outlet Pressure[URV](kPa) *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Outlet Pressure[LRV](kPa) *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <br>
                            <b><h3>Shut Off Valve</h3></b>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Mode(0 close, 1 open, 2 auto) *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Open Condition[DP_Minor](kPa) *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Close Condition[DP_Minor](kPa) *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Letency Time(Min) *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            
                            <br>
                            <b><h3>Water Cut Value</h3></b>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Mode(0 manual,0~1 ratio,2 auto) *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Initialization *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Scale(0~1) *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Letency Time(Min) *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Open Condition[GVF] *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Close Condition[GVF]  *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>

                            <br>
                            <b><h3>Alarm Settings</h3></b>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Flow Alarm[LRV](m3/d)  *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Flow Alarm[URV](m3/d)  *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>WLR Alarm[URV](0~1)  *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Pressure Drop Alarm[URV](kPa)  *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Liquid Leg Pressure Alarm[URV](kPa)  *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Gas Leg Pressure Alarm[URV](kPa)  *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>

                            <br>
                            <b><h3>Analog Signals Output</h3></b>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Liquid Flow[URV](am3/d)  *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Oil Flow[URV](am3/d)  *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Water Flow[URV](am3/d)  *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Gas Flow[URV](Sm3/d)  *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Temperature Flow[URV](am3/d)  *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Pressure Flow[URV](am3/d)  *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Density_Mix[URV](kg/m3)  *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>DP_Major Leg[URV]  *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>DP_Minor Leg[URV]  *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane active" id="P3">
                        <form id="modal-form" action="" method="post">
                        <b><h3>Other</h3></b>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Lower Flow Judge(kPa)  *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Single Energy_Na(1/Deg. C)  *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>GVF Formula Selection  *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>WLR Formula Selection  *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>

                            <br>
                            <b><h3>WLF Policy</h3></b>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>GVF2_Limit[URV](0~1)  *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>GVF2_Limit[LRV](0~1)  *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>

                            <br>
                            <b><h3>PVT</h3></b>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Oil Expansivity(1/Deg.C)  *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Water Expansivity(1/Deg.C)  *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Oil Shrinkage Factor  *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Z Factor  *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Solution GOR(m3/m3)  *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>PVT_Mode  *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>PVT_Para1  *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>PVT_Para2  *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>PVT_Para3  *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>

                            <br>
                            <b><h3>Formula</h3></b>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Liquid C1  *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Gas C2  *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>WLR C3  *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Sampling Water Ratio  *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Water Permission Range  *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Zn  *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Mn  *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Mc  *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Mc1  *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>H2S  *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Pb(kPa)  *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>

                            <br>
                            <b><h3>C and Red Calculation</h3></b>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>MixVisSel  *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>OilVisSel  *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>OilMolecularWeight  *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>OilVis_A  *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>OilVis_B  *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>OilVil_C  *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>

                            <br>
                            <b><h3>Gas Liquid Slip</h3></b>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Slip_Major_A  *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Slip_Major_B  *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Slip_Major_C  *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Slip_Minor_A  *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Slip_Minor_B  *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Slip_Minor_C  *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>

                            <br>
                            <b><h3>Backup</h3></b>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Viscosity of 50°C  *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Wet Gas Revise Mode  *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>Surface Tension  *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>GVF(0:Limited;1 unlimited)  *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>New2  *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>New3  *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>New4  *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>New5  *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>New6  *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><b>New7  *:</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary save">Save changes</button>
            </div>
        </div>
    </div>
</div>