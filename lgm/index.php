<?php 

    session_start();

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
    <title>SR - Home</title>
</head>

<body class="homepage">
    <main class="d-flex flex-column justify-content-center align-items-center homepage-container">
        <!-- Home title -->
        <h1 class="text-white mb-auto mt-3">STUDENT RESULTS</h1>

        <!-- Students result retrival form -->
        <div class="w-25 p-3 mb-auto home-form-container">
            <h3 class="text-center text-white">GET YOUR MARKS</h3>
            <form action="studentvalidation.php" method="post" class="student-form">
                <div class="form-group mb-3">
                    <label for="regno" class="text-white mb-1 home-form-label">Register Number</label>
                    <input type="number" name="regno" id="regno" class="form-control number-field" placeholder="Enter your Reg. No." required>
                </div>
                <div class="form-group mb-3">
                    <label for="sdob" class="text-white mb-1 home-form-label">Date of Birth</label>
                    <input type="date" name="sdob" id="sdob" class="form-control" required>
                </div>
                <div class="form-group">
                    <button type="submit" name="getmarks" class="btn btn-primary">Get Marks</button>
                </div>
            </form>
        </div>
        <a href="adminlogin.php" class="btn btn-success admin-login-btn">Admin Login 
            <i class="fas fa-sign-in-alt"></i></a>
        
        <?php if (isset($_SESSION['message'])): ?>

            <div class="alert alert-warning student-login-alert"><i class="fas fa-exclamation-triangle"></i>
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