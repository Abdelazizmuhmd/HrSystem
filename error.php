
<?php
include("session.php");
 include("checksession.php");
?>
<html>
<style> 
iframe{
        border: none;
    }
body {
 background-image: url("images/wg.jpg");

    margin: 0px;
}

input[type=submit] {
  background-color: #10989b;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  display: inline-block;
  width:400px;
    
}

</style>

<body>
  <?php
     include("menu.php");

    ?>

<form action='' method='post'>
<center >
<input type="submit"  value="MESSAGES" name="massage" style="margin-top:30px;">
<input type="submit"  value="ERROR LOG" name="error" style="margin-top:30px;">
    </center>
    <br>
    <?php
 if(isset($_POST['error'])){
        ?>
<iframe src="errormasseges.php" height="100%"  width="100%" name="errorlog"></iframe>
<?php 
        }  ?>
    <?php
 if(isset($_POST['massage'])){
        ?>
<iframe src="masseges.php" height="100%"  width="100%" name="errorlog"></iframe>
<?php 
        }  ?>
</form>

</body>
</html>