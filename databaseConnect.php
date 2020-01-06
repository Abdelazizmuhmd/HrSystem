
<?php 
include_once("customError.php");

if(!$conn= mysqli_connect("localhost","root","","hr_system")){
     throw new Exception('DATABASE DOWN! WE ARE WORKING ON FIX ');
}


?>