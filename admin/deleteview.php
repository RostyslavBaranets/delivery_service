<?php
session_start();
require ('connect.php');
mysqli_query($connection ,"DELETE FROM view_of_delivery WHERE id=".$_GET['id']." ");
header("location:amain.php");
?>