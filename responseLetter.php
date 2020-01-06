
<?php
include("session.php");
include("checksession.php");
?>
<!DOCTYPE html>
<html>
<head>
    
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Send letter</title>
           <link rel="stylesheet" type="text/css" href="css/page.css">

<script src="js/responsee.js"></script>

</head>
   
    <?php
if(isset($_POST['submit'])){ 
?>
<body>
    <?php
    include("menu.php");
    ?>


    
    
  <div id="letterSetting" class="beside">  
    <div id="insideLetterSetting">    
        
      <h5>&nbsp;&nbsp;LETTER DETAILS</h5> 
        
      <div >
          <span class="firstDetail" ><span class="inside" >Employee With Salary</span><span class="inside" id="employeeSalaryId">
             <?php echo $_POST['withsalary']; ?>        </span></span>
          <span class="firstDetail" ><span class="inside">Employee Name</span><span class="inside" id="employeeNameId"><?php echo $_POST['name']; ?></span></span>
      </div>  
      <div style="margin-top: 20px" >
          <span class="secondDetail"><span class="inside" >Priority</span><span class="inside" id="priorityId"><?php echo $_POST['parity']; ?></span></span>
         <span class="secondDetail" ><span class="inside">Letter Type</span><span class="inside" id="letterTypeId"><?php echo $_POST['lettertype']; ?></span></span>
      </div>
        
      <div >
          
        <h5 style="margin-top:25px;">&nbsp;&nbsp;LETTER SETTINGS</h5> 
          
        <div id="letterSettings" >
          <label>ADDRESS</label><br>
          <input type="text" id="addressId"  form="form1" name="address" minlength="5"  maxlength="25" required>
           <div >       
             <div class="cityStyle"style="width:48%; height:30px; ">
             <label>CITY</label> 
             <br>
             <input type=text  form="form1" name="city" id="cityId"  style="width:100%; height:30px;margin-top:10px; "  minlength="3"  maxlength="15" required>
             </div>
             <div class="cityStyle"style="width:10%; height:30px; ">
              <br>
              <label>STATE</label> 
              <br>
              <input type=text form="form1" name="state" id="stateId"style="width:100%; height:30px;margin-top:10px;  " maxlength="3" required>
              </div>
              <div class="cityStyle"style="width:31%; height:30px; ">
              <br>
              <label>ZIP CODE</label> 
               <br>
               <input type="text" form="form1" name="zip" id="zipId" style="width:89%; height:30px;margin-top:10px; "  minlength="4"  maxlength="6" required>
               </div>
                    
               <div class="cityStyle"style="width:48%; height:30px; margin-top:40px; " minlength="10"  maxlength="11" required>
               <label >TELEPHONE</label> 
                <br>
                <input form="form1" name="telephone" type=text id="telephoneId"style="width:100%; height:30px; margin-top:10px; ">
                </div> 
                <div class="cityStyle"style="width:40%; height:30px; ">
                 <br>
                 <label>Head Tittle</label> 
                 <br>
                 <input form="form1" name="lettertitle" type=text id="letterId"style="width:99%; height:30px; margin-top:10px;  ">
                 </div>
                 </div>
                 <div>  
                 </div>
 
           
              <input type="button"  value="Show" id="saveId" onClick="return transfer()">
        
          </div>
           
        <div>
                 
        </div>
               
      
      </div>
     </div>
  </div>
    <div id="letter" class="beside" style="margin-top: 30px; position: absolute; " cols="42" row="10">
 
       <img src="images/logo.png" width=70px; height=70px;>
        <div id="upDetails">    
            <p>Insta Company</p>

            
            <p id="locationId" style="word-break: break-all;">city state zip</p>
            <p id="telephone">telephone</p>
            <p id="address" style="word-break: break-all;">address</p>

        </div>
        <div id="title">
    <h4 id="letterType" >Title </h4>
        </div>
        <div id="dear">
            <p>Dear Madam/Sir <span id="EmployeeNameId"></span></p>   
            
        </div>
        <div>
         <textarea  class="textArea" id="messageId" name="message" form="form1">
                </textarea>
            </div>
         <div id="downDetails">
               <p>sincerely,</p>
         <p id="hrNameId"><?php  echo $_POST['hrname']; ?><p>
        <p>hr Director Manager</p>
        </div >

       </div>
    <div>
        <form action="/webproject/responseBackend.php" id="form1" method="POST">
             <input type="hidden"  name="letterid" value="<?php echo $_POST['letterid']; ?>">
           <input type="submit" name="submit" value="Send Letter" class="button" style="margin-top:20px; margin-left:1200px;" onclick="return messageCheck()">
        </form>
    </div>

</body>
    <?php
}else{
    
    header("location: letters.php");
}
?>

  


















      
      
   
    
    
</html>








































