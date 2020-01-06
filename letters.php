<?php 
include("session.php");
include("checksession.php");
?>
<!DOCTYPE html>
<html>

<head>
  <title>Letters</title>
</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
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
  font-size: 25px; 
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
    width: 60px;
    background: #ffb737;
    position: relative;
    border: 0;
    margin: 20px 0 20px 0;
}

.square {
  height: 370px;
  width: 750px;
  background-color: #f7f3f3;
}

.ss{
  display: inline-block;
}

.filter{
  height: 100px;
  width:  150px;
}

.vl {
  border-left: 2px solid #a79e9e  ;
  height: 250px;
}

.square2 {
  height: 40px;
  width: 300px;
  background-color: #fff;
 
}

.qu{
 color: #383da2;
  font-family: "Open Sans", "Helvetica Neue", sans-serif;
  font-weight: bold;
  letter-spacing: -0.1px;
}

.answer{
    color: #414690;
    font-family: "Arial";
    letter-spacing: -0.1px;
    font-weight: 300;
    font-size: 14px;
}


.acceptButton {
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


.declineButton {

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
    .qu,.answer{
        padding:8px;
       
    }
    
    .im{
    margin-top: 20px;
    border-radius: 50%;
    width: 100px;
        height: 100px;
    border: 2px solid rgba(236, 231, 231, 0.58);
    padding: 3px;
    box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
    }
</style>
<body>
<?php
    include("menu.php");
    ?>
<center><h1 style="margin-top: 80px;">Letters</h1></center>

     <?php 
    
include("databaseConnect.php");
    if (isset($_POST['decline'])) {
    $update2 = "update requestedletter set status=1, isdeleted=1 where  id = ".$_POST["letterid"];    
    mysqli_query($conn, $update2);
}
    
$query = "SELECT * FROM requestedletter where status = 0 and isdeleted = 0 ORDER BY id DESC";
$result = mysqli_query($conn,$query);

while ($value = mysqli_fetch_array($result)) {
$query2 = "SELECT username as name FROM person where id = ".$value['employeeid'];
$result2 = mysqli_query($conn,$query2);
$value2 = mysqli_fetch_array($result2);

$query3 = "SELECT type FROM requestedlettertype where id = ".$value['requestedlettertypeid'];
$result3 = mysqli_query($conn,$query3);
$value3 = mysqli_fetch_array($result3);

$query4 = "SELECT image FROM employee where personid = ".$value['employeeid'];
$result4 = mysqli_query($conn,$query4);
$value4 = mysqli_fetch_array($result4);

$query5 = "SELECT name as hrname FROM person where id =".$_SESSION['userid']; //select Hr Name
$result5 = mysqli_query($conn,$query5);
$value5 = mysqli_fetch_array($result5);

echo 
     "
     <center>
<div class='square'>
  <center><img  class='im' src='$value4[image]'></center><br>
 <center>
  <div class='square2 ss' style=''>
  <label  class='qu'><b>Name</b></label><br>
  <font   class='answer'> $value2[name]</font><br>
  </div>

  <div class='square2 ss' style=''>
  <label  class='qu'><b> Requested Letter Type</b></label><br>
  <font   class='answer'> $value3[type]</font><br>
  </div>

  <div class='square2 ss' style='margin-top: 10px;''>
  <label  class='qu'>Without Salary</label><br>
  <font   class='answer'> $value[withsalary]</font><br>
  </div>
  

  <div class='square2 ss' style=''>
  <label  class='qu'><b> Priority</b></label><br>
  <font   class='answer'>  $value[parity]</font><br>
  </div>
</center>
 <form action='responseLetter.php' method='POST'>
<input type='text' name='withsalary' value='$value[withsalary]' hidden>
<input type='text' name='name' value='$value2[name]' hidden>
<input type='text' name='parity' value='$value[parity]' hidden>
<input type='text' name='lettertype' value='$value3[type]' hidden>
<input type='text' name='letterid' value='$value[id]' hidden>
<input type='text' name='hrname' value='$value5[hrname]' hidden>
 <center><br>
  <input type='submit' value='Accept'class='acceptButton ss' style='' name = 'submit'> 
  </center>
</form>  
<br>
<form action='' method='POST'>
 <div> 
  <input type='text' name='letterid' value='$value[id]' hidden>
  <input type = 'submit' class='declineButton ss' style='' name = 'decline' value = 'Decline' onclick='return checkDelete()'>

 </div>
 </form>
</center>
 
<center><hr class='botm-line'></center>
</div>
   
    ";}?>

<script type="text/javascript">




  function checkDelete(){
    return confirm('Are you sure?');
}
</script>
</body>

</html>