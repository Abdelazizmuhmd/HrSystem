<?php
include("session.php");
include("checksession.php");
?>
<!DOCTYPE html>
<html>

<head>
  
  <title>HR Manager</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
  body, html {
  height: 100%;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

* {box-sizing: border-box;}

body { 
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.header {
  overflow: hidden;
  background-color:rgb(0,0,255);opacity:0.6;
  padding: 5px 10px;
  opacity: 20px;

  position: fixed; /*header still apeear while you scrolling */
  top: 0;
  width: 100%;

}

.header a {
  float: left;
  color: white;
  text-align: center;
  padding: 10px;
  text-decoration: none;
  font-size: 25px; 
  line-height: 25px;
  border-radius: 4px;/*rounded corner of join button*/

}

.header a:hover {
  background-color: #174d51;
  color: white;
}

.header a.logo {
  background-color: #3d6a75;
}

.header-right {
  float: right;
}

@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  
  .header-right {
    float: none;
  }
}
.headeropacity{
  background-color: #3d6c78;
  opacity: 0.8;
  filter: Alpha(opacity=50); /* IE8 and earlier */
}
hr.botm-line {
    height: 3px;
    width: 60px;
    background: #ffb737;
    position: relative;
    border: 0;
    margin: 20px 0 20px 0;
}

.square {
        top:0px;
        left: 0px;
        right: 0px;
        bottom: 0px;
        margin: auto;
         width:1000px;
        height: auto;
}

.square2{
  height: 350px;
  width: 300px;
  background-color: #fff;
  display: inline-block;
  margin-top: 10px;

}
.ss{
  display: inline-block;
}
.viewbutton {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 10px 25px;
  color: white;
  background-color: #53d37a;
  text-align: center;
  cursor: pointer;
  border-radius: 4px;
}
</style>
    </head>
<body style="background-color:#f6f3ee;"> 
 <?php 
    include("menu.php");
    ?>
<center>
<div class="square" style="margin-top: 80px;">
   <?php 
include("databaseConnect.php");
$query = "SELECT email,status,jobtitleid,image,personid FROM employee  ORDER BY personid DESC";
$result = mysqli_query($conn,$query);

while ($value = mysqli_fetch_array($result)) {
  $query2 = "SELECT jobtitle FROM workjob where id = ".$value['jobtitleid'];
  $result2 = mysqli_query($conn,$query2);
  $value2 = mysqli_fetch_array($result2);

$query3 = "SELECT username as name FROM person where id = ".$value['personid'];
$result3 = mysqli_query($conn,$query3);
$value3 = mysqli_fetch_array($result3);
  echo "
  <div class='square2'>
  <center><img style='margin-top: 50px; border-radius:50%; ' src='$value[image]' height='100' width='100'></center><br>
  <center>
  <label><b>$value3[name]</b></label><br><br>
  <label style='color:#de1366;font-size: 18px;
    font-weight: 600;
    line-height: 28px;
    letter-spacing: .5px;'>$value2[jobtitle]</label><br><br>
   <label>$value[status]</label>
    <br>
<form action='employeeInfo.php' method='POST'>
 <div> 
  <input type='text' name='userid' value='$value[personid]' hidden>
  <br>
  <input type = 'submit' class='viewbutton' style='' name = 'view' value = 'View'>

 </div>
 </form>
  </center>
  </div>


  ";
}
?>
</div>
</center>
</body>
</html>
