<?php
include("databaseConnect.php");
    session_start();

if(isset($_POST['add'])){
$question=trim(preg_replace('/\s+/', ' ',  $_POST['addQ']));                       
$answer=trim(preg_replace('/\s+/', ' ',  $_POST['addA']));    
$Qlength= strlen($question);
$Alength= strlen($answer);
$addTimeDate = date("Y-m-d H:i:s");
 $r = mysqli_query($conn,"SELECT question FROM help WHERE question = '$question' and isdeleted = 0 LIMIT 1");

  
    
    
if($question == ''){
  echo "Question mustn't be empty";
}

else if ($Qlength < 15){
echo "<br><redtext> question must be greater than 15 char</redtext>";
}
else if(!ctype_alpha(str_replace(' ', '',$question))){
    echo "<br><redtext>Question Must be only String</redtext>";

}else if ($Qlength > 75){
echo "<br><redtext> question must be less than 75 char</redtext>";
}
else if($answer == ''){
  echo "Answer mustn't be empty";
}
else if ($Alength < 15){
echo "<br><redtext> Answer must be greater than 15 char</redtext>";
}
else if(!ctype_alpha(str_replace(' ', '',$answer))){
    echo "<br><redtext>Answer Must be only String</redtext>";

}else if ($Alength >75){
echo "<br><redtext> Answer must be smaller  than 75 char</redtext>";
}

else if(mysqli_num_rows($r)>0){ //check if question alreadi exists in database
  echo "Already Exists";
}else{
$personid = $_SESSION['userid'];
$query = "INSERT INTO help (question ,answer ,isdeleted ,iscreated, questionaddedby) VALUES ('$question', '$answer', 0, '$addTimeDate','$personid')";

mysqli_query($conn, $query) or die ( mysqli_error());
header("location: help.php");
exit;
} 
}
 if (isset($_POST['Finaledit'])) {

     
$editquestion=trim(preg_replace('/\s+/', ' ', $_POST['editQ']));                       
$editanswer=trim(preg_replace('/\s+/', ' ',  $_POST['editA']));    
$Q2length= strlen($editquestion);
$A2length= strlen($editanswer);    
$r = mysqli_query($conn,"SELECT question FROM help WHERE question = '$editquestion' and isdeleted = 0 LIMIT 1");

     
     
     
   if($editquestion == ''){
  echo "Question mustn't be empty";
}

else if ($Q2length < 15){
echo "<br><redtext> question must be greater than 15 char</redtext>";
}
else if(!ctype_alpha(str_replace(' ', '',$editquestion))){
    echo "<br><redtext>Question Must be only String</redtext>";

}else if ($Q2length > 75){
echo "<br><redtext> question must be less than 75 char</redtext>";
}
else if($editanswer == ''){
  echo "Answer mustn't be empty";
}
else if ($A2length < 15){
echo "<br><redtext> Answer must be greater than 15 char</redtext>";
}
else if(!ctype_alpha(str_replace(' ', '',$editanswer))){
    echo "<br><redtext>Answer Must be only String</redtext>";

}else if ($A2length >75){
echo "<br><redtext> Answer must be smaller  than 75 char</redtext>";
}

else if(mysqli_num_rows($r)>0){ //check if question alreadi exists in database
  echo "Already Exists";
}else{  

     
     
     
 $r2 = mysqli_query($conn,"SELECT question FROM help WHERE question = '$editquestion' and isdeleted = 0 LIMIT 1");
if(mysqli_num_rows($r2)>0){ //check if question alreadi exists in database
  echo "Already Exists";
}else{
    $update2 = "update help set question='$editquestion',answer = '$editanswer' where  id = ".$_POST["letterid"];    
    mysqli_query($conn, $update2);
    header("location: help.php");
    exit;
}}
}
 if (isset($_POST['delete'])) {
    $delete = "update help set isdeleted  = 1 where  id = ".$_POST["deleteid"];     
    mysqli_query($conn, $delete);
    header("location: help.php");
    exit;
}

  


?>

<!DOCTYPE html>
<html>

<head>
    <title>help page</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <script src="js/finalhelp.js"></script>
<style>


.button {
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
  font-size: 20px; 
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
    width: 360px;
    background: #ffb737;
    position: relative;
    border: 0;
    margin: 20px 0 20px 0;
}

.qu{
  height: 30px;
  width: 80px;
  background-color: #673d3d;
}


 .editButton {
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


.deleteButton {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 10px 25px;
  color: white;
  background-color: #f41e41;
  text-align: center;
  cursor: pointer;
  border-radius: 4px;
}
</style>
    </head>

<body>

  <div class="header headeropacity">
      <a href = "HrSystemWelcomePage.html" class = "logo">
      <img src="images/logo.png" class="img-responsive" style="width: 60px; margin-top: -10px;">
    </a>
    <div class ="header-right">
      <div style="padding-top: 10px;">
<?php 
if(isset($_SESSION['department'])){
        if($_SESSION['department'] == 'employee'){
          echo "
  <a href='welcomepage.php'><i class='fa fa-home' > Home</i></a> 
  <a href='myinfo.php'><i class='fa fa-user'> Profile</i></a>
  <a href='requestletter.php'><i class='fa fa-envelope' > Request Letters</i></a>
   <a  class='fa fa-plus 'href='Contact_Us.php' > Send Messages</a>
  <a href='help.php'><i class='fa fa-question-circle' > Help</i></a>
    <a href='logout.php'><i class='fa fa-sign-out' > Logout</i></a>
  " ;

}else if ($_SESSION['department'] == 'quality'){
  echo "
    <a href='welcomepage.php'><i class='fa fa-home'> Home</i></a>
    <a href='qulitycontrolreview.php'><i class='fa fa-eye'> Review Letters</i></a>
    <a href='help.php'><i class='fa fa-question-circle' > Help</i></a>
    <a href='logout.php'><i class='fa fa-sign-out' > Logout</i></a>
    
    ";

}else if ($_SESSION['department'] == 'hr'){
  echo "
    <a href='#' data-toggle='modal' data-target='#addModal'><i class='fa fa-plus'> Add Q & A</i></a> 
      <a href='welcomepage.php'><i class='fa fa-home' >Home</i></a>
     <a class='fa fa-envelope 'href='error.php' > Messages</a>
     <a href='qulitycontrolreview.php'><i class='fa fa-eye' > Review Letters</i></a>
     <a href='edit.php'><i class='fa fa-eye' > Drop Menu</i></a>
     <a href='hrmanagerlogin.php'><i class='fa fa-folder'> Directory</i></a>
      <a href='letters.php'><i class='fa fa-envelope' > letters</i></a>
     <a href='requestedchanges.php'><i class='fa fa-info-circle' > Info Requests</i></a>
      <a href='help.php'><i class='fa fa-question-circle' > Help</i></a>
      <a href='logout.php'><i class='fa fa-sign-out' style='padding-right: 35px;'> Logout</i></a>



";
}
}else{
  echo "      
  <a href='welcomepage.php'><i class='fa fa-home' style='padding-right: 35px;'> Home</i></a>
  <a href='signup.php'><i class='fa fa-user-plus' style='padding-right: 35px;'> Sign Up</i></a>
  <a href='login.php'><i class='fa fa-sign-in' style='padding-right: 35px;'> Sign In</i></a>
  <a href='help.php'><i class='fa fa-question-circle' style='padding-right: 35px;'> Help</i></a>
";
}
?>
</div>
</div>
<?php
      if(isset($_SESSION['department'])){

if ($_SESSION['department'] == 'hr'){
  echo "
<center><input type='text' id='Search' onkeyup='myFunction()' placeholder='Search . . . .' title='Type in a name' class='form-control' aria-label='Search'></center>";
}}
?>
</div>
<center><h1 style="margin-top: 130px;"><b>C</b>ommon <b>Q</b>uestions <img src="images/question.png" width="30" height="30" ></h1></center>
    <?php
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM help where isdeleted = 0 ORDER BY id DESC";
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "
      <div class='target'>
    <div>

  <h1 style='margin-left: 200px;padding:8px;background-color: #bbc7d2;width: 70%;border-radius: 15px;'><img src='images/question.png' width='30' height='30' > $row[question] ?</h1><h3 style='margin-left: 200px;margin-top: 30px;padding:8px;background-color: #b1d3c1;width: 70%;border-radius: 15px;'><img src='images/answer.png' width='30' height='30'> $row[answer] .</h3>
</div>
<center>";
        if(isset($_SESSION['department'])){

if ($_SESSION['department'] == 'hr'){
  echo "
  <input type = 'submit' class='editButton ss' style='' name = 'edit' value = 'Edit' data-toggle='modal' data-target='#editModal'>
  ";
}}
echo"
<form action='' method='POST'>
 <div> 
  <br>";
        if(isset($_SESSION['department'])){

  if ($_SESSION['department'] == 'hr'){
  echo "
  <input type = 'submit' class='deleteButton ss' style='' name = 'delete' value = 'Delete' onclick='return checkDelete()'>
  ";
}}
echo "
  <input type='text' name='deleteid' value='$row[id]' hidden>
 </div>
 </form>  

<div class='container'>
  <!-- Modal -->
  
  <div class='modal fade' id='editModal' role='dialog'>
    <div class='modal-dialog'>
    
      <!-- Modal content-->
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal'>&times;</button>
          <h4 class='modal-title'>Edit</h4>
        </div>
        <div class='modal-body'>
          <form action='' method='POST'>
    <div class='form-group'>
      <label>Question ?</label>
      <input type='text' class='form-control' id='question2' name='editQ'>
    </div>
    <div class='form-group'>
      <label >Answer</label>
      <input type='text' class='form-control' id='answer2' name='editA'>
      <input type='text' name='letterid' value='$row[id]' hidden>
    </div>
    <div class='modal-footer'>
          <center><input type='submit' class='btn btn-info btn-lg' value='Edit' name='Finaledit' 
          onclick='return validateForm2()'></center>
        </div>
  </form>
        </div>
        
      </div>
      
    </div>
  </div>

    <center><hr class='botm-line'></center>
 </center>
 </div>
";
    }
    } else{ echo "Cleared"; }
    $conn->close();
    ?>
    

<div class="container">
  <!-- Modal -->
  

  <div class="modal fade" id="addModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add</h4>
        </div>
        <div class="modal-body">
          <form action="" method="POST">
    
    <div class="form-group">
      <label>Question ?</label>
      <input type="text" class="form-control" id="question" name="addQ">
    </div>
    <div class="form-group">
      <label >Answer</label>
      <input type="text" class="form-control" id="answer" name="addA">
    </div>
    <div class="modal-footer">
          <center><input type="submit" class="btn btn-info btn-lg" value="Add" name="add" onclick=" return validateForm()"></center>
        </div>
  </form>
        </div>
        
      </div>
      
    </div>
  </div>  
</div>
</body>
</html>
