<?php include("menu.php");
include("logout.php");
?>

<!DOCTYPE html>
<html>

<head>
  <title>HR SYSTEM</title>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
  body, html {
  height: 100%;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.hero-image {
  background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("images/banner.jpg");
  height: 100%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
   opacity: 0.95;
  filter: Alpha(opacity=50); /* IE8 and earlier */
}

.hero-text {
  text-align: center;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: white;
}

.hero-text button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 10px 25px;
  color: white;
  background-color: #10989b;
  text-align: center;
  cursor: pointer;
  border-radius: 4px;
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


.dot {
  height: 12px;
  width: 12px;
  background-color: #0cb8b6;
  border-radius: 50%;
  display: inline-block;
}


body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #10989b;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #10989b;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
<body>


<div class="hero-image">

  <div class="hero-text">
    <h1 style="font-size:50px">HR<br>System</h1>
    <p>Join As Employee</p>
    <a href="signup.php"><button><b>Join Now !</b></button></a>
  </div>
</div>
<div class="container">
<h1>How It Works</h1>
<hr class="botm-line">

<div style="padding-left: 100px;">
   <span class="dot" ></span><b> Create your employment letter template .</b>
    <br>
    <br>
  <span class="dot"></span><b> Securely connect your HRIS and Truework in seconds .</b>
</div>
<br>


 <div style="padding-left: 100px;">
  <span class="dot"></span><b> Allow employees to create an employment letter .</b>
  <br>
  <br>
  <span class="dot"></span><b> Automatic Data Generation .</b>
</div>
</div>

<div class="container">
  <h1>Contact Info</h1>
<hr class="botm-line">

          <div class="space"></div>
          <p><i class="fa fa-map-marker fa-fw pull-left fa-2x"></i>Egypt<br></p>
          <br>
          <p><i class="fa fa-envelope-o fa-fw pull-left fa-2x"></i>Hrsystem@gmail.com</p>
          <br>
          <p><i class="fa fa-phone fa-fw pull-left fa-2x"></i>+02 012345686</p>

        
</div>

<center><p>© Copyright HrSystem 2019</p></center>

</body>
<script>

</script>
</html>