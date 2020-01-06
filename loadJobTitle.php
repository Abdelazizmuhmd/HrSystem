
<?php
if(strtolower($_SERVER['PHP_SELF'])!=strtolower("/webproject/loadJobTitle.php")){
$sqly = "SELECT id,jobtitle FROM workjob";
$resulty = mysqli_query($conn, $sqly);
if (mysqli_num_rows($resulty) > 0) {
    while($rowy = mysqli_fetch_assoc($resulty)) {
    echo"<option value='".$rowy['id']."'>".$rowy['jobtitle']."</option>";
    }}
}
?>