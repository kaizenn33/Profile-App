<?php

include("../vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\HTTP;
use Helpers\Auth;

$auth = Auth::check();

$tmp = $_FILES['photo']['tmp_name'];
$name = $_FILES['photo']['name'];
$type = $_FILES['photo']['type'];

if($type == "image/jpeg" || $type == "image/png")
{
    move_uploaded_file($tmp, "photos/$name");

    $auth->photo = $name;

    $update = new UsersTable(new MySQL);
    $update->updatePhoto($auth->id, $name);

    HTTP::redirect("/profile.php");
    
}else{
    HTTP::redirect("/profile.php", "error = type");
}