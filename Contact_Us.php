<?php
include("session.php");
  if($_SESSION['department']!="employee"){
        header("location:login.php");
    }
include("databaseConnect.php");

if(isset($_POST['submit'])){

        //Filterss

     if (empty($_POST['telephone']))
        {
     echo ('mobile  number  is empty');
        }
     else if(strlen($_POST['telephone'])!=11)
      {
          echo("wrong phone number");
      }
      else if(!is_numeric($_POST['telephone'])){
    
        echo("phone number must be numbers only");
      }
    
    //subject validation
    else if (empty($_POST['subject']))
    {
    echo 'Subject  is empty';
    }
    else if (strlen($_POST['subject'])>25)
    {
    echo 'Subject must be less than 25';
    } 
    else if (strlen($_POST['subject'])<3)
    {
    echo 'Subject must be more than 3';
    }

    else if (empty($_POST['email']))
    {
    echo 'Email is empty';
    }
    else if (!filter_var( $_POST["email"], FILTER_VALIDATE_EMAIL))
    {
    echo"Email is invalid";
    
    }
    else if (empty($_POST['message']))
    {
      echo 'Massage is empty';
    }
    else if (strlen($_POST['message'])>70)
    {
      echo 'Message is too long';
    }else if (strlen($_POST['message'])<5)
    {
      echo 'Message is too short';
        
    }
    
 else {
        $filtersub=filter_var($_POST['subject'],FILTER_SANITIZE_STRING);
        $filteremail=filter_var($_POST['email'],FILTER_SANITIZE_STRING);
        $filtertele=filter_var($_POST['telephone'],FILTER_SANITIZE_STRING);
        $filtermess=filter_var($_POST['message'],FILTER_SANITIZE_STRING);
  $id=$_SESSION['userid'];
$sql="insert into messages(personid,subject,telephone,email,message) values('$id','$filtersub','$filtertele','$filteremail','$filtermess')";

if ($conn->query($sql) === TRUE) {
    echo "<h3 style='color:white;'>New record created successfully</h3>";
    } 
    else {
    echo "Error: " . $sql . "<br>" . $conn->error;
       }
     }  

}




?>
<html>


<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> Contact Us </title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body style="background-image: url(images/w.png);">
    <?php
    include("menu.php");
    ?>


<div class = "A" >
<div class = "AA">
<div class = "ASS">


<form name="myForm" class="form-group" action="" method="post">

<label> Subject </label><br>
<input id="subject" class="form-control"type="text" type="text" name="subject" minlength="3"  maxlength="30"><br><br>


<label> Telephone </label><br>
<input id="telephone" class="form-control"type="text" type="text" name="telephone"  minlength="10"  maxlength="11"><br><br>

<label> Email </label><br>
<input id="email" type="text"  class="form-control"type="text" name="email"  maxlength="25"><br><br>

<label> Message </label><br>
<textarea id="massage" rows="5" cols="50" name="message" minlength="3"  maxlength="60"placeholder="Enter message here..." class="form-control"></textarea> <br><br>

    <center><input type="submit" value="Submit" name="submit" onclick="return validateForm()"></center>
<br><br> 
</form>

      </div>
   </div>
</div>

<script>

function validateForm()
{
  var x = document.getElementById("subject").value;
  var y = document.getElementById("telephone").value;
  var z = document.getElementById("email").value;
  var m = document.getElementById("massage").value;
    
     var numbers = /^[0-9]+$/;
     var stringA=/^[A-Za-z ]+$/;

  newS= x.replace(/\s+/g,' ').trim();
  document.getElementById("subject").value=newS;
       
   
    
  newM= m.replace(/\s+/g,' ').trim();
  document.getElementById("massage").value=newM;
  
  var stringA=/^[A-Za-z ]+$/;




if(newS =="")
{
  alert("you Must  Enter Subject");
 document.getElementById("subject").style.borderColor = "red";
  return (false);
}else if(newS.length>30){
    alert("subject Must be Less Than 30 char ");
    document.getElementById("subject").style.borderColor = "red";
    return (false);
}else if(newS.length<3){
    alert("subject must be more Than 3 char ");
     document.getElementById("subject").style.borderColor = "red";
    return (false);
}else if(!newS.match(stringA)){
    alert("subject  be String  only");
     document.getElementById("subject").style.borderColor = "red";
    return (false);
}
    
if(y =="")
{
  alert("you Must  Enter telephone");
     var y = document.getElementById("telephone").value;
    return (false);
}else if(y.length!=11){
    alert("telephone must be 11 number ");
      var y = document.getElementById("telephone").value;
    return (false);
}else if(!y.match(numbers)){
    alert("telephone Must be numbers only ");
      var y = document.getElementById("telephone").value;
    return (false);
}
    

if(newM =="")
{
  alert("you Must  Enter massage");
  document.getElementById("massage").style.borderColor = "red";
  return (false);
}else if(newM.length>60){
    alert("massage Must be Less Than 55 char");
    document.getElementById("massage").style.borderColor = "red";
    return (false);
}else if(newM.length<3){
    alert("massage Must be more Than 3 char");
      document.getElementById("massage").style.borderColor = "red";

    return (false);
}else if(!newM.match(stringA)){
    alert("massage Must be String only");
      document.getElementById("massage").style.borderColor = "red";

    return (false);
}    
    


if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(z))
  {
    return (true);
  }
  else{
        document.getElementById("eml").style.borderColor = "red";

        alert("You have entered an invalid email address!");
    return (false);
  }




}







</script>


</body>

</html>