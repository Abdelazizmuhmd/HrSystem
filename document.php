<html>
<?php
include("session.php");
include("checksession.php");
    
if(isset($_POST['uid'])){
unset($_SESSION['usid']);
$ip=$_POST['uid'];
include("databaseConnect.php");
 $a="select datachangevalue as document from employeechangeinfo where personid='$ip' and datachangetype = 'document'";

$result = $conn->query($a);
if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {

$filename = $row['document']; 
  
// Header content type 
if (strpos($filename, '.pdf') !== false) {
  header("Content-type: application/pdf");
}

else {
  echo("not supported");
}

  
header("Content-Length: " . filesize($filename)); 
  
// Send the file to the browser. 
readfile($filename); 
}
}

}else{
    header("location:hrmanagerlogin.php");
}



?>


</html>
