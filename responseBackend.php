 <?php
include("databaseConnect.php");
//include("customError.php");
include("session.php");
include("checksession.php");
?>

<?php
if(isset($_POST['submit'])){ 
    
    
    
$_POST['address'] = trim(preg_replace('/\s+/', ' ', $_POST['address']));
    
$_POST['lettertitle'] = trim(preg_replace('/\s+/', ' ', $_POST['lettertitle']));
$_POST['message'] = trim(preg_replace('/\s+/', ' ', $_POST['message']));

if(strlen($_POST['zip'])<2){
        echo"zip is too short";
}
else if(strlen($_POST['zip'])>5)
{       echo"zip is too long";
}
       
else if(!is_numeric($_POST['zip'])){
        echo"zip  should be numbers only";
    
}else if(empty($_POST['zip'])){
       echo"zip can not  be empty";
}else if(filter_var($_POST['zip'], FILTER_VALIDATE_INT) === false){
 echo" zip not a valid number";   
}
        
else if(strlen($_POST['telephone'])<8){
        echo"telephone is too short";
}
else if(strlen($_POST['telephone'])>12)
{       echo"telephone is too long";
}
       
else if(!is_numeric($_POST['telephone'])){
    echo"telephone  should be numbers only";
    
}else if(empty($_POST['telephone'])){
       echo"telephone can not  be empty";
}    
        
else if(strlen($_POST['address'])>18)
{       echo"address is too long";
}
       
else if(!ctype_alpha(str_replace(' ', '',$_POST['address']))){
        echo"address  should be alphat only";
    
}else if(empty($_POST['address'])){
       echo"address can not  be empty";
}
else if(strlen($_POST['address'])<5){
        echo"address is too short";
}
else if(strlen($_POST['address'])>14)
{       echo"address is too long";
}
       
else if(!ctype_alpha($_POST['city'])){
        echo"city  should be alphat only";
    
}else if(empty($_POST['city'])){
       echo"city can not  be empty";
}
else if(strlen($_POST['city'])<2){
        echo"city is too short";
}
        
else if(strlen($_POST['city'])>7){
        echo"city is too long";
}else if(!ctype_alpha($_POST['state'])){
        echo"state  should be alphat only";
    
}else if(empty($_POST['state'])){
       echo"state can not  be empty";
}
else if(strlen($_POST['state'])<2){
        echo"state is too short";
}
        
else if(strlen($_POST['state'])>4){
        echo"state is too long";

    
}else if(!ctype_alpha(str_replace(' ', '',$_POST['lettertitle']))){
        echo"letter  should be alphat only";
    

    
}else if(empty($_POST['lettertitle'])){
       echo"letter can not  be empty";
}
else if(strlen($_POST['lettertitle'])>18){
        echo"letter is too long";
}        
else if(strlen($_POST['lettertitle'])<4){
        echo"title is too short";
}
        
else if(strlen($_POST['message'])<10){
        echo"message is too short";
}else if(!ctype_alnum(str_replace(' ', '',$_POST['message']))){
        echo"message  should be alphat and numbers only";
    
}else if(empty($_POST['message'])){
       echo"message can not  be empty";
}
else if(strlen($_POST['message'])>700){
        echo"message is too long";
}
        
else if(strlen($_POST['message'])<4){
        echo"message is too short";
}
        
           
else{
    
    $_POST['city']=filter_var($_POST['city'],FILTER_SANITIZE_STRING);
    $_POST['zip']=filter_var($_POST['zip'],FILTER_SANITIZE_STRING);
    $_POST['state']=filter_var($_POST['state'],FILTER_SANITIZE_STRING);
    $_POST['message']=filter_var($_POST['message'],FILTER_SANITIZE_STRING);
    $_POST['telephone']=filter_var($_POST['telephone'],FILTER_SANITIZE_STRING);
    $_POST['address']=filter_var($_POST['address'],FILTER_SANITIZE_STRING);

$init=0;
$hrid=$_SESSION['userid'];
    
$datee=date("Y-m-d H:i:s");  
    
 $stmt=$conn->prepare("INSERT INTO responseletter(city,zip,state,message,telephone,headtitle,hrid,letterid,address,createddate) VALUES(?,?,?,?,?,?,?,?,?,?)");
 $init=0;
 $stmt->bind_param('ssssssiiss',$_POST['city'],$_POST['zip'],$_POST['state'],$_POST['message'],$_POST['telephone'],$_POST['lettertitle'],$hrid,$_POST['letterid'],$_POST['address'],$datee);
 $c=$stmt->execute();
    if($c===false){
     throw new Exception('Inserting in responseletter failed');
    }
    
 $initt=1;
 $stmt=$conn->prepare("UPDATE requestedletter SET status = ? WHERE id = ?");
 $stmt->bind_param("ii",$initt,$_POST['letterid']);
 $cr=$stmt->execute();
    if($cr===false){
     throw new Exception('updating in requestedletter failed');
    }
header("location: Letters.php");

    

    
}}

?>