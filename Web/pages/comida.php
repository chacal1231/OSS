<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
<?php
$result=mysqli_query($link,"SELECT * FROM comida ORDER BY fecha DESC");
$row=mysqli_fetch_array($result);
?>


<h1>Nivel de comida en la pecera.</h1>
<div class="table-responsive">
                                <table  class="display table table-bordered table-striped" id="dynamic-table">
                                    <thead>
                                        <tr>
                                            <th>Nivel de comida</th>
                                            <th>Fecha</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach( $result as $row => $field ) : ?> <!-- Mulai loop -->
                                        <tr class="text-besar">
                                            <td><?php echo "$field[C] Gramos";?></td>
                                            <td><?php echo $field['fecha']; ?></td>                                               
                                        </tr>
                                        <?php endforeach; ?> <!-- Selesai loop -->                                  
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                </div>
            </div>