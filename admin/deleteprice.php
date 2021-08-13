<?php
session_start();
require ('connect.php');
mysqli_query($connection ,"DELETE FROM price_of_view WHERE id=".$_GET['id']." ");
header("location:amain.php");
?>
