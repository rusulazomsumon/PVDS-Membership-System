<?php
    session_start();
	include("../connection.php");



    $pvds_id= $_GET['pvds_id'];
    $action = 'YES';
    $approve_query = "UPDATE regi SET action = '$action' WHERE pvds_id = $pvds_id";
    $result = mysqli_query($con, $approve_query);
    if ($result) {
        header('location:memberList.php');
    }
?>