<?php 
include '../core.php';

$id=$_GET['id']; $table=$_GET['table'];

if($_GET['from']=='index'){
$sql=mysqli_query($con, "DELETE FROM $table WHERE id LIKE $id " );
header('Location:index.php');}
elseif($_GET['from']=='indexuser'){mysqli_query($con,"DELETE FROM $table WHERE id LIKE $id"); header('Location:index.php?page=user');}
elseif($_GET['from']=='indexhp'){mysqli_query($con,"DELETE FROM $table WHERE id LIKE $id");header('Location:index.php?page=homepage');}
elseif($_GET['from']=='indexsoldout'){mysqli_query($con,"DELETE FROM $table WHERE id LIKE $id");header('Location:index.php?page=soldout');}
elseif($_GET['from']=='indexkeranjang'){mysqli_query($con,"DELETE FROM $table WHERE id LIKE $id");header('Location:index.php?page=keranjang');}



?>