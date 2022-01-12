<?php 

    session_start();

    if(!isset($_SESSION['regno'])) {
        header("location: index.php");
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <title>Student Result</title>
</head>

<body class="studentdisplay">
    <main class="d-flex flex-column justify-content-center align-items-center student-display-container">
        <!-- Student panel title -->
        <h3 class="text-white stu-pan-title">STUDENT RESULT PANEL</h3>

        <?php 
            
            $mysqli = new mysqli('localhost', 'root', '', 'database1') or die(mysqli_error($mysqli));

            $regno = $_SESSION['regno'];

            $result = $mysqli->query("SELECT * FROM studentsresults WHERE regno = '$regno'") or die($mysqli->error);

        ?>

        
        <?php while($row = $result->fetch_array()): ?>
        <section class="text-white my-auto student-details-container">
            
                <div class="d-flex gap-5 stu-det-holder">
                    <label for="stu-regno" class="stu-det-label">Register Number</label>
                    <p class="stu-det" id="stu-regno"><?php echo $row['regno']; ?></p>
                </div>
                <div class="d-flex gap-5 stu-det-holder">
                    <label for="stu-name" class="stu-det-label">Name</label>
                    <p class="stu-det" id="stu-name"><?php echo $row['sname']; ?></p>
                </div>
                <div class="d-flex gap-5 stu-det-holder">
                    <label for="stu-dob" class="stu-det-label">Date of Birth</label>
                    <p class="stu-det" id="stu-dob">
                        <?php 
                            $originalDate = $row['sdob'];
                            $newDate = date("d-m-Y", strtotime($originalDate));
                            echo $newDate;
                        ?>
                    </p>
                </div>
        </section>

        <section class="text-white mb-auto student-marks-container">
            <table class="table text-white">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Subject Code</th>
                        <th>Marks</th>
                        <th>Result</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>01</td>
                        <td>SAE61</td>
                        <td><?php echo $row['mark1']; ?></td>
                        <td><?php echo $row['srstatus1']; ?></td>
                    </tr>
                    <tr>
                        <td>02</td>
                        <td>SAE6A</td>
                        <td><?php echo $row['mark2']; ?></td>
                        <td><?php echo $row['srstatus2']; ?></td>
                    </tr>
                    <tr>
                        <td>03</td>
                        <td>SAE6B</td>
                        <td><?php echo $row['mark3']; ?></td>
                        <td><?php echo $row['srstatus3']; ?></td>
                    </tr>
                    <tr>
                        <td>04</td>
                        <td>SEE6C</td>
                        <td><?php echo $row['mark4']; ?></td>
                        <td><?php echo $row['srstatus4']; ?></td>
                    </tr>
                    <tr>
                        <td>05</td>
                        <td>SEE6G</td>
                        <td><?php echo $row['mark5']; ?></td>
                        <td><?php echo $row['srstatus5']; ?></td>
                    </tr>
                </tbody>
            </table>
        </section>
        <?php endwhile; ?>
        
        <button type="button" onclick="window.print();" class="btn btn-success print-btn" id="print-btn" style="position: absolute; top: 2%; right: 9%;">
            <i class="fal fa-print"></i>
            Print Result
        </button>
        <a href="studentlogout.php" class="btn btn-warning student-logout-btn"><i class="far fa-times-circle"></i> Close</a>
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
