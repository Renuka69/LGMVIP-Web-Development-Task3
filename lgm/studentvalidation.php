<?php 

    session_start();

    $con = mysqli_connect('localhost', 'root', '');

    mysqli_select_db($con, 'database1');

    $regno = $_POST['regno'];
    $sdob = $_POST['sdob'];

    $query = "SELECT * FROM studentsresults WHERE regno = '$regno' && sdob = '$sdob'";
    $result = mysqli_query($con, $query);

    $num = mysqli_num_rows($result);

    if ($num == 1) {
        $_SESSION['regno'] = $regno;
        header("location: studentdisplay.php");
    } else {
        $_SESSION['message'] = "Record not found!";
        header("location: index.php");
    }

?>