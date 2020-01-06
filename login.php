<?php 

include("menu.php");
session_start();
if(isset($_SESSION['userid'])){
    if($_SESSION['department']=="hr"){
        header("location:hrmanagerlogin.php");
    }else if($_SESSION['department']=="employee"){
        header("location:myinfo.php");
    }else if($_SESSION['department']=="quality"){
        header("location:qulitycontrolreview.php");}
    
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>login</title>
 <link rel="stylesheet" tyeeeeeeeeeeeeeepe="text/css" href="css/19.css">
 <script src="js/loginn.js"></script>

</head>

<body>
    <?php

    if(isset($_GET['check'])){
    echo"<h2 style=' color:white; margin-left:10px;font-size:30px;'>SIGN UP SUCCESSFUL PLEASE LOG IN </h2>";}else if(isset($_GET['c'])){
      echo"<h2 style=' color:white; margin-left:10px;font-size:30px;'>USER NOT FOUND!</h2>";
    }else if(isset($_GET['h'])){
            echo"<h2 style=' color:white; margin-left:10px;font-size:30px;'>You are not accepted yet !</h2>";
    }
    
    ?>
    
    
    
    <div class="a">
         <h1>LOGIN</h1>
    <div class="b">
    <form action="loginBackend.php" method="post">
    <input type="text" placeHolder="User Name " id = "username"name="username"  value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"]; } ?>"><br>
    <input type="password" id = "password" class="p" placeHolder="password" name="password"  value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>"><br>
 

        <input type="checkbox" checked="checked" name="remember"> <font style="color: #fff;">Remember me</font>
      <br>
           <input type="submit" value="login" name="submit" method="post" onclick=" return validateForm()">

        </form>

     </div>
    </div>
</body>

</html>

