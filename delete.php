<?php
include 'config.php';
 echo $ID=$_GET['id'];
 mysqli_query($con,"DELETE FROM `content` WHERE id=$ID");
 header('location:index.php');
?>