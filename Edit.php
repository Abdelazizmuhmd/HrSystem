<?php
include("session.php");
include("checksession.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>hr data</title>

    <link rel="stylesheet" type="text/css" href="css/data.css">
    <style>
.error {color: #FF0000;}
input[type="submit"]{
        padding: 10px 28px;
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 2px;
        background: #ed7902;
        color: white;
        border: none;
        cursor: pointer;
        font-family: 'Play', sans-serif;
        margin-left: 30px;
    }
</style>
</head>
<body>




<?php
    include("menu.php");

include("databaseConnect.php");
if(isset($_POST['Add'])){
$requestt = trim(preg_replace('/\s+/', ' ', $_POST['loginletter']));
if(empty($requestt)){
 $requesterr="request letter type  can't be empty";
}else if(strlen($requestt)<4){
   $requesterr="request letter type  can't be less than 4";
}else if(strlen($requestt)>16){
$requesterr="request letter type  can't be greater than 16";
}else if(!ctype_alpha(str_replace(' ', '',$requestt))){
       $requesterr="request letter type should me string only";}
else{


 $sql="Select * from requestedlettertype where type ='".$_POST['loginletter']."'";
 $result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) 
{
  // output data of each row
echo("<label>letter is already in database</label>");

}
else{
$l="insert into requestedlettertype (type) values('".$_POST['loginletter']."')";
if (mysqli_query($conn, $l)) {
    echo("<label> letter add success </label>");
} 
}
}
}




if(isset($_POST['Addjob'])){
$job = trim(preg_replace('/\s+/', ' ', $_POST['loginjob']));
if(empty($job)){
    $joberr="work job  can't be empty";
}else if(strlen($job)<4){
   $joberr="work job can't be less than 4";
}else if(strlen($job)>16){
   $joberr="work job  can't be greater than 16";
}else if(!ctype_alpha(str_replace(' ', '',$job))){
       $joberr="work job should me string only";
}
else{
$sql="Select * from workjob where jobtitle ='".$_POST['loginjob']."'";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) 
{
  // output data of each row
echo("<label>workjob is already in database</label>");

}
else{
$l="insert into workjob (jobtitle) values('".$_POST['loginjob']."')";
if (mysqli_query($conn, $l)) {
    echo("<label> workjob add success </label>");;
} 
}
}
}


if(isset($_POST['Addwork'])){
$work = trim(preg_replace('/\s+/', ' ', $_POST['loginwork']));
if(empty($work)){
    $workerr="work location can't be empty";
}else if(strlen($work)<4){
   $workerr="work location can't be less than 4";
}else if(strlen($work)>16){
   $workerr="work location can't be greater than 16";
}else if(!ctype_alpha(str_replace(' ', '',$work))){
       $workerr="work location should me string only";}
else{
 $sql="Select * from worklocation where location ='".$_POST['loginwork']."'";
 $result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) 
{
  // output data of each row
echo("<label>worklocation is already in database</label>");

}
else{
$l="insert into worklocation (location) values('".$_POST['loginwork']."')";
if (mysqli_query($conn, $l)) {
    echo("<label> worklocation add success </label>");
} 


}
}
}





if(isset($_POST['removel'])){
       

    $sql="Select requestedlettertypeid FROM requestedletter where requestedlettertypeid = ".$_POST['requestt'];
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    echo("<label>you can't delete this<label>");
}
        
else if(mysqli_num_rows($result) == 0)
{
    $oo = "DELETE FROM requestedlettertype WHERE id=".$_POST['requestt'];
        if ($conn->query($oo) === TRUE) {
            echo "<label>Record deleted successfully</label>";
        } 


}


}







if(isset($_POST['ads'])){
    $sql="Select worklocationid from employee where worklocationid =".$_POST['worktype'];
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
 echo("<label>you can't delete this<label>");
}
else if(mysqli_num_rows($result) == 0)
{
    $q="Select datachangetype,datachangevalue from employeechangeinfo where datachangetype='worklocationid'AND datachangevalue =".$_POST['worktype'];
    $result = mysqli_query($conn, $q);
    if (mysqli_num_rows($result) > 0) {
        echo("<label>you can't delete this</label>");
       }
       else if(mysqli_num_rows($result)== 0)
       {
        $oo = "DELETE FROM worklocation WHERE id=".$_POST['worktype'];
        if ($conn->query($oo) === TRUE) {
            echo "<label>Record deleted successfully</label>";
        } 


       }


}
}
if(isset($_POST['jobb'])){
    
    $q="Select jobtitleid from employee where jobtitleid =".$_POST['jobrequest'];
$result = mysqli_query($conn, $q);

    if (mysqli_num_rows($result) > 0) {
        echo("<label>you can't delete this<label>");
       }
       else if(mysqli_num_rows($result) == 0)
       {
           $q="Select datachangetype,datachangevalue from employeechangeinfo where datachangetype='jobtitleid'AND datachangevalue =".$_POST['jobrequest'];
           $result = mysqli_query($conn, $q);
           if (mysqli_num_rows($result) > 0) {
               echo("<label>you can't delete this</label>");
              }
              else if(mysqli_num_rows($result)== 0)
              {
               $oo = "DELETE FROM workjob WHERE id=".$_POST['jobrequest'];
               if ($conn->query($oo) === TRUE) {
                   echo "<label>Record deleted successfully</label>";
               } 
       
       
              }
       
       
       }






}



?>










    <center><h1 style="font-size:40px;">EDIT DATA</h1></center>
<div class="s">
<div class="ss" >
    <div class="inss">


<form method="post" action="#">  
     <label>request letter type</label><br>
     <input id="req" type="text" name="loginletter"  maxlength="16">
     <input type="submit" onclick="return validate1()" name="Add" value="Add"><br>
  <?php if(isset($requesterr)){ ?>   <span class="error">*<?php echo $requesterr; ?> </span> <br><br><?php }?>
     <label>Job title</label> <br>
     <input id="job" type="text" name="loginjob"  maxlength="16">
     <input type="submit" onclick="return validate2()" name="Addjob" value="Add"><br>
  <?php if(isset($joberr)){ ?>   <span class="error">*<?php echo $joberr; ?> </span> <br><br><?php }?>
     <label>Work Location</label><br>
     <input id="work" type="text" name="loginwork"  maxlength="16">
     <input type="submit" onclick="return validate3()" name="Addwork" value="Add"><br>
  <?php if(isset($workerr)){ ?>   <span class="error">*<?php echo $workerr; ?> </span> <br><br><?php }?>

</form>

        </div>
</div>



<script>
function validate1(){

  var z=document.getElementById('req').value;
  newz= z.replace(/\s+/g,' ').trim();
  document.getElementById("req").value=newz;
  var regexp= /^[a-zA-Z\s]+$/;
if(newz =="" )
{
  alert("Request letter can't be empty");
    return false;
}
    
else if(!newz.match( regexp) )
{
  alert('Invalid Input in request letter type');
    return false;
}
else if(newz.length < 4 )
{
  alert('too short request letter type ');
    return false;
}
else if(newz.length > 16 )
{
  alert('too large request letter type ');
    return false;
}
    
}
    
    
function validate2(){

  var j=document.getElementById('job').value;
  newj= j.replace(/\s+/g,' ').trim();
  document.getElementById("job").value=newj;
    
  var regexp= /^[a-zA-Z\s]+$/;

if(newj =="" )
{
  alert("job title can't be empty");
    return false;
}
    
else if(!newj.match(regexp))
{
  alert('Invalid Input in job title');
    return false;
}
else if(newj.length < 4 )
{
  alert('too short  job title ');
    return false;
}
else if(newj.length > 16 )
{
  alert('too large job title');
    return false;
}
    
}
    
function validate3(){

  var w=document.getElementById('work').value;
  neww= w.replace(/\s+/g,' ').trim();
  document.getElementById("work").value=neww;
    
  var regexp= /^[a-zA-Z\s]+$/;

if(neww =="" )
{
  alert("work location can't be empty");
    return false;
}
    
else if(!neww.match( regexp) )
{
  alert('Invalid Input in work location');
    return false;
}
else if(neww.length < 4 )
{
  alert('too short  work location ');
    return false;
}
else if(neww.length> 16 )
{
  alert('too large work location');
    return false;
}
    
} 
    
    
    


</script>


<div class="ss"  >
    <div class="inss">

    <label>request letter type </label><br>
       <form action='' method='post'>
    <select name="requestt" >
    <?php
include('loadrequestedlettertypee.php');
           ?>
    </select>
 
    <input type="submit" name="removel" value="Remove"><br>
</form>

<label>JOB TITLE</label><br>
    <form action='' method='post'>
    <select name="jobrequest">
    <?php
include('loadJobTitle.php');
           ?>
    </select>  
    <input type="submit" name="jobb" value="Remove"><br>
    </form>

    <form action='' method='post'>
    <label>Work Location</label><br>
    <select  name="worktype">
           <?php
include('loadLocationComboBox.php');
           ?>
        </select>
        
    <input type="submit" name="ads" value="Remove"><br>
    </form>

    </div>
</div>
    </div>
</body>
</html>
