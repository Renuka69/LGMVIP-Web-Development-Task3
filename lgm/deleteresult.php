<?php

    session_start(); 

    $mysqli = new mysqli('localhost', 'root', '', 'database1') or die(mysqli_error($mysqli));

    if (isset($_GET['delete'])) {
        $regno = $_GET['delete'];

        $mysqli->query("DELETE FROM studentsresults WHERE regno='$regno' ") or die($mysqli->error);

        $_SESSION['message'] = "Result has been deleted!";
        $_SESSION['msg_type'] = "danger";
        $_SESSION['msg_icon'] = "fa-trash-alt";

        header("location: adminpanel.php");
    }

?>