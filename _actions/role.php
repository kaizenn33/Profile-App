<?php
include ("../vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\HTTP;

$id = $_GET['id'];
$role_id = $_GET['role'];

$query = new UsersTable(new MySQL);
$query->changeRole($id, $role_id);

HTTP::redirect("/admin.php");