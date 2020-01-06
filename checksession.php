<?php
if(isset($_SESSION['userid'])){
    if($_SESSION['department']!="hr"){
        header("location:login.php");
    }
}
?>