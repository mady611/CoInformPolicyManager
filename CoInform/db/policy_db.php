<?php
session_start();
include 'conn.php';

	$name = $_GET['policy_name'];
	$desc = $_GET['policy_desc'];

    $date = date('d-m-Y');

$sql = "INSERT INTO coin_policy_tb (co_policy_name,co_policy_desc,co_policy_date) VALUES ('$name', '$desc', '$date')";

$result = mysqli_query($link, $sql);
$last_id = mysqli_insert_id($link);
if ($result) {
    echo $last_id;
        //start session and redirect
} else {
     // echo "Error: " . $sql . "<br>" . mysqli_error($link);
     echo "0";
}
mysqli_close($link);
?>
