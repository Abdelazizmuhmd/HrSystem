<!DOCTYPE html>
<htmL> 
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
        body{
      margin:0;
        }
  ul{
 list-style-type: none;
  margin: 0;
  padding: 0;
overflow: hidden;

    }

    .abp{
          background-color: rgb(0,0,0,0.65);

    }

li {
  float: right;
    
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: rgb(0,0,0,0.35);
}
</style>
</head >
<body >
<?php
if(strtolower($_SERVER['PHP_SELF']) == strtolower("/webproject/login.php") || strtolower($_SERVER['PHP_SELF'] == "/webproject/signup.php")){  
    ?>
<ul class="abp" >

  <li><a  class="fa fa-question-circle" style="font-size:20px;" href="help.php"> Help</a></li>
  <li><a  class="fa fa-user-plus" href="signup.php" style="font-size:20px;"> Sign Up</a></li>
  <li><a  class="fa fa-sign-in "href="login.php" style="font-size:20px;"> Sign In</a></li>
  <li><a  class="fa fa-home" href="welcomePage.php"style="font-size:20px;"> Home</a></li>
</ul>
    <?php
}
    ?>
    
    <?php
if(strtolower($_SERVER['PHP_SELF'])==strtolower("/webproject/requestLetter.php")){  
    ?>
<ul style="background-color:white;" >
  <img src="images/logo.png" width=70px; height=70px;>
  <li><a  class="fa fa-sign-in" style=" font-size:20px; color:#383da2;" href="logout.php"> Logout</a></li>
  <li><a  class="fa fa-question-circle" href="help.php" style="font-size:20px;color:#383da2;"> Help</a></li>
<li><a  class="fa fa-plus "href="Contact_Us.php" style="font-size:20px;color:#383da2;"> Send Messages</a></li>
  <li><a  class="fa fa-user "href="myInfo.php" style="font-size:20px;color:#383da2;"> Profile</a></li>
  <li><a  class="fa fa-envelope"href="requestLetter.php" style="font-size:20px;color:#383da2;"> Letters</a></li>
  <li><a  class="fa fa-home" href="welcomePage.php"style="font-size:20px;color:#383da2;"> Home</a></li>
</ul>
        
    <?php
}
    ?>

    
      
    <?php
if(strtolower($_SERVER['PHP_SELF'])==strtolower("/webproject/myInfo.php")||strtolower($_SERVER['PHP_SELF'])==strtolower("/webproject/contact_us.php")){  
    ?>
<ul style="background-color:rgba(0, 0, 0, 0.75);  " >
  <li><a  class="fa fa-sign-in" style="font-size:20px; color:white;" href="logout.php"> Logout</a></li>
  <li><a  class="fa fa-question-circle" href="help.php" style="font-size:20px;color:white;"> Help</a></li>
  <li><a  class="fa fa-plus "href="Contact_Us.php" style="font-size:20px;color:white;"> Send Messages</a></li>
  <li><a  class="fa fa-user "href="myinfo.php" style="font-size:20px;color:white;"> Profile</a></li>
  <li><a  class="fa fa-envelope "href="requestLetter.php" style="font-size:20px;color:white;"> Letters</a></li>
  <li><a  class="fa fa-home" href="welcomePage.php"style="font-size:20px;color:white;"> Home</a></li>
</ul>
        <?php
}
    
    
    ?>  
    
        
    <?php

      
if(strtolower($_SERVER['PHP_SELF'])==strtolower("/webproject/Letters.php")||strtolower($_SERVER['PHP_SELF'])==strtolower("/webproject/HrManagerLogin.php")||strtolower($_SERVER['PHP_SELF'])==strtolower("/webproject/employeeinfo.php")||strtolower($_SERVER['PHP_SELF'])==strtolower("/webproject/requestedchanges.php")||strtolower($_SERVER['PHP_SELF'])==strtolower("/webproject/edit.php")||strtolower($_SERVER['PHP_SELF'])==strtolower("/webproject/error.php")||strtolower($_SERVER['PHP_SELF'])==strtolower("/webproject/qulityControlReview.php")){  
    ?>
<ul style="background-color:#3d6c78 " >
    <?php
    if($_SESSION['department']=="hr"){?>
  <li><a  class="fa fa-sign-in" style="font-size:20px; color:white;" href="logout.php"> Logout</a></li>
  <li><a  class="fa fa-question-circle" href="help.php" style="font-size:20px;color:white;"> Help</a></li>
  <li><a  class="fa fa-info-circle "href="requestedChanges.php" style="font-size:20px;color:white;"> InfoRequests</a></li>
  <li><a  class="fa fa-envelope"href="letters.php" style="font-size:20px;color:white; "> Letters</a></li>
  <li><a  class="fa fa-folder "href="HrManagerLogin.php" style="font-size:20px;color:white;"> Directory</a></li>
  <li><a  class="fa fa-plus "href="edit.php" style="font-size:20px;color:white;"> DropMenus</a></li>
   <li><a  class="fa fa-sign-in "href="qulityControlReview.php" style="font-size:20px;color:white;">Review Letters</a></li>
  <li><a  class="fa fa-home" href="welcomePage.php"style="font-size:20px;color:white;"> Home</a></li>
       <?php
    }else{
    ?>
        <li><a  class="fa fa-sign-in" style="font-size:20px; color:white;" href="logout.php"> Logout</a></li>
  <li><a  class="fa fa-question-circle" href="help.php" style="font-size:20px;color:white;"> Help</a></li>
   <li><a  class="fa fa-sign-in "href="qulityControlReview.php" style="font-size:20px;color:white;">Review Letters</a></li>
  <li><a  class="fa fa-home" href="welcomePage.php"style="font-size:20px;color:white;"> Home</a></li>
        
 <?php   }
    ?>
</ul>
        
    <?php
}
    ?>  
        <?php

      
if(strtolower($_SERVER['PHP_SELF'])==strtolower("/webproject/responseletter.php")){  
    ?>
<ul style="background-color:white;" >
  <img src="images/logo.png" width=70px; height=60px;>
  <li><a  class="fa fa-sign-in" style="font-size:20px; color:#383da2;" href="logout.php"> Logout</a></li>
  <li><a  class="fa fa-question-circle" href="help.php" style="font-size:20px;color:#383da2;"> Help</a></li>
  <li><a  class="fa fa-info-circle"href="myinfo.php" style="font-size:20px;color:#383da2;"> InfoRequests</a></li>
  <li><a  class="fa fa-envelope"href="letters.php" style="font-size:20px;color:#383da2; "> Letters</a></li>
  <li><a  class="fa fa-folder "href="HrManagerLogin.php" style="font-size:20px;color:#383da2;"> Directory</a></li>
  <li><a  class="fa fa-plus "href="edit.php" style="font-size:20px;color:#383da2;"> DropMenus</a></li>
  <li><a  class="fa fa-sign-in "href="qulityControlReview.php" style="font-size:20px;color:#383da2;">Review Letters</a></li>
  <li><a  class="fa fa-plus "href="error.php" style="font-size:20px;color:#383da2;"> Messages</a></li>
  <li><a  class="fa fa-home" href="welcomePage.php"style="font-size:20px;color:#383da2;"> Home</a></li>
</ul>
        
    <?php
}
    ?>  
  
    
   
    <?php
if(strtolower($_SERVER['PHP_SELF']) == strtolower("/webproject/welcomepage.php")){  
    ?>
<ul class="abp" style="background-color:#3d6c78" >

  <li><a  class="fa fa-question-circle" style="font-size:20px;" href="help.php"> Help</a></li>
  <li><a  class="fa fa-user-plus" href="signup.php" style="font-size:20px;"> Sign Up</a></li>
  <li><a  class="fa fa-sign-in "href="login.php" style="font-size:20px;"> Sign In</a></li>
  <li><a  class="fa fa-home" href="welcomePage.php"style="font-size:20px;"> Home</a></li>
</ul>
    <?php
}
    ?>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    



    
    
</body>
</htmL>