<?php
include '../inc/config.php';
header('Content-Type: application/json');

$con = $link;

// Check connection
if (mysqli_connect_errno($con))
{
    echo "Failed to connect to DataBase: " . mysqli_connect_error();
}else
{
    $data_points = array();
    
    $QueryTesting       =       mysqli_query($con,"SELECT * FROM testing ORDER BY id DESC");
    $RowTesting         =       mysqli_fetch_array($QueryTesting);
    if($RowTesting['stop_id'] == '0'){
        $id_e = $RowTesting['start_id'];
    }
    else{
        $id_e = $RowTesting['stop_id']; 
    }

    $result = mysqli_query($con, "SELECT * FROM minutedata WHERE id > $id_e");

    
    while($row = mysqli_fetch_array($result))
    {        
        $point = array("valorx" => $row['hour'] , "valory" => $row['TMP']);
        
        array_push($data_points, $point);        
    }
    
    echo json_encode($data_points, JSON_NUMERIC_CHECK);
}
mysqli_close($con);

?>
