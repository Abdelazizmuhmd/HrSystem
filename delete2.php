<?php
include("databaseConnect.php");
$id=$_REQUEST['id'];
$query = "DELETE FROM errorlog WHERE id=$id"; 
$result = mysqli_query($conn,$query);
header("Location:errormasseges.php");
?>