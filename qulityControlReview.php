<?php
include("session.php");
if($_SESSION['department']=="quality"||$_SESSION['department']=="hr" ){

}else{
        header("location:login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>My letter</title>
    <style>
        h1{
            color:#414690;
        }
    </style>   
    <link rel="stylesheet" type="text/css" href="css/quality.css">

</head>
        <body>
  
    <?php 
include("menu.php");
include("databaseConnect.php");
          
$stmt=$conn->prepare("SELECT responseletter.letterid,responseletter.id,employee.image,responseletter.hrid,responseletter.city,responseletter.zip,responseletter.telephone,responseletter.headtitle,responseletter.state,responseletter.message,responseletter.address,requestedlettertype.type,requestedletter.withsalary,requestedletter.parity,person.name FROM responseletter JOIN requestedletter ON responseletter.letterid=requestedletter.id JOIN person ON requestedletter.employeeid=person.id JOIN requestedlettertype on requestedletter.requestedlettertypeid = requestedlettertype.id JOIN employee ON employee.personid = requestedletter.employeeid WHERE requestedletter.isdeleted=0 AND requestedletter.status=1");
         $c =$stmt->execute();
               if($c===false){
     throw new Exception('selecing  from responseletter failed page qulitycontrolreview line 29  ');
    }
          $result=$stmt->get_result();
          if($result->num_rows > 0){ 
          while($row=$result->fetch_assoc()){ 
          $stm=$conn->prepare("select name from person join responseletter on person.id =?");
          $stm->bind_param("i",$row['hrid']);
          $stm->execute();
          $res=$stm->get_result();
          $ro=$res->fetch_assoc();
          $st=$conn->prepare("select comment from review join requestedletter on review.letterid = ?");
          $st->bind_param("i",$row['letterid']);
          $st->execute();
          $res=$st->get_result();
          $r=$res->fetch_assoc();
              
       echo '  <div class="repeat">
       <div class="letterContainer ">
           <div class="letterSetting">
               <div class="block">
                 <img src="'.$row['image'].'" class="img" >
               <p style="margin-left:21px;">'.$row['name'].'</p>
               </div>
               <div class="block a">
               <h5 class="sw">LETTER DETAILS</h5>
                   <div class="detail">
                   <p>Requested Letter Type</p>
                    <span>'.$row['type'].'</span>
                   </div>
                   
                   <div class="detail">
                   <p>With Salary</p>
                    <span>'.$row['withsalary'].'</span>
                   </div>
                   
                   <div class="detail">
                   <p>priority</p>
                    <span>'.$row['parity'].'</span>
                   </div>
                   
               </div>
           </div>
           
           
        </div>
          <div class="letterPage block">
        <img src="images/logo.png" width="70px;" height="70px;">
        <div id="upDetails">    
          <p>Insta Company</p>
          <p id="locationId" style="word-break: break-all;">'.$row['city'].' '.$row['state'].' '.$row['zip'].'</p>
          <p id="telephone">+'.$row['telephone'].'</p>
          <p id="address" style="word-break: break-all;">'.$row['address'].'</p>
        </div>
        <div id="title">
        <h4 id="letterType" >'.$row['headtitle'].'</h4>
        </div>
        <div id="dear">
            <p>Dear Madam/Sir '.$row['name'].'</p>   
        </div>
        <div>
          <p class="MessageText">'.$row['message'].' </p>
       </div>
      <div id="downDetails">
        <p>sincerely,</p>
        <p id="hrNameId">'.$ro['name'].'<p>
        <p>hr Director Manager</p>
        </div >
          
          
    </div>'; if($_SESSION['department']=='quality'){
        echo'
        <div class="review">
            <h1>Comment</h1>
           <form action="qualityControlBackend.php" method="POST">
            <input type="text" value="'.$row['letterid'].'" name="letterid" hidden>
            <textarea rows=1 id="comment" name="comment" style="width:500px; height:30px; margin-top: 10px;  resize: none;">'.$r['comment'].'
                </textarea>   
                <br>
               <input type="submit" name="save" value="save" style="background-color:lightblue; width:50px" onclick="return check()">
            </form>
        </div>';}
              else{echo'
          <div class="review">
              <h1>Comment From Quailty Control</h1>
              <h2>'.$r['comment'].' </h2>

             </div>';
              }
            echo'
            </div>';
    }}
              ?>
            
            
<?php         
$stm=$conn->prepare("SELECT employee.image,requestedletter.id,requestedletter.requestedlettertypeid,requestedletter.withsalary,requestedletter.parity,requestedletter.status,requestedlettertype.type,person.name FROM requestedletter JOIN requestedlettertype ON requestedletter.requestedlettertypeid = requestedlettertype.id JOIN person ON requestedletter.employeeid = person.id  join employee ON employee.personid=requestedletter.employeeid WHERE  requestedletter.isdeleted = 1  AND requestedletter.status = 1 OR requestedletter.isdeleted = 0  AND requestedletter.status = 0 ORDER BY requestedletter.id DESC");
$r=$stm->execute();
    if($r===false){
     throw new Exception('selecing  from requestedletter failed page qualitycontrolreview line 126 ');
    }
$resultt=$stm->get_result();
if($resultt->num_rows > 0){ 
while($rowp=$resultt->fetch_assoc()){   
          $st=$conn->prepare("select comment from review join requestedletter on review.letterid = ?");
          $st->bind_param("i",$rowp['id']);
          $st->execute();
          $res=$st->get_result();
          $ro=$res->fetch_assoc();
    echo '<div class="repeat">
       <div class="letterContainer ">
           <div class="letterSetting">
               <div class="block">
                 <img src="'.$rowp['image'].'" class="img" >
               <p style="margin-left:21px;">'.$rowp['name'].'</p>
               </div>
               <div class="block a">
               <h5 class="sw">LETTER DETAILS</h5>
                   <div class="detail">
                   <p>Requested Letter Type</p>
                    <span>'.$rowp['type'].'</span>
                   </div>
                   
                   <div class="detail">
                   <p>With Salary</p>
                    <span>'.$rowp['withsalary'].'</span>
                   </div>
                   
                   <div class="detail">
                   <p>priority</p>
                    <span>'.$rowp['parity'].'</span>
                   </div>
                   
               </div>
           </div>
           
           
        </div>
           <div class="letterPage block">
            <center><h1> 
        ';
             if($rowp['status']==1){echo'Letter Rejected';}else{echo'No Response Yet';}
          echo'
              </h1></center>
        </div >
    </div>
       '; if($_SESSION['department']=='quality'){
        echo'
        <div class="review">
            <h1>Comment</h1>
           <form action="qualityControlBackend.php" method="POST">
            <input type="text" value="'.$row['letterid'].'" name="letterid" hidden>
            <textarea rows=1 id="comment" name="comment" style="width:500px; height:30px; margin-top: 10px;  resize: none;">'.$r['comment'].'
                </textarea>   
                <br>
               <input type="submit" name="save" value="save" style="background-color:lightblue; width:50px"class="" onclick="return check()">
            </form>
        </div>';}
              else{echo'
          <div class="review">
              <h1>Comment From Quailty Control</h1>
              <h2>'.$r['comment'].' </h2>

             </div>';
              }
            echo'
            </div>';
    
    
          }}
            
            ?>
            
          
            
            
            
    </body>
    <script>
 
    function check(){
         alert("sda");
    var v= document.getElementById("comment").value;
    newV= v.replace(/\s+/g,' ').trim();
    document.getElementById("comment").value=newV;
        
        if(newV.length>80){
            alert("comment is too large");
            return false;
        }
       else if(newV.length<4){
            alert("comment is too small");
            return false;
        }
        else if(!newV.match(/^[a-zA-Z ]+$/)){
            alert("comment must be string only");
            return false;
        }
       
    }
    

    
    
    </script>
</html>