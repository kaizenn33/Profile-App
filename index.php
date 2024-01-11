<?php
session_start();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Login</title>
    <style>
        body
        {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #264563;
        }
    </style>
</head>
<body>
    <div class="container mt-4 text-center" style="max-width: 600px;">
        <h1 class="h3 mb-3 text-light">Login here!</h1>

        <?php if(isset($_GET['incorrect'])) :?>
            <div class="alert alert-warning">
                Incorrect email or password
            </div>
        <?php endif ?>

        <?php if(isset($_GET['register'])) :?>
            <div class="alert alert-info">
                Registration successful, please login.
            </div>
        <?php endif ?>

        <?php if(isset($_GET['suspended'])) :?>
            <div class="alert alert-danger">
                Your account is suspended.
            </div>
        <?php endif ?>

        <form action="_actions/login.php" method="post">
            <input type="email", name="email" placeholder="Enter your email" class="form-control mb-2" require>
            <input type="password" name="password" placeholder="Enter your password" class="form-control mb-3" require>
            <button class="btn btn-secondary w-100">Login</button>
        </form>
        <a href="register.php">Register</a>
    </div>
</body>
</html>