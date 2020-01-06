
<?php
if(strtolower($_SERVER['PHP_SELF'])!=strtolower("/webproject/loadLocationComboBox.php")) {
$sqlq = "SELECT id,location FROM worklocation  ";
$resultq = mysqli_query($conn, $sqlq);
if (mysqli_num_rows($resultq) > 0) {
    while($rowq = mysqli_fetch_assoc($resultq)) {
    echo"<option value='".$rowq['id']."'>".$rowq['location']."</option>";
    }
}
}

?>