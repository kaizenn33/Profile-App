<?php
include("vendor/autoload.php");

use Helpers\Auth;
$auth = Auth::check();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Profile</title>
    <style>
        body
        {
            font-family: Arial, Helvetica, sans-serif;
        }
        img{
            object-fit: cover;
        }
    </style>
</head>
<body>
    <div class="container mt-3 mb-3" style="max-width: 600px;">
        <h1 class="h3 mb-3">Profile</h1>

        <?php if(isset($_GET['error'])) :?>
                <div class="alert alert-primary">Can't Upload Photo</div>
        <?php endif ?>

       <?php if($auth->photo): ?>
            <img src="_actions/photos/<?= $auth->photo ?>" width="200px" height="200px" class="img-thumbnail">
        <?php endif ?>
        <ul class="list-group mb-2">
            <li class="list-group-item">Name: <?= $auth->name ?></li>
            <li class="list-group-item">Email: <?= $auth->email ?></li>
            <li class="list-group-item">Phone: <?= $auth->phone ?></li>
            <li class="list-group-item">Address: <?= $auth-> address ?></li>
        </ul>
        <a href="admin.php">Admin</a> |
        <a href="_actions/logout.php" class="text-danger">Logout</a>
    </div>
    <div class="container" style="max-width: 700px;">
    <form action="_actions/upload.php" method="post" enctype="multipart/form-data" class="input-group my-2">
        <input type="file" name="photo" class="form-control">
        <button class="btn btn-secondary">Upload</button>
    </form>
    </div>
</body>
</html>