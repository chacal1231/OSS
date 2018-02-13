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
    
    $result = mysqli_query($con, "SELECT * FROM minutedata");
    
    while($row = mysqli_fetch_array($result))
    {        
        $point = array("valorx" => $row['hour'] , "valory" => $row['TMP']);
        
        array_push($data_points, $point);        
    }
    
    echo json_encode($data_points, JSON_NUMERIC_CHECK);
}
mysqli_close($con);

?>