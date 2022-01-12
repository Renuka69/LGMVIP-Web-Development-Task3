<?php

    session_start();

    $mysqli = new mysqli('localhost', 'root', '', 'database1') or die(mysqli_error($mysqli));

    if (isset($_POST['addresult'])) {

        $regno = $_POST['regno'];
        $sname = $_POST['sname'];
        $sdob = $_POST['sdob'];
        $mark1 = $_POST['mark1'];
        $mark2 = $_POST['mark2'];
        $mark3 = $_POST['mark3'];
        $mark4 = $_POST['mark4'];
        $mark5 = $_POST['mark5'];

        if ($mark1 >= 35) {
            $srstatus1 = "P"; 
        } else {
            $srstatus1 = "RA";
        }

        if ($mark2 >= 35) {
            $srstatus2 = "P"; 
        } else {
            $srstatus2 = "RA";
        }

        if ($mark3 >= 35) {
            $srstatus3 = "P"; 
        } else {
            $srstatus3 = "RA";
        }

        if ($mark4 >= 35) {
            $srstatus4 = "P"; 
        } else {
            $srstatus4 = "RA";
        }

        if ($mark5 >= 35) {
            $srstatus5 = "P"; 
        } else {
            $srstatus5 = "RA";
        }

        $mysqli->query("INSERT INTO studentsresults 
        (regno, sname, sdob, mark1, mark2, mark3, mark4, mark5, srstatus1, srstatus2, srstatus3, srstatus4, srstatus5)
        VALUES('$regno', '$sname', '$sdob', '$mark1', '$mark2', '$mark3', '$mark4', '$mark5', '$srstatus1', '$srstatus2', '$srstatus3', '$srstatus4', '$srstatus5')")
        or die($mysqli->error);

        $_SESSION['message'] = "Result has been added successfully!";
        $_SESSION['msg_type'] = "primary";
        $_SESSION['msg_icon'] = "fa-check-circle";

        header("location: adminpanel.php");
    }

?>