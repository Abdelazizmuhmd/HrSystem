 <?php
include("databaseConnect.php");
?>

<?php
if(isset($_POST['submit'])){ 
$employee="employee";
$init=0;
$dateN=date("Y-m-d H:i:s");
    
   
if ($_FILES['image']['error'] == 0){
$target_dir = "userimages/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if ($_FILES["image"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    die();
}else if(file_exists("userimages/".basename(($_FILES["image"]["name"])))){
        echo "Sorry, the image name already exists.";
    die();
}
else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";die();
}
}else{
    echo" please upload the image";die();
}

if ( $_FILES['document']['error'] == 0 ){

$target_dirD = "documents/";
$target_fileD = $target_dirD . basename($_FILES["document"]["name"]);
$documentFileTypeD = strtolower(pathinfo($target_fileD,PATHINFO_EXTENSION)); 
    
if ($_FILES["image"]["size"] > 500000) {
    echo "Sorry, your file is too large.";die();
}
else if(file_exists("documents/".basename(($_FILES["document"]["name"])))){
        echo "Sorry, the document name already exists.";die();
}
else if($documentFileTypeD != "pdf") {
    echo "Sorry, only  pdf files are allowed.";die();
}
}else{
    echo" please upload the document";die();
}




include("checkUsername.php");  
 
if(strlen($_POST['name'])<5){
        echo"name is to short";
}
else if(strlen($_POST['name'])>20)
{       echo"name is to long";
       
}else if(!ctype_alpha($_POST['name'])){
        echo"name  should be alphabet only";
    
} else if(empty($_POST['name'])){
       echo"name can not  be empty";
}
    
//////////////////////////////////////////////////////////////
else if(strlen($_POST['username'])<5){
        echo"username is to short";
}
else if(strlen($_POST['username'])>20)
{       echo"username is to long";
       
}else if(!ctype_alnum($_POST['username'])){
        echo"username is should be alphabet and numbers only";
    
} else if(empty($_POST['username'])){
       echo"username can not  be empty";
}
    
/////////////////////////////////////////////////////////////////////
else if(strlen($_POST['Nationality'])<5){
        echo"Nationality is to short";
}
else if(strlen($_POST['Nationality'])>25)
{       echo"Nationality is to long";
       
}else if(!ctype_alpha($_POST['Nationality'])){
        echo"Nationality is should be alphabet only";
    
} else if(empty($_POST['Nationality'])){
       echo"Nationality can not  be empty";
}
    
///////////////////////////////////////
else if (empty($_POST["email"])) {
   echo"email can not  be empty";
  } 
else if (!filter_var( $_POST["email"], FILTER_VALIDATE_EMAIL)){
    echo"email is invalid";
    
}
    /////////////////////////////////////////////
else if(strlen($_POST['password'])<5){
        echo"password is to short";
}
else if(strlen($_POST['password'])>25)
{       echo"password is to long";
       
}else if(!ctype_alnum($_POST['password'])){
        echo"password is should be alphabet only";
    
}else if(empty($_POST['password'])){
       echo"password can not  be empty";
}
//////////////////////////////
else if(!is_numeric($_POST['day'])){
       echo"please select day";
}else if(!is_numeric($_POST['month'])){
       echo"please select month";
}else if(!is_numeric($_POST['year'])){
       echo"please select year";
}
   /////////////////////////////////////////
else {
    if($result->num_rows > 0){ 
        $stmt->close();

    echo "Sorry username is alreay taken";
    }
else{
    
    
     $stmt->close();
 if(!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
     echo "Sorry, there was an error uploading your image.";die();
  } 
 else if(!move_uploaded_file($_FILES["document"]["tmp_name"], $target_fileD)){
     echo "Sorry, there was an error uploading your document.";die();
} 
    //database

/////////////////
    
       $_POST['name']=filter_var($_POST['name'],FILTER_SANITIZE_STRING);
       $_POST['username']=filter_var($_POST['username'],FILTER_SANITIZE_STRING);
       $_POST['Nationality']=filter_var($_POST['Nationality'],FILTER_SANITIZE_STRING);
       $_POST['password']=filter_var($_POST['password'],FILTER_SANITIZE_STRING);
       $_POST['email']=filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);

    $password=sha1($_POST['password']);
    $stmt = $conn->prepare("INSERT INTO person(name,password,username,department) VALUES(?,?,?,?)");
    $stmt->bind_param("ssss",$_POST['name'],$password,$_POST['username'],$employee);
    $stmt->execute();
    $stmt->close();
///////////////////
    $stmt = $conn->prepare("SELECT id FROM  person WHERE username = ? ");
    $stmt->bind_param("s",$_POST['username']);
     $c=$stmt->execute();
    if($c===false){
     throw new Exception('Inserting in person failed');
    }
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
      $row=$result->fetch_assoc();
      $personid=$row['id'];
    }
    $stmt->close();
/////////////
    $stmt = $conn->prepare("INSERT INTO employee (gender,personid,jobtitleid,worktype,email,worklocationid,day,month,year,document,documentstatus,image,lastseen,createdtime,isdeleted,nationality) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $cr=$stmt->bind_param("siissiiiisisssis",$_POST['gender'],$personid,$_POST['JobTitle'],$_POST['workType'],$_POST['email'],$_POST['workLocation'],$_POST['day'],$_POST['month'],$_POST['year'],$target_fileD,$init,$target_file,$dateN,$dateN,$init,$_POST['Nationality']);
    $cr= $stmt->execute();
     if($cr===false){
     throw new Exception('Inserting in Employee failed');
    }
    $stmt->close();
    header("location: login.php?check=".urlencode("successful"));
}   
}}
?>