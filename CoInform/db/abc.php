<?php
session_start();
session_unset(); 
include 'conn.php';

	$username = $_GET['user'];
	$password = $_GET['pass'];	


$sql = "SELECT co_user_id,co_user_email,co_user_type,co_user_display_name FROM `coin_user_tb` WHERE `co_user_email` = '$username' AND `co_user_password` = '$password'";
$result = mysqli_query($link, $sql);



if (mysqli_num_rows($result) > 0) {
    // output data of each row
    echo "0";
    while($row = mysqli_fetch_assoc($result)) {
        //start session and redirect 
        $_SESSION["user_id"] = $row["co_user_id"];
        $_SESSION["user_name"] = $row["co_user_email"];
        $_SESSION["user_type"] = $row["co_user_type"];
        $_SESSION["user_display"] = $row["co_user_display_name"];
    }
} else {
    echo "1";
}
mysqli_close($link);
?>
