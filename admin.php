<?php
    include("vendor/autoload.php");
    use Libs\Database\MySQL;
    use Libs\Database\UsersTable;
    use Helpers\Auth;

    $auth = Auth::check();
    $user = new UsersTable(new MySQL);
    $row = $user->getAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            
        }
    </style>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js" defer></script>
    <title>Admin</title>
</head>
<body>
    <nav class="navbar bg-dark navbar-dark navbar-expand">
        <div class="container">
            <a href="#" class="navbar-brand">
                Admin
            </a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="profile.php" class="nav-link font-bold"><?php echo $auth->name ?></a>
                </li>
                <li class="nav-item">
                    <a href="_actions/logout.php" class="nav-link text-danger">
                        Logout
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="table-responsive">
        <table class="table table-light table-striped table-bordered w-90">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Role</th>
                <th>Features</th>
            </tr>
            <?php foreach($row as $r):?>
            <tr>
                <td><?php echo $r->id ?></td>
                <td><?php echo $r->name ?></td>
                <td><?php echo $r->email ?></td>
                <td><?php echo $r->phone ?></td>
                <td><?php echo $r->address ?></td>
                <td>
                    <?php if($r->role_id == 3) : ?>
                        <span class="badge bg-success">
                            <?= $r->role ?>
                        </span>
                    <?php elseif($r->role_id == 2) : ?>
                        <span class="badge bg-primary">
                            <?= $r->role ?>
                        </span>
                    <?php else : ?>
                        <span class="badge bg-secondary">
                            <?= $r->role ?>
                        </span>
                    <?php endif ?>
                </td>
                <td>
                    <div class="btn-group">
                        <?php if($auth->role_id === 3):?>
                            <a href="#" class="btn btn-sm btn-outline-primary dropdown-toggle" data-bs-toggle = "dropdown">Role</a>
                            <div class="dropdown-menu">
                                <?php 
                                $roles = $user->getRoles();
                                foreach ($roles as $role): ?>
                                <a href="_actions/role.php?role=<?= $role->id ?>&id=<?= $r->id ?>" class="dropdown-item"><?php echo htmlspecialchars($role->name) ?></a> 
                                <?php endforeach ?>
                                <!-- <a href="_actions/role.php?role=2&id=<?= $r->id ?>" class="dropdown-item">Manager</a>
                                <a href="_actions/role.php?role=3&id=<?= $r->id ?>" class="dropdown-item">Admin</a> -->
                            </div>

                            <a href="_actions/delete.php?id=<?= $r->id ?>" class="btn btn-sm btn-outline-danger">Delete</a>
                        <?php endif ?>

                        
                        <?php if($auth->role_id >= 2):?>
                            <?php if($r->suspended == 1) : ?>
                        <a href="_actions/unsuspended.php?id=<?= $r->id ?>" class="btn btn-sm btn-warning">Ban</a>
                        <?php else : ?>
                        <a href="_actions/suspended.php?id=<?= $r->id ?>" class="btn btn-sm btn-outline-warning">Ban</a>
                            <?php endif ?>
                        <?php endif ?>
                    </div>
                </td>
            </tr>
            <?php endforeach ?>
        </table>
    </div>
</body>
</html>