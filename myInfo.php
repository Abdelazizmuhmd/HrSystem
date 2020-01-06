<?php
 include("session.php");
   if($_SESSION['department']!='employee'){
    header("location: login.php");
    }
include("menu.php");
?>
<!DOCTYPE html>
<html>
<head>
<link href="HTTPS://fonts.googleapis.com/css?family=Poiret+One&amp;subset=cyrillic,latin-ext" rel="stylesheet">
<link href="HTTPS://fonts.googleapis.com/css?family=Roboto+Condensed:400,700italic,700,400italic,300italic,300' rel='stylesheet' type='text/css">

          <link rel="stylesheet" type="text/css" href="css/myinfoo.css">

</head>
<body>
    
    <?php     
    include("databaseConnect.php");
    include("loadEmployeeData.php");

     ?>
<div class="m">
    <div class="insidem">
        <div class="insidemm">
     <img class="img "src="images/www.jpg"><br>
        <span class="n" ><?php echo $row['name']; ?> </span><br>
        <span class="na"><?php echo $row['jobtitle']; ?> </span><br>
         </div>
        <div class="dinsidem">
        <span class="s">User Name     : </span><span  class="a"> <?php echo $row['username']; ?> </span><br><br>
        <span class="s">Nationality   : </span><span  class="a"> <?php echo $row['nationality']; ?> </span><br><br>
        <span class="s">Email         :</span><span   class="a">  <?php echo $row['email']; ?></span><br><br>
        <span class="s">Birthdate     : </span><span  class="a"> <?php echo $row['day']; echo"/";echo  $row['month'];  echo"/"; echo $row['year']; ?></span><br><br>
        <span class="s">Work location : </span><span  class="a"><?php echo $row['location']; ?> </span><br><br>
        <span class="s">Work Type     : </span><span  class="a"><?php  echo $row['worktype']; ?></span><br><br>
        <span class="s">gender        : </span><span  class="a"><?php  echo $row['gender']; ?></span><br><br>
        <span class="s">status        : </span><span  class="a"><?php if($row['status']=="hired"){echo "Hired";}else{echo"Not Hired";} ?></span><br><br>
        <span class="s">document status: </span><span  class="a"><?php if($row['documentstatus']==1){echo "Verified";}else{echo"pedding";} ?></span>

        </div>

    </div>
            
</div>
        <form action="myInfoBackend.php" method="POST" enctype="multipart/form-data">
    <div class="lb">
         <h1>Update Information</h1>
    <div class="b ba">
    <label>Name </label><br>
    <input  type="text" name="name" placeholder="<?php echo $row['name']; ?>" id="name">
            
            <br>
    <label>Email</label><br>
    <input type="text" name="email"  placeholder="<?php echo $row['email']; ?>"  id="email">
            <br>
    <label>Password</label><br>
    <input type="password" name="password"  placeholder="**********" id="password">
            <br>
    <label>BirthDate</label><br>
    <select name="day" id="day"></select>
    <select name="month" id="month"></select>
    <select name="year" id="year"></select><br>
        
          <label>Upload Document</label><br><br>
    <input type="file" name="document" id="cv" style="color:white;"  > 
         <br> <br> <br>
             <label><?php if(isset($_GET['check'])){
    if($_GET['check']=='updated'){
         echo"New updated Request has been sent";
    }else if($_GET['check']=="requestsent"){
         echo"Your Request has been sent";

    }else if($_GET['check']=="deleted"){
     echo"Your Request has been deleted";
    }
}
    
    
    ?>
    
    </label>

 </div>
        
 <div class="b bb">
 
         <label>Nationality</label><br>
    <input type="text" placeholder="<?php echo $row['nationality']; ?>" name="nationality" id="nationality">
     
     <br>
     
    <label>Gender</label><br>
    <select id="gender" name="gender"> 
    <option value="Male">Male</option>
    <option value="Female">Female</option>
    </select>
     
     <br>
     
    <label>Work Type</label><br>
    <select id="worktype" name="worktype"> 
    <option value="halftime">Half Time</option>
    <option value="fulltime">Full Time</option>
    </select>
     
     <br>
     
    <label>Work Location</label><br>
    <select id="worklocation" name="worklocation">
        <?php
         include("loadLocationComboBox.php");
        ?>
    </select>
     
     <br>
     
    <label>Job Title</label><br>
    <select id="jobtitle" name="jobtitle">
 <?php
         include('loadJobTitle.php');
         ?>
    </select>
     
  <label>Upload photo</label><br><br>
    <input type="file" name="image" id="photo" style="color:white;" > 
    <input class= "st" type="submit" name="submit" value="Save" onClick="return validateForm()">
    <input type="submit"  class="po" name="delete" value="Delete"  >

    </div>
    </div>
    </form>
    </body>

<script type="text/javascript">
var start = 1990;
var end = 2020;
var options = "";
for(var year = start ; year <=end; year++){
  options += "<option>"+ year +"</option>";
}
document.getElementById("year").innerHTML = options;
////////////////////////////////////////////////////////////////////////////
var start = 1;
var end = 12;
var options = "";
for(var month = start ; month <=end; month++){
  options += "<option>"+ month +"</option>";
}
document.getElementById("month").innerHTML = options;
//////////////////////////////////////////////////////////////////
var start = 1;
var end = 31;
var options = "";
for(var day = start ; day <=end; day++){
  options += "<option>"+ day +"</option>";
}
document.getElementById("day").innerHTML = options;
        
        document.getElementById("gender").value="<?php echo $row['gender'];  ?>"
        document.getElementById("worktype").value="<?php echo $row['worktype'];  ?>"
        document.getElementById("worklocation").value="<?php echo $row['worklocationid'];  ?>"
        document.getElementById("jobtitle").value="<?php echo $row['jobtitleid'];  ?>"
        document.getElementById("day").value="<?php echo $row['day'];  ?>"
        document.getElementById("month").value="<?php echo $row['month'];  ?>"
        document.getElementById("year").value="<?php echo $row['year'];  ?>"  


      function validateForm() {
  var x = document.getElementById("name").value;
  var p = document.getElementById("password").value;
  var n = document.getElementById("nationality").value;
  var cv=document.getElementById("cv").value;
  var photo=document.getElementById("photo").value;
  var mailformat = document.getElementById('email').value;

          if(x!=0){

if(x.length<5)
{
    alert("name id too short");
    document.getElementById("name").style.borderColor = "red";
    return (false)   
}

else if(x.length>15)
{
        alert("name is too long");
    document.getElementById("name").style.borderColor = "red";
    return (false)   
}
else if (!x.match(/^[a-zA-Z]+$/)) 
    {
        alert('first name Only alphabets are allowed');
        return false;
    }else{

        document.getElementById("name").style.borderColor = "white";

    }
          }
///////////////////////////////////////////////////////////////////////
          if(mailformat!=0){
  if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mailformat))
  {
              document.getElementById("email").style.borderColor = "white";

  }
 
  else {
        document.getElementById("email").style.borderColor = "red";

        alert("You have entered an invalid email address! or empty field")
    return (false)
  }
          }
    //////////////////////////////////////////////////////
  if(p != ""){
  if(p.length>25)
{
        alert("pssword is too long");
    document.getElementById("pssword").style.borderColor = "red";
    return (false)   
}

else if(p.length<5)
{
        alert("password is too short");
    document.getElementById("password").style.borderColor = "red";
    return (false)   
}else if (!p.match(/^[A-Za-z0-9]+$/)) 
    {
        alert('username Only alphabets and numbers are allowed');
        return false;
    }else{

        document.getElementById("password").style.borderColor = "white";

    }
  }

  ////////////////////////////////////////////////////////////////
          
  if(n != ""){

  
 if(n.length<5)
{
        alert("nationality is too short");
    document.getElementById("nationality").style.borderColor = "red";
    return (false)   
}

else if(n.length>20)
{
        alert("nationality is too long");
    document.getElementById("nationality").style.borderColor = "red";
    return (false)   
}
else if (!n.match(/^[a-zA-Z]+$/)) 
    {
        alert(' nationality Only alphabets are allowed');
        return false;
    }else{

        document.getElementById("nationality").style.borderColor = "white";

    }
  }
  //////////////////////////////////////////////////


   /////////////////////////////////////////////////
  if(!cv=="")
  { 
     if(!cv.endsWith(".pdf")){
    alert("wrong document file extination")
       return false;
  }

  }
            
  ////////////////////////////////////////////////
            
  if(!photo=="")
  { if(!photo.endsWith(".png")&&!photo.endsWith(".jpg")&&!photo.endsWith(".GIF")){
    alert("wrong  image file extination")
      return false;

  }
            



}

      }


    </script>
    
    <?php 
    ?>
    
</html>