<?php
include("databaseConnect.php");
?>
<?php
session_set_cookie_params(0);
session_start();

if(isset($_POST["submit"])){
    $username = $_POST['username'];
    $password = $_POST['password'];

//////////////////////////////////////////////////////////////////////////////////////////////////
    $usernamelength= strlen($username);
    $passwordlength= strlen($password);

if(!preg_match('/^[A-Za-z0-9]+$/',$username)){
  echo "Username Must be String";
}
else if ($usernamelength < 6){
echo "<br><redtext> Invalid username. Username must be at least 6 characters</redtext>";
}
else if ($usernamelength > 30){
echo "<br><redtext'> Invalid username. Username cannot be greater than 30 characters</redtext>";
}

else if ($passwordlength < 6){
echo "<br><redtext> Invalid password. Password must be at least 6 characters</redtext>";
}
else if ($passwordlength > 30){
echo "<br><redtext> Invalid password. Password cannot be greater than 30 characters</redtext>";
}
else if(!preg_match('/^[A-Za-z0-9]+$/',$password)){
    echo "<br><redtext>Password must be letters and numbers only</redtext>";

}else{
/////////////////////////////////////////////////////////////////////////////////////////////////////
if(!empty($_POST["remember"])) {
                $year = time() + 365 * 24 * 60;
                setcookie('username', $username, $year);
                setcookie('password', $password, $year);
}else{
    setcookie ("username", "", time() - 3600);
        setcookie("password","",time() - 3600);

    
}
    ///database check
    $password=sha1($password);
    $query = "SELECT * FROM person WHERE username=? and password=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
      $row=$result->fetch_assoc();
      $stmt->close();
      $_SESSION['userid'] = $row['id'];
      $user = $_SESSION['userid'];
      $_SESSION['department']=$row['department'];

$q="SELECT status from employee WHERE personid = '$user'";
$r = mysqli_query($conn,$q);
$value = mysqli_fetch_object($r);
    if($row['department']  == 'employee' && $value->status == 'hired'){
        
    header("location: myinfo.php");    
    }
    else if ($row['department']  == 'hr'){
                
    header("location: hrmanagerlogin.php");

    }else if ($row['department']  == 'quality'){
        
    header("location: qulityControlReview.php");
    }else{
        session_unset();
        session_destroy();
        header("location: login.php?h=".urlencode("not hired"));
    }
    }else{
    header("location: login.php?c=".urlencode("failed"));
        
    }
}

}
    ?>
