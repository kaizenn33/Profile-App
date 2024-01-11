<?php

include("../vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\HTTP;

$db = new UsersTable(new MySQL);
$id = $db->insert([
    "name" => $_POST['name'],
    "email" => $_POST['email'],
    "phone" => $_POST['phone'],
    "address" => $_POST['address'],
    "password" => $_POST['password']
]);
    if($id){
        HTTP::redirect("/index.php", "register=successful");
    }else{
        HTTP::redirect("/register.php", "register=failed");
    }