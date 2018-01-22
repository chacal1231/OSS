<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
<?php
$result=mysqli_query($link,"SELECT * FROM minutedata ORDER BY Datex DESC");
$row=mysqli_fetch_array($result);
?>


<h1>Realtime data from DAU</h1>
<div class="table-responsive">
                                <table  class="display table table-bordered table-striped" id="dynamic-table">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Hour</th>
                                            <th>Liquid flow rate</th>
                                            <th>Water flow rate</th>
                                            <th>Oil flow rate</th>
                                            <th>Gas flow rate</th>
                                            <th>Temperature</th>
                                            <th>Pressure</th>
                                            <th>Water Cut</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach( $result as $row => $field ) : ?> <!-- Mulai loop -->
                                        <tr class="text-besar">
                                            <td><?php echo $field['Datex'];?></td>
                                            <td><?php echo $field['hour']; ?></td>
                                            <td><?php echo $field['LFR']; ?></td>
                                            <td><?php echo $field['WFR']; ?></td>
                                            <td><?php echo $field['OFR']; ?></td>
                                            <td><?php echo $field['GFR']; ?></td>
                                            <td><?php echo $field['TMP']; ?></td>
                                            <td><?php echo $field['PRE']; ?></td>
                                            <td><?php echo $field['WCUT']; ?></td>                                               
                                        </tr>
                                        <?php endforeach; ?> <!-- Selesai loop -->                                  
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                </div>
            </div>