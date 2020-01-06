<?php 
include("dataBaseConnect.php");
include("session.php");
if(isset($_SESSION['userid'])){
    if($_SESSION['department']!="quality"){
        header("location:login.php");
    }}

if(isset($_POST['save'])){ 
    
    if($_POST['comment']!=""){
        
    $comment = trim(preg_replace('/\s+/', ' ', $_POST['comment']));
    if(strlen($comment)>80){
        echo "comment is too large";die();
    }else if(strlen($comment)<4){
        echo"comment is too small";die();
    }else if(!ctype_alpha(str_replace(" ","",$comment))){
        echo"comment must be string only";die();
    }
    
   $comment=filter_var($comment,FILTER_SANITIZE_STRING);
$sq="update  review SET comment ='$comment' WHERE  letterid='$_POST[letterid]'";
 mysqli_query($conn,$sq);
if (mysqli_affected_rows($conn)==0 || mysqli_affected_rows($conn)==-1){
$query=$conn->prepare("INSERT INTO review(letterid,comment)values(?,?)");    
$query->bind_param("is",$_POST['letterid'],$comment);
$c=$query->execute();
if($c===false){
throw new Exception('updating  from review failed page qulitycontrolbackend line 23  ');
}
}
}else{
 $sq="update  review SET comment ='' WHERE  letterid='$_POST[letterid]'";
 mysqli_query($conn,$sq);
        
    }

    header("location: qulityControlReview.php");


}
?>