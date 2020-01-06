<?php
include("databaseConnect.php");
?>
<?php
include("session.php");
if($_SESSION['department']!='employee'){
    header("location: login.php");
}
$check=0;
$init=0;

//make sure request is not the same
if(isset($_POST['submit'])||isset($_POST['update']))
{         

  $stmt = $conn->prepare("SELECT id FROM requestedlettertype where type = ?");
  $stmt->bind_param('s',$_POST['letterType']);
  $r =$stmt->execute();
     if($r===false){
     throw new Exception('selecting in requestedlettertype failed page requestedletterbackend line 16');
    }
  $result=$stmt->get_result();
  if($result->num_rows > 0){ 
   $row=$result->fetch_assoc();
   $lettertypeid=$row['id'];
   $stmt->close();
  } 
  
  $stmt = $conn->prepare("SELECT id FROM requestedletter WHERE employeeid = ? AND status = ? AND withsalary = ?  AND parity = ? AND requestedlettertypeid = ? AND isdeleted= ?");
  $stmt->bind_param('iissii',$_SESSION['userid'],$init,$_POST['withSalary'],$_POST['parity'],$lettertypeid,$init);
 $c=$stmt->execute();
      if($c===false){
     throw new Exception('selecting in requestedletter failed page requestedletterbackend line 26');
    }
  $result=$stmt->get_result();
  echo $result->num_rows;
  if($result->num_rows > 0){ 
  echo"You already sent this letter wait for response ";
  header("location: requestLetter.php?check=".urlencode("failed"));
  $stmt->close();

    }else{
      $check=1;
  }
}

//insert the letter
if($check==1){
if(isset($_POST['submit'])){
 $date=date("Y-m-d H:i:s");
 $stmt = $conn->prepare("INSERT INTO requestedletter(requestedlettertypeid,withsalary,parity,employeeid,status,createddate,isdeleted)VALUES(?,?,?,?,?,?,?)");
 $stmt->bind_param('issiisi',$lettertypeid,$_POST['withSalary'],$_POST['parity'],$_SESSION['userid'],$init,$date,$init);
 $cr=$stmt->execute();
      if($cr===false){
     throw new Exception('inserting in requestedletter failed page requestedletterbackend line 48');
    }
 $stmt->close();
        header("location: requestLetter.php?check=".urlencode("successful"));

  }     
//update the letter
else if(isset($_POST['update'])){
 $stmt = $conn->prepare("UPDATE  requestedletter SET requestedlettertypeid = ? , withsalary = ? , parity = ? , employeeid = ?, status = ? WHERE id = ? AND isdeleted = ?");
 $stmt->bind_param('issiiii',$lettertypeid,$_POST['withSalary'],$_POST['parity'],$_SESSION['userid'],$init,$_POST['letterid'],$init);
 $crr=$stmt->execute();
       if($crr===false){
     throw new Exception('updating in requestedletter failed page requestedletterbackend line 60');
    }
 $stmt->close();
      
    header("location: requestLetter.php?check=".urlencode("updated"));
  
}
    
 }
if(isset($_POST['Delete'])){
    echo"sddsda";
    $init1=1;
 $stmt = $conn->prepare("UPDATE  requestedletter SET isdeleted = ? WHERE id = ? ");
 $stmt->bind_param('ii',$init1,$_POST['letterid']);
 $crc=$stmt->execute(); 
       if($crc===false){
     throw new Exception('updating in requestedletter failed line page requestedletterbackend line 80');
    }
 $stmt->close();
      header("location: requestLetter.php?check=".urlencode("Deleted"));
  
}


?>