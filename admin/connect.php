<?php
session_start();
$connection = mysqli_connect('127.0.0.1:3306', 'root', 'root',"delivery_service");
if (!isset($_SESSION['admin'])){
    header("location:index.php");
}
?>