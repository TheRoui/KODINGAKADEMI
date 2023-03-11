<?php
$btn=$_GET['ID'];

$mysqli = new mysqli("localhost", "root", "", "test");
$sql="DELETE FROM `menu` WHERE ID='$btn'";
$del=$mysqli->query($sql);
header("location: index.php");

?>