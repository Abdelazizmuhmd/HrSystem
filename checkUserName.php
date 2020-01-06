<?php  
if(strtolower($_SERVER['PHP_SELF'])!=strtolower("/webproject/checkUserName.php")) {

$stmt = $conn->prepare('SELECT * FROM  person WHERE username = ? ');
    $stmt->bind_param('s',$_POST['username']);
    $stmt->execute();
    $result = $stmt->get_result(); 

}
?>