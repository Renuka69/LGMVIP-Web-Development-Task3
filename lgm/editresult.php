<?php 

    session_start();

    $regno = '';
    $sname = '';
    $sdob = '';
    $mark1 = '';
    $mark2 = '';
    $mark3 = '';
    $mark4 = '';
    $mark5 = '';

    $con = mysqli_connect('localhost', 'root', '');
    $db = mysqli_select_db($con, 'database1');
    
    if (isset($_GET['edit'])) {
        $regno = $_GET['edit'];
        $query = "SELECT * FROM studentsresults WHERE regno=$regno";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $sname = $row['sname'];
            $sdob = $row['sdob'];
            $mark1 = $row['mark1'];
            $mark2 = $row['mark2'];
            $mark3 = $row['mark3'];
            $mark4 = $row['mark4'];
            $mark5 = $row['mark5'];
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <title>SR - Update</title>
</head>

<body class="admin-ru">
    <main class="d-flex flex-column justify-content-center align-items-center text-white admin-ru-container">
        <h3 class="text-center">UPDATE RESULT</h3>
        <form action="" method="POST" class="container admin-up-form">
            <div class="form-group mb-3">
                <label for="regno" class="mb-1">Register Number</label>
                <input type="number" name="regno" id="regno" class="form-control number-field" value="<?php echo $regno; ?>" placeholder="Student's Reg. No." readonly>
            </div>
            <div class="form-group mb-3">
                <label for="sname" class=""mb-1>Name</label>
                <input type="text" name="sname" id="sname" class="form-control" value="<?php echo $sname; ?>" placeholder="Student's Name" autocomplete="off" required>
            </div>
            <div class="form-group mb-3">
                <label for="sdob" class="mb-1">Date of Birth</label>
                <input type="date" name="sdob" id="sdob" class="form-control" value="<?php echo $sdob; ?>" placeholder="Student's DOB" required>
            </div>
            <div class="form-group mb-3 d-flex align-items-center">
                <label for="mark1" class="mb-1 w-50 text-center">SAE61</label>
                <input type="number" name="mark1" id="mark1" class="form-control w-50 number-field" value="<?php echo $mark1; ?>" placeholder="Mark1" required>
            </div>
            <div class="form-group mb-3 d-flex align-items-center">
                <label for="mark2" class="mb-1 w-50 text-center">SAE6A</label>
                <input type="number" name="mark2" id="mark2" class="form-control w-50 number-field" value="<?php echo $mark2; ?>" placeholder="Mark2" required>
            </div>
            <div class="form-group mb-3 d-flex align-items-center">
                <label for="mark3" class="mb-1 w-50 text-center">SAE6B</label>
                <input type="number" name="mark3" id="mark3" class="form-control w-50 number-field" value="<?php echo $mark3; ?>" placeholder="Mark3" required>
            </div>
            <div class="form-group mb-3 d-flex align-items-center">
                <label for="mark4" class="mb-1 w-50 text-center">SEE6C</label>
                <input type="number" name="mark4" id="mark4" class="form-control w-50 number-field" value="<?php echo $mark4; ?>" placeholder="Mark4" required>
            </div>
            <div class="form-group mb-3 d-flex align-items-center">
                <label for="mark5" class="mb-1 w-50 text-center">SEE6G</label>
                <input type="number" name="mark5" id="mark5" class="form-control w-50 number-field" value="<?php echo $mark5; ?>" placeholder="Mark5" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-info form-control" name="updateresult"><i class="fas fa-user-edit"></i> Update Result</button>
            </div>
        </form>

        <?php

            $mysqli = new mysqli('localhost', 'root', '', 'database1') or die(mysqli_query($mysqli));
    
            if(isset($_POST['updateresult'])) {

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

                $mysqli->query("UPDATE studentsresults SET sname='$sname', sdob='$sdob', mark1='$mark1', mark2='$mark2', mark3='$mark3', mark4='$mark4', mark5='$mark5', srstatus1='$srstatus1', srstatus2='$srstatus2', srstatus3='$srstatus3', srstatus4='$srstatus4', srstatus5='$srstatus5' WHERE regno='$regno' ") or die($mysqli->error);

                $_SESSION['message'] = "Result has been updated!";
                $_SESSION['msg_type'] = "info";
                $_SESSION['msg_icon'] = "fa-user-check";

                header("location: adminpanel.php");
            }
    
        ?>

    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>