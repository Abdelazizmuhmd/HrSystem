<?php
include("databaseConnect.php");
$id=$_REQUEST['id'];
$query = "DELETE FROM messages WHERE id=$id"; 
$result = mysqli_query($conn,$query);
header("Location: masseges.php");
?>