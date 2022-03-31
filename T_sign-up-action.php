<?php 
include_once "db.php";
include_once "Tuser.php";

if( ! isset($_POST["email"])){
    header("Location: home.php");
    exit;
}
var_dump($_POST);

$Tuser = new User($connection, $_POST['first_name'], $_POST['last_name'], $_POST["email"], $_POST["password"]);
$Tuser->insert();
header("Location: /Gibjohn/Tutor_login.php");