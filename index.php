<?php

require_once 'vendor/autoload.php';
require_once "bootstrap.php";

use App\User;

$user=new User();
$user->create('Bekzod','director','male','970300956');