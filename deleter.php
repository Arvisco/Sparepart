<?php 
include 'core.php';
mysqli_query($con, "DELETE FROM keranjang WHERE id LIKE '$_GET[id]'");
header('Location:keranjang.php')
?>