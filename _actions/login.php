<?php
include("../vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\HTTP;

$email = $_POST['email'];
$pws = $_POST['password'];

$user = new UsersTable(new MySQL);
$check = $user->findByEmailAndPassword($email, $pws);

if ($check)
{
    if($check->suspended == 1){
        HTTP::redirect("/index.php", "suspended=true");
    }
    session_start();
    $_SESSION['user'] = $check;//an array
    HTTP::redirect("/profile.php", "login=success");
    
}else{
    HTTP::redirect("/index.php", "incorrect=login");
}