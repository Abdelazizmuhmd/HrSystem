<?php
include("session.php");
include("checksession.php");
if(isset($_POST['userid'])){
$_SESSION['usid']=$_POST['userid'];
    
}
include("menu.php");
include("databaseConnect.php");


if(isset($_SESSION['usid'])){
$ip=$_SESSION['usid'];
if(isset($_POST["Accepthiring"])){

  $sql = "UPDATE employee SET status='hired', isdeleted=0 WHERE personid='$ip'";
  if ($conn->query($sql) === TRUE) {
    echo "hired";
    header("location:employeeInfo.php");
}
}
if(isset($_POST["Removeemployee"])){

 $sql = "UPDATE employee SET status='not hired', isdeleted=1 WHERE personid='$ip'";
 if ($conn->query($sql) === TRUE) {
}
}

if(isset($_POST["Verify"])){
  $l="select documentstatus from employee where personid='$ip' ";
  
  $result = $conn->query($l);
  
  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        if($row['documentstatus']==0)
    {
    $sql = "UPDATE employee SET documentstatus=1 WHERE personid='$ip'";
    if ($conn->query($sql)==TRUE) {
      echo "<label style='position:relative;left:62%;top:-5%;'> Record updated successfully 1</label>";
      header("location:employeeInfo.php");
    }
    }
    else if($row['documentstatus']==1)
    {
    $sql = "UPDATE employee SET documentstatus=0 WHERE personid='$ip'";
    if ($conn->query($sql)==TRUE) {
      echo "<label style='position:relative;left:62%;top:-5%;'> Record updated successfully 0</label>";
      header("location:employeeInfo.php");
    }
    }
       
      }
  
  }
    
  } 
    

?>
<html>


    <head>
<style>


body, html {
  height: 100%;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.hero-image {
  background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("banner.jpg");
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
    height:65px;

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

.button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

.button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}

.button:accepted {
  background-color: blue;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
.button:rejected {
  background-color: red;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}




#insidePersonalInfo{
        position: absolute;
        top:202px;
        left:10px;
        right:70px;
        bottom:90px;
        background-color: #F9F9FB;
        width: 480px;
        height:310px;
        }

        #insideNameOnly{
        position: absolute;
        top:65px;
        left:10px;
        right:70px;
        bottom:90px;
        background-color: #F9F9FB;
        width: 480px;
        height:20%;
        }

        #insideProfessionalInfo{
        position: absolute;
        top:65px;
        left:540px;
        right:70px;
        bottom:90px;
        background-color: #F9F9FB;
        width: 1400px;
        height:450px;
        }


        span.inside{
        display: block;
      }
      span.firstDetail {
          display: inline-block;
          width: 450px;
          padding: 5px;
          border: 1px solid LightGrey  ;    
          background-color: white; 
          margin-left:10px;
          color:#383da2;
          font-family:"Open Sans", "Helvetica Neue", sans-serif;
          font-weight: bold;
          letter-spacing: -0.1px;
          
       }
    
    span.secondDetail{
          display: inline-block;
          width: 450px;
          padding: 5px;
          border: 1px solid LightGrey  ;    
          background-color: white; 
          margin-left:10px;
          color:#383da2;
          font-family:"Open Sans", "Helvetica Neue", sans-serif;
          font-weight: bold;
          letter-spacing: -0.1px;
      }
      span.thirdDetail{
          display: inline-block;
          width: 90%;
          padding: 5px;
          border: 1px solid LightGrey  ;    
          background-color: white; 
          margin-left:10px;
          color:#383da2;
          font-family:"Open Sans", "Helvetica Neue", sans-serif;
          font-weight: bold;
          letter-spacing: -0.1px;
      }
      span.fourthDetail {
          display: inline-block;
          /*width: 1%;*/
          padding: 5px;
          /*border: 1px solid LightGrey  ;*/    
          /*background-color: white;*/ 
          margin-left:10px;
          color:#383da2;
          font-family:"Open Sans", "Helvetica Neue", sans-serif;
          font-weight: bold;
          letter-spacing: -0.1px;
          top:90px;
          
       }
    
</style>
        </head>
<body>

<!--<h1 style="color: dodgerblue;">HR</h1>-->

<div id="insideNameOnly"> 

<div >
<h2 style="position:relative;left:20%;top:-10%;">Name</h2>
<span class="firstDetail" style="width:90%;" ><span class="inside" >Name:</span><span class="inside" id="nameId" value="mostafa ashraf"></span></span>

</div>

</div>

<div id="insidePersonalInfo"> 

<div >
<h2 style="position:relative;left:15%;top:-10%;">Personal Info</h2>
          <span class="firstDetail" style="width:33%;"><span class="inside" >Gender:</span><span class="inside" id="genderId"></span></span>
          <span class="firstDetail" style="width:55%;"><span class="inside">Nationality:</span><span class="inside" id="nationality"></span></span>
          
      </div>  
      
      <div style="margin-top: 20px" >
          <span class="secondDetail" style="width:90%"><span class="inside" >Birthdate:</span><span class="inside" id="birthdateId"></span></span>
      </div>

      <div style="margin-top: 20px" >
          <span class="thirdDetail"><span class="inside" >Email:</span><span class="inside" id="emailId"></span></span>
      </div>
    </div>



      <div id="insideProfessionalInfo"> 

<div >
<h2 style="position:relative;left:30%;top:-10%;">Professional Info</h2>
          <span class="firstDetail" ><span class="inside" >UserName:</span><span class="inside" id="jobId"></span></span>
          <span class="firstDetail" ><span class="inside" >Status:</span><span class="inside" id="starthiringId"> </span></span>


</div>
<div style="margin-top: 20px" >
          <span class="secondDetail"><span class="inside" >Work Type:</span><span class="inside" id="birthdateId"></span></span>
         <span class="secondDetail" ><span class="inside">Work Location:</span><span class="inside" id="locationId"></span></span>
         <br><br>
         <span class="secondDetail"><span class="inside" >Job Title:</span><span class="inside" id="endhiringId"></span></span>

      </div>
      <div style="margin-top: 20px" >
      </div>
</div>

<br><br><br><br>

    <div style="position: relative; top:297px; left:760px;" method="post">
    <form action='opendocument.php' method="post" target="_blank">
    <input type="text" value="<?php echo $_SESSION['usid'];?>" name="uid" hidden>
    <input type="submit" class=button value="View Document" name="DownloadDoc" >
        <br>
        </form>
    </div>

<script>
function submitButtonStyle(_this) {
  _this.style.backgroundColor = "red";
}
</script>
    
    <?php



$ip=$_SESSION['usid'];
$q="SELECT * FROM employee  JOIN  person ON employee.personid = person.id  JOIN workjob ON employee.jobtitleid = workjob.id  JOIN worklocation ON  employee.worklocationid = worklocation.id WHERE employee.personid='$ip'";


  $result = mysqli_query($conn,$q);;


if (mysqli_num_rows($result) > 0) 
{
  // output data of each row
  while($row =mysqli_fetch_assoc($result)) {
     echo '<span class="fourthDetail" style="position: absolute; top:270px; left:74px;">'.$row['gender'].'</span>';
      echo("<br>");
      echo '<span class="fourthDetail" style="position: absolute; top:133px; left:64px;">'.$row['name'].'</span>';
      echo("<br>");
      echo '<span class="fourthDetail" style="position: absolute; top:270px; left:280px;">'.$row['nationality'].'</span>';
      echo("<br>");
      echo '<span class="fourthDetail"style="position: absolute; top:232px; left:614px;">'.$row['jobtitle']."</span>";
      echo("<br>");
      echo '<span class="fourthDetail" style="position: absolute; top:370px; left:61px;">'.$row['email'].'</span>';
      echo("<br>");
      echo("<br>");
      echo '<span class="fourthDetail" style="position: absolute;  top:320px; left:95px;">'.$row['day'].'/</span>';
      echo("<br>");
      echo '<span class="fourthDetail" style="position: absolute;  top:320px; left:120px;">'.$row['month'].'/</span>';
      echo("<br>");
      echo '<span class="fourthDetail" style="position: absolute;  top:320px; left:140px;">'.$row['year'].'</span>';
      echo("<br>");
      echo '<span class="fourthDetail"style="position: absolute; top:184px; left:630px;">'.$row['worktype'].'</span>';
      echo("<br>");
      echo '<span class="fourthDetail"style="position: absolute; top:184px; left:1160px;">'.$row['location'].'</span>';
      echo("<br>");
      echo '<span class="fourthDetail"style="position: absolute; top:133px; left:1100px;">'.$row['status'].'</span>';
      echo("<br>");
      echo '<span class="fourthDetail"style="position: absolute; top:133px; left:630px;">'.$row['username'].'</span>';
      echo("<br>");  
  }
}
 else {
  echo "0 results";
}



$l="select documentstatus from employee where personid='$ip' ";
$result = $conn->query($l);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    if($row['documentstatus']==1)
    {
    echo" 
    <div style='position:relative;left:930px;top:13px;'>
    <form action=''  method='post'>
    
    <input type='submit' style='font-size:16px; width:140px' class='button' value='Verified'  name='Verify' id='Verify' title='Verify this employee' style='background-color:green;'>
    </div>
    </form>";

   
  }
   else if($row['documentstatus']==0)
  {
  echo"
  <div style='position:relative;left:920px;top:-5px;'>
  <form action=''  method='post'>
  <br>
  <input type='submit' style='font-size:16px;background-color: #4f4fc4;' class='button' value='Verify Document'  name='Verify' id='Verify' title='Verify this employee' style=' background-color:#4f4fc4;'>
  
  </div>
  </form>";

 
}


}
}


$a="select status from employee where personid='$ip' ";

$result = $conn->query($a);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      if($row['status']!=='hired')
      {
      echo"
      <div style='position:absolute;left:1135px;top:420px;display:flex;'>
      <form action=''  method='post'>
     

      <input type='submit' style='background-color:#32CD32' class='button'  value='Accept' title='Accept for hiring' name='Accepthiring'>
      </div>
      </form>";

     
    }


}
}
echo"<form action=''  method='post'>
<input type='submit' class='button' style='position: absolute;left:1230px;top:420px;background-color:#A9A9A9; ' value='Remove Employee' title='Fire Employee' name='Removeemployee' style='background-color:#9c9998;'>
</form>";
}else{
    header("location:hrmanagerlogin.php");
    echo $_session['usid'];
}

?>


</body>
</html>