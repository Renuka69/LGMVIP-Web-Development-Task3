<?php

    session_start();

    if(!isset($_SESSION['deptid'])) {
        header("location: adminlogin.php");
    }

?>

<?php 

    $mysqli = new mysqli('localhost', 'root', '', 'database1') or die(mysqli_error($mysqli));

    $result = $mysqli->query("SELECT * FROM studentsresults") or die($mysqli->error);

    $rows = mysqli_num_rows($result);

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
    <title>SR - Admin Panel</title>
</head>

<body class="adminpanel">
    <main class="d-flex flex-column justify-content-center align-items-center admin-panel-container">
        <h3 class="text-white admin-panel-title"><i class="fas fa-user-circle"></i> ADMIN PANEL</h3>
        
        <div class="container-fluid stu-res-table-container">
            <table class="table text-white admin-panel-table">
                <thead>
                    <tr>
                        <th>Register No.</th>
                        <th>Name</th>
                        <th>DOB</th>
                        <th>SAE61</th>
                        <th>SAE6A</th>
                        <th>SAE6B</th>
                        <th>SEE6C</th>
                        <th>SEE6G</th>
                        <th>Result</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo $row['regno']; ?></td>
                            <td><?php echo $row['sname']; ?></td>
                            <td>
                                <?php 
                                    $originalDate = $row['sdob'];
                                    $newDate = date("d-m-Y", strtotime($originalDate));
                                    echo $newDate;
                                ?>
                            </td>
                            <td><?php echo $row['mark1']; ?></td>
                            <td><?php echo $row['mark2']; ?></td>
                            <td><?php echo $row['mark3']; ?></td>
                            <td><?php echo $row['mark4']; ?></td>
                            <td><?php echo $row['mark5']; ?></td>
                            <?php 
                                $srstatus1 = $row['srstatus1'];
                                $srstatus2 = $row['srstatus2'];
                                $srstatus3 = $row['srstatus3'];
                                $srstatus4 = $row['srstatus4'];
                                $srstatus5 = $row['srstatus5'];
                            ?>
                            <?php 
                                if($srstatus1=="P" && $srstatus2=="P" && $srstatus3=="P" && $srstatus4=="P" && $srstatus5=="P"):
                            ?>
                            <td>
                                <?php echo "P"; ?>
                            </td>
                            <?php else: ?>
                            <td>
                                <?php echo "RA"; ?>
                            </td>
                            <?php endif; ?>
                            <td colspan="2">
                                <a href="editresult.php?edit=<?php echo $row['regno']; ?>" class="btn btn-info ap-edit-btn">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="deleteresult.php?delete=<?php echo $row['regno']; ?>" class="btn btn-danger ap-delete-btn">
                                    <i class="fal fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        <button type="button" class="btn btn-success ap-add-user-btn" data-bs-toggle="modal" data-bs-target="#ap-modal"><i class="fas fa-user-plus"></i> Add Result</button>
        
        <div class="modal fade ap-modal" id="ap-modal" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content bg-dark text-white">
                    <div class="modal-header">
                        <h5 class="modal-title">ADD RESULT</h5>
                        <button class="btn btn-close bg-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body d-flex flex-column justify-content-center align-items-center">
                        <form action="addresult.php" method="POST" class="w-75 ap-au-form">
                            <div class="form-group mb-2">
                                <label for="regno" class="mb-1">Registration Number</label>
                                <input type="number" name="regno" id="regno" class="form-control number-field" placeholder="Student's Reg. No." required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="sname" class="mb-1">Name</label>
                                <input type="text" name="sname" id="sname" class="form-control" placeholder="Student's Name" autocomplete="off" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="sdob" class="mb-1">Date of Birth</label>
                                <input type="date" name="sdob" id="sdob" class="form-control" placeholder="Student's DOB" required>
                            </div>
                            <div class="form-group mb-3 d-flex align-items-center">
                                <label for="mark1" class="text-center w-50">SAE61</label>
                                <input type="number" name="mark1" id="mark1" class="form-control number-field w-50" placeholder="Mark 1" required>
                            </div>
                            <div class="form-group mb-3 d-flex align-items-center">
                                <label for="mark2" class="text-center w-50">SAE6A</label>
                                <input type="number" name="mark2" id="mark2" class="form-control number-field w-50" placeholder="Mark 2" required>
                            </div>
                            <div class="form-group mb-3 d-flex align-items-center">
                                <label for="mark3" class="text-center w-50">SAE6B</label>
                                <input type="number" name="mark3" id="mark3" class="form-control number-field w-50" placeholder="Mark 3" required>
                            </div>
                            <div class="form-group mb-3 d-flex align-items-center">
                                <label for="mark4" class="text-center w-50">SEE6C</label>
                                <input type="number" name="mark4" id="mark4" class="form-control number-field w-50" placeholder="Mark 4" required>
                            </div>
                            <div class="form-group mb-3 d-flex align-items-center">
                                <label for="mark5" class="text-center w-50">SEE6G</label>
                                <input type="number" name="mark5" id="mark5" class="form-control number-field w-50" placeholder="Mark 5" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary form-control" name="addresult">
                                    <i class="fas fa-file-plus"></i> Save Result
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <p class="total-data-count">Total number of results: <span><?php echo $rows; ?></span></p>
        <a href="adminlogout.php" class="btn btn-warning admin-logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</a>
        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-<?php echo $_SESSION['msg_type']; ?> alert-dismissible fade show ap-alert">
                <div>
                    <i class="fas <?php echo $_SESSION['msg_icon']; ?>"></i>
                    <?php
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);
                    ?>
                </div>
                <button class="btn btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>
   
    </main>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>