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
                            hola 2
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