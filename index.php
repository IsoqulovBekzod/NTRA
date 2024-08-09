<?php

require_once 'vendor/autoload.php';
require_once "bootstrap.php";

use App\User;

$user=new User();
$name = $_POST['name'];
$position = $_POST['position'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];

$user->create($name,$position,$gender,$phone);
