<?php 

    session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Boostrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <title>SR - Admin Login</title>
</head>

<body class="adminloginpage">
    <main class="d-flex flex-column justify-content-center align-items-center adminloginpage-container">
        <div class="w-25 admin-login-form-container">
        <h3 class="text-center text-white">ADMIN LOGIN</h3>
            <form action="adminvalidation.php" method="POST" class="admin-login-from">
                <div class="from-group mb-3">
                    <label for="deptid" class="text-white mb-1 admin-from-label">Department ID</label>
                    <input type="number" name="deptid" id="deptid" class="form-control number-field" placeholder="Enter your Deptartment ID" required>
                </div>
                <div class="from-group mb-3">
                    <label for="pswd" class="text-white mb-1 admin-from-label">Password</label>
                    <input type="password" name="pswd" id="pswd" class="form-control" placeholder="Enter your Password" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Login <i class="fas fa-sign-in-alt"></i></button>
                </div>
            </form>
        </div>
        <a href="index.php" class="btn btn-warning back-home-btn"><i class="fal fa-arrow-circle-left"></i> Home</a>
            <?php if (isset($_SESSION['message'])): ?>
                   
                <div class="alert alert-danger mt-2 admin-login-alert"><i class="fas fa-times-circle"></i>
                    <?php 
                         echo $_SESSION['message'];
                         unset($_SESSION['message']);
                    ?>
                </div>

            <?php endif; ?>
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>