<?php
include("databaseConnect.php");
if(strtolower($_SERVER['PHP_SELF'])!=strtolower(("/webproject/loadrequestedlettertypee.php"))){
$sql = "SELECT id,type FROM requestedlettertype";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
    echo"
    <option value='".$row['id']."'>".$row['type']."</option>";
    }
}
}
?>