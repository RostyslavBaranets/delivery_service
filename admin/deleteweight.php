<?php
session_start();
require ('connect.php');
mysqli_query($connection ,"DELETE FROM weight WHERE id=".$_GET['id']." ");
header("location:amain.php");
?>
