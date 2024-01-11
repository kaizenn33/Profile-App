<?php
include ("../vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\HTTP;

$id = $_GET['id'];
$query = new UsersTable(new MySQL);
$query->suspended($id);

HTTP::redirect("/admin.php");