<?php
session_start();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Register</title>
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
        <h1 class="h3 mb-3 text-light">Register here!</h1>

        <?php if(isset($_GET['register'])) :?>
            <div class="alert alert-warning">
                Error in Registration. Register Again!
            </div>
        <?php endif ?>

        <form action="_actions/create.php" method="post" class="mb-2">
            <input type="text", name="name" placeholder="Enter your name" class="form-control mb-2" require>
            <input type="email", name="email" placeholder="Enter your email" class="form-control mb-2" require>
            <input type="text", name="phone" placeholder="Enter your phone" class="form-control mb-2" require>
            <textarea name="address" placeholder="Enter your address" class="form-control mb-2" require></textarea>
            <input type="password" name="password" placeholder="Enter your password" class="form-control mb-3" require>
            <button class="btn btn-secondary w-100">Register</button>
        </form>

        <a href="index.php">Login</a>
    </div>
</body>
</html>