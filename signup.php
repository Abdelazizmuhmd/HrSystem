<?php
 include("menu.php");
session_start();
if(isset($_SESSION['userid'])){
    if($_SESSION['department']=="hr"){
        header("location:hrmanagerlogin.php");
    }else if($_SESSION['department']=="employee"){
        header("location:myinfo.php");
    }else if($_SESSION['department']=="quality"){
        header("location:qulitycontrolreview.php");
    }}

?>
 <?php
include('databaseConnect.php');
?>

<!DOCTYPE html>

<html>
<head>
<link rel="stylesheet" type="text/css" href="css/sign.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link href="HTTPS://fonts.googleapis.com/css?family=Poiret+One&amp;subset=cyrillic,latin-ext" rel="stylesheet">
<link href="HTTPS://fonts.googleapis.com/css?family=Roboto+Condensed:400,700italic,700,400italic,300italic,300' rel='stylesheet' type='text/css">

</head>
    
<body id="body">

        <form action="/webproject/signupBackend.php" method="post" enctype="multipart/form-data">
    <div class="lb">
         <h1>SIGN UP</h1>

    <div class="b ba">
    <label>Name </label><br>
    
    <input type="text" name="name" id="name"  minlength="5"  maxlength="20" required>
    <span id="availability"></span>
            <br>
    <label>UserName</label><br>
    <input type="text" name="username" id="username" required>
            <br>
    <label>Email</label><br>
            
    <input type="text" name="email" id="email" minlength="5"  maxlength="30" required>
            <br>
    <label>Password</label><br>
    <input type="password" name="password" id="password" minlength="5"  maxlength="20" required>
            <br>
    <label>BirthDate</label><br>
    
    <select id="day" name="day" ></select>
    <select id="month" name="month" ></select>
    <select id="year" name="year" ></select>
            <br>
    <label>Upload Document</label><br><br>
    <input type="file" name="document" id="cv"  >    
 </div>
        
 <div class="b bb">
 
        <label>Nationality</label><br>
    <input type="text" name="Nationality" id="Nationality" minlength="5"  maxlength="20" required>
     
     <br>
     
    <label>Gender</label><br>
    <select name="gender" > 
    <option value="Male">Male</option>
    <option value="Female">Female</option>
    </select>
     
     <br>
     
    <label>Work Type</label><br>
    <select name="workType" > 
    <option value="halftime">Half Time</option>
    <option value="fulltime">Full Time</option>
    </select>
     
     <br>
     
    <label>Work Location</label><br>
    <select id="worklocation" name="workLocation" > 
    <?php
         include('loadLocationComboBox.php');
         ?>
    </select>
     
     <br>
     
    <label>Job Title</label><br>
    <select  id="jobtitle" name="JobTitle" > 
 <?php
         include('loadJobTitle.php');
         ?>
    </select>
     
  <label>Upload photo</label><br><br>
    <input type="file" name="image" id="photo"  accept="image/*" > 
     < br>

    <input type="submit" value="Submit" name="submit" onclick="return validateForm()">
        
    </div>
    </div>
    </form>
      </body>
    <script type="text/javascript" src="js/sign.js">
    </script>

   <script >$(document).ready(function(){
   $("#username").keyup(function(){
      var uname = $("#username").val().trim();
      if(uname != ''){
         $.ajax({
            url: 'ajaxBackend.php',
            type: 'post',
            data: {uname:uname},
            success: function(response){
                if(response > 0){
                    alert("user is taken");
                }

             }
          });
      }

    });

 });
</script> 
      
        </html>
       
