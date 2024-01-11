<?php

include("vendor/autoload.php");

use Faker\Factory as Faker;
use Helpers\Auth;
use Helpers\HTTP;
use Libs\Database\MySQL;
use Libs\Database\UsersTable;

// $faker = Faker::create();
// echo $faker->name();
// echo"<br>";
// echo $faker->address();

// Auth::check();
// HTTP::redirect("/index.php", "http=test");

// $db = new MySQL("localhost", "project", "root", "");
// $query = $db->connect();
// $rows = $query->query("SELECT * FROM roles");
// print_r($rows->fetchAll());

// $user = new UsersTable;
// $user->insert();

// $user = new UsersTable(new MySQL());
// $id = $user->insert([
//     "name" => "Alice",
//     "email" => "alice@gmail.com",
//     "phone" => "4363543",
//     "address" => "Somewhere",
//     "password" => "password",
// ]);
// echo $id;
// print_r($user->findByEmailAndPassword("alice@gmail.com", "password")

// echo "Data sample inserting...";
// $faker = Faker::create();
// $table = new UsersTable(new MySQL);
// for ($i = 0; $i < 30; $i++){
//     $table->insert([
//         "name" => $faker->name,
//         "email" => $faker->email,
//         "phone" => $faker->phoneNumber,
//         "address" => $faker->address,
//         "password" => "password",
//     ]);
// }
// echo "Done";

$password = "apple";
$hash = password_hash($password, PASSWORD_DEFAULT);

if(password_verify($password, $hash)){
    echo "Correct Password";
}else{
    echo "Incorrect!";
}