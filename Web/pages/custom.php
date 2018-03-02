<?php
$result=mysqli_query($link,"SELECT * FROM profile ORDER BY id DESC");
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
                                            <th>Profile name</th>
                                            <th><i class="fa fa-eye"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach( $result as $row => $field ) : ?> <!-- Mulai loop -->
                                        <tr class="text-besar">
                                            <td><?php echo $field['id']; ?></td>
                                            <td><?php echo $field['name']; ?></td>
                                            <td>
                                                <a class="btn btn-success btn-xs" target="_blank" href="pages/pdf.php?id=<?php echo $field['id']; ?>" title="Ver reporte">
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