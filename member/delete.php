<?php
    session_start();
	include("../connection.php");



    $pvds_id = $_GET['pvds_id'];
    $del_query = "DELETE FROM `regi` WHERE pvds_id = $pvds_id";
    $result = mysqli_query($con, $del_query);
    if ($result) {
        header('location:allMemberList.php');
    }
?>