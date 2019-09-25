<?php
session_start();
include 'conn.php';

	$name = $_GET['service_name'];
	$desc = $_GET['service_desc'];

    $date = date('d-m-Y');

$sql = "INSERT INTO coin_service_tb (co_ser_name,co_ser_desc,co_ser_date) VALUES ('$name', '$desc', '$date')";

$result = mysqli_query($link, $sql);
if ($result) {
    echo "1";
} else {
     echo "0";
     echo "Error: " . $sql . "<br>" . mysqli_error($link);
}
mysqli_close($link);
?>
