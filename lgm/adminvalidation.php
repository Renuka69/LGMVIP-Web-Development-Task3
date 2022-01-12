<?php 

    session_start();

    $con = mysqli_connect('localhost', 'root', '');

    mysqli_select_db($con, 'database1');

    $deptid = $_POST['deptid'];
    $pswd = $_POST['pswd'];

    $query = "SELECT * FROM login WHERE deptid = '$deptid' && pswd = '$pswd'";
    $result = mysqli_query($con, $query);

    $num = mysqli_num_rows($result);

    if ($num == 1) {
        $_SESSION['deptid'] = $deptid;
        header("location: adminpanel.php");
    } else {
        $_SESSION['message'] = "Incorrect Department ID or Password!";
        header("location: adminlogin.php");
    }

?>