<?php 
include("databaseConnect.php");
include("session.php");
 if($_SESSION['department']!='employee'){
    header("location: login.php");
}

function update($attribute,$value) {
    $value=filter_var($value,FILTER_SANITIZE_STRING);
include("databaseConnect.php");
     $userid=$_SESSION['userid'];
     $sql="update  employeechangeinfo SET datachangevalue = '$value' WHERE  datachangetype='$attribute' AND personid='$userid'";
     mysqli_query($conn,$sql);
    echo mysqli_affected_rows($conn);
    if (mysqli_affected_rows($conn)==0 || mysqli_affected_rows($conn)==-1){
    $stmti = $conn->prepare("INSERT INTO employeechangeinfo(datachangetype,datachangevalue,personid) VALUES(?,?,?)");
    $stmti->bind_param('ssi',$attribute,$value,$userid);
   $c= $stmti->execute();
    if($c===false){
     throw new Exception('updating  from employeechangeinfo failed page myinfobackend line 11  ');}
    $stmti->close();  
       header("location: myinfo.php?check=".urlencode("requestsent"));
     }else{
       header("location: myinfo.php?check=".urlencode("updated"));
    }
}
function updatePassword($password){
    include("databaseConnect.php");
       $password=sha1($password);
        $userid=$_SESSION['userid'];
        $s = $conn->prepare("update  person set password = ? where id = ?");
        $s->bind_param('si',$password,$userid);
        $s->execute();
       header("location: myinfo.php?check=".urlencode("updated"));

} 


if(isset($_POST['delete'])){
    $userid=$_SESSION['userid'];
    $s=$conn->prepare("DELETE FROM employeechangeinfo WHERE personid = ? ");
    $s->bind_param('i',$userid);
    $r=$s->execute();
        if($r===false){
     throw new Exception('DELETing  from employeechangeinfo failed page myinfobackend line 31 ');}
    $s->close();  
       header("location: myinfo.php?check=".urlencode("deleted"));


}


if(isset($_POST['submit'])){

 include("loadEmployeeData.php");

if($_POST['name']!=""){
if(strlen($_POST['name'])>20)
{       echo"name is to long";
}
else if(strlen($_POST['name'])<5){
        echo"name is to short";
}
else if(!ctype_alpha($_POST['name'])){
        echo"first name  should be alphabet  only";  
}else if($_POST['name']==$row['name']){
    echo"You Already have this name";
}else{
    update("name",$_POST['name']);
}
}   

    
if($_POST['nationality']!=""){

if(strlen($_POST['nationality'])>25)
{       echo"nationality is to long";
}
else if(strlen($_POST['nationality'])<5){
        echo"nationality is to short";
}
else if(!ctype_alpha($_POST['nationality'])){
        echo"nationality  should be alphabet  only";  
} 
else if($_POST['nationality']==$row['nationality']){
        echo"You Already have this nationality";

}else{
        update("nationality",$_POST['nationality']);
}
}
    
if (!empty($_POST["email"])) {
if (!filter_var( $_POST["email"], FILTER_VALIDATE_EMAIL)){
    echo"email is invalid";    
}else if($_POST['email']==$row['email']){
       echo"Your Already Have This email";  
}else{
        update("email",$_POST['email']);

}
}

    
if($_POST['password']!=""){

if(strlen($_POST['password'])>25)
{       echo"password is to long";
}
else if(strlen($_POST['password'])<5){
        echo"password is to short";
}
else if(!ctype_alnum($_POST['password'])){
        echo"password  should be alphabet  and numbers only";  
} 
else if(sha1($_POST['password'])==$row['password']){
       echo"Your Already Have This password";  
} 
else{
      updatePassword($_POST['password']);
    
}
}
    
if(!is_numeric($_POST['day'])){
       echo"please select day";
}else if($_POST['day']==$row['day']){
}else{
  update("day",$_POST['day']);

} 
if(!is_numeric($_POST['month'])){
       echo"please select month";
}else if($_POST['month']==$row['month']){
}else{
      update("month",$_POST['month']);
}
if(!is_numeric($_POST['year'])){
       echo"please select year";
} else if($_POST['year']==$row['year']){
} else{
      update("year",$_POST['year']);
}
   
if ($_FILES['image']['error'] == 0){
$target_dir = "userimages/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
 if ($_FILES["image"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
}else if(file_exists("userimages/".basename(($_FILES["image"]["name"])))){
        echo "Sorry, the image name already exists.";
}
else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
}else if(!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
     echo "Sorry, there was an error uploading your file.";
}   else{
      update("image",$target_file);
}
}

if ( $_FILES['document']['error'] == 0 ){

$target_dirD = "documents/";
$target_fileD = $target_dirD . basename($_FILES["document"]["name"]);
$imageFileTypeD = strtolower(pathinfo($target_fileD,PATHINFO_EXTENSION)); 
    
if ($_FILES["image"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
}
else if(file_exists("documents/".basename(($_FILES["document"]["name"])))){
        echo "Sorry, the document name already exists.";
}
else if($imageFileTypeD != "pdf") {
    echo "Sorry, only txt, doc, pdf files are allowed.";
}else if(!move_uploaded_file($_FILES["document"]["tmp_name"], $target_fileD)){
            echo "Sorry, there was an error uploading your file.";
}else{
          update("document",$target_fileD);

}
}

if($_POST['worklocation']==$row['worklocationid']){
}else{
    update("worklocationid",$_POST['worklocation']);
}
if($_POST['jobtitle']==$row['jobtitleid']){
}
else{
    update("jobtitleid",$_POST['jobtitle']);
}
if($_POST['gender']==$row['gender']){
}
else{
    update("gender",$_POST['gender']);
}
if($_POST['worktype']==$row['worktype']){
}
else{
    update("worktype",$_POST['worktype']);
}  
}else{
    header("location: login.php");
}
 
    




?>