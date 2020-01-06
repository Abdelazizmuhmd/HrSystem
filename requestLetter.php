
 <?php
include('databaseConnect.php');
    include("session.php");
     if($_SESSION['department']!='employee'){
    header("location: login.php");
    }
?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>My letter</title>
          <link rel="stylesheet" type="text/css" href="css/request.css">

</head>
<body>
    <?php
 include("menu.php");

?>

  
    
             <div style="margin-top:30px;">
   <div class="letterContainer">
 <div class="letterSetting block">
      <h4>LETTER SETTING</h4>
  <form action="requestletterBackend.php"  method="POST">
       <label >Request Letter Type</label>
      <br>
        <select  name="letterType">
       <?php
            include("loadrequestedlettertype.php");
      ?>
</select>   
      <br>
      <br>

    <label> With Salary</label>
      <br>
       <select name="withSalary" >
         <option value="Yes" >Yes</option>
         <option value="no" >No</option>
       
</select>  
      <br>
      <br>
       <label>Paririty</label>
      <br>
         <select name="parity">
         <option value="Low">Low</option>
         <option value="Medium">Medium</option>
         <option value="High">High</option>

       
</select>  
<br>       <input type="text" name="letterid" value='1' hidden>
           <input type="submit" name="submit" class="button" value="Submit">
      <?php
      if(isset($_GET['check'])){
          if($_GET['check']=='successful'){
              $_GET['check']="";
          echo'<h1 style=" color:#383da2;margin-top:50px;">Your Letter Sent Successfully</h1>';
      }else if ($_GET['check']=='failed'){
              $_GET['check']="";
          echo'<h1 style=" color:#383da2;margin-top:50px;">FAILED! Your Letter Is Already sent</h1>';
          }
      }
      ?>

    </form>
        
    </div>
      </div>
      <div class="letterPage block">
        <img src="images/logo.png" width="70px;" height="70px;">
      
          <center><h1 style="color:#383da2;">The Response Will be Here </h1></center>
    </div>
<center><h1 style="color:#383da2; margin-left:80px;margin-top:40px;">Your Requested Letters and Responses</h1></center>

 </div> 

    <?php 
  $sql = 'SELECT type FROM requestedlettertype';
  $stmt = $conn->prepare("SELECT requestedletter.id,requestedletter.requestedlettertypeid,requestedletter.withsalary,requestedletter.parity,requestedletter.status,requestedlettertype.type,person.name FROM requestedletter JOIN requestedlettertype ON requestedletter.requestedlettertypeid = requestedlettertype.id JOIN person ON requestedletter.employeeid = person.id WHERE requestedletter.employeeid = ? AND requestedletter.isdeleted = 0 ORDER BY requestedletter.id DESC ");
  $stmt->bind_param('i',$_SESSION['userid']);
  $c=$stmt->execute();
    if($c===false){
     throw new Exception('selecing  in requestedlettertype failed page requestletter line 87 ');
    }
  $result=$stmt->get_result();
  if($result->num_rows > 0){ 
    $count=0;
  while($row=$result->fetch_assoc()){
  echo'<div style="margin-top:30px;"> 
       
   <div class="letterContainer">
 <div class="letterSetting block">
      <h4>LETTER SETTING</h4>
  <form action="requestletterBackend.php"  method="POST">
       <label >Request Letter Type</label>
      <br>
        <select id="lettertype'.$count.'" name="letterType">  
        ';
    $rresult = mysqli_query($conn, $sql);
    if (mysqli_num_rows($rresult) > 0) {
    while($rrow = mysqli_fetch_assoc($rresult)) {
    echo"<option value='".$rrow['type']."'>".$rrow['type']."</option>";
    }}
    echo'
        </select>   
      
      <br>
      <br>

    <label> With Salary</label>
      <br>
       <select id="withsalary'.$count.'" name="withSalary" >
         <option value="Yes">Yes</option>
         <option value="no">No</option>
       
</select>  
      <br>
      <br>
       <label>Paririty</label>
      <br>
         <select id="parity'.$count.'" name="parity">
         <option value="Low">Low</option>
         <option value="Medium">Medium</option>
         <option value="High">High</option>

</select>  
<br>       <input type="text" name="letterid" value="'.$row['id'].'" hidden>
           <input type="submit" class="button" value="update" name="update"';if($row['status']==1){echo 'hidden';} echo' >
           <input type="submit" class="button" value="Delete" name="Delete"'; if($row['status']==1){echo 'hidden';} echo'>
    </form>
        
    </div>
      </div>
      <div class="letterPage block">

      ';
     $stmtt =$conn->prepare("SELECT city,zip,state,message,telephone,address,headtitle,hrid,person.name FROM responseletter JOIN person ON person.id = responseletter.hrid WHERE letterid= ? ");
     $stmtt->bind_param('i',$row['id']);
     $cr=$stmtt->execute();
       if($c===false){
     throw new Exception('selecing  from responseletter failed page requestletter line 145 ');
    }
     $resultt = $stmtt->get_result();
     if($resultt->num_rows>0){
     $roww=$resultt->fetch_assoc();
      echo'
        <img src="images/logo.png" width="70px;" height="70px;">
        <div id="upDetails">    
          <p>Insta Company</p>
          <p id="locationId" style="word-break: break-all;">'.$roww['city'].' '.$roww['state'].' '.$roww['zip'].'</p>
          <p id="telephone">'.$roww['telephone'].'</p>
          <p id="address" style="word-break: break-all;">'.$roww['address'].'</p>
        </div>
        <div id="title">
        <h4 id="letterType" >'.$roww['headtitle'].'</h4>
        </div>
        <div id="dear">
            <p>Dear Sir/ '.$row['name'].'</p>   
        </div>
        <div>
          <p class="MessageText">'.$roww['message'].'</p>
       </div>
      <div id="downDetails">
        <p>sincerely,</p>
        <p id="hrNameId">'.$roww['name'].'<p>
        <p>hr Director Manager</p>
        </div >
';   
     }else{
         if($row['status']==1){
         echo' <center><h1 style="margin-top:50px; color:#383da2;">Letter Rejected</h1></center>';

         }else{
        echo' <center><h1 style="margin-top:50px; color:#383da2;">No Response yet</h1></center>';}
     }
         echo'
    </div>
 </div>      
    ';  
    echo'<script>document.getElementById("parity'.$count.'").value="'.$row['parity'].'";</script>';
    echo'<script>document.getElementById("withsalary'.$count.'").value="'.$row['withsalary'].'";</script>';
    echo'<script>document.getElementById("lettertype'.$count.'").value="'.$row['type'].'";</script>';

     
      $count+=1;
   }
       echo'<script>document.documentElement.scrollTop = 0;</script>';
  }
    if(isset($_GET['check'])){
          if($_GET['check']=='updated'){
          echo'<script>alert("updated");</script>';
      }else if($_GET['check']=='Deleted'){
             echo'<script>alert("Deleted");</script>';

          }
      }    
?>
         
       
 
</body>
          
</html>