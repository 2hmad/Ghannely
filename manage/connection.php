<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "ghannely";
$connect = mysqli_connect($host, $user, $pass, $db) or die("This website is under construction now");
ob_start();
if(!isset($_SESSION)){
    session_start();
}
?>