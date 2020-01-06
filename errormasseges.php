<?php
include("session.php");
include("checksession.php");
include("databaseConnect.php");
?>
<html>



<head>
    <style>
      body{
        background-image: url("images/wg.jpg");
    }
    </style>


  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>


    <table width="100%" border="1" style="border-collapse:collapse;" class="table table-striped table-dark">
<thead class="thead-dark">
<tr>
<th><strong><center>ID</center></strong></th>
<th><strong><center>Username</center></strong></th>
<th><strong><center>Error Messages</center></strong></th>
<th><strong><center>Error Type</center></strong></th>
<th><strong><center>Error File</center></strong></th>
<th><strong><center>Error Line</center></strong></th>
<th><strong><center>Delete</center></strong></th>
</tr>
</thead>
<tbody>

<?php
$count=1;
$sel_query="select errorlog.id,errorlog.personid,errorlog.errormessage,errorlog.errornumber,errorlog.errorfile,errorlog.errorline,person.username from errorlog  JOIN person
ON errorlog.personid = person.id;";
$result = mysqli_query($conn,$sel_query);
while($row = mysqli_fetch_assoc($result)) { 
  $query2 = "SELECT id FROM person where id = ".$row['personid'];
  $result2 = mysqli_query($conn,$query2);
  $value2 = mysqli_fetch_array($result2);
    if($row["errornumber"]==2){?>

<tr><td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["username"]; ?></td>
<td align="center"><?php echo urldecode($row['errormessage']); ?></td>
<td align="center"><?php echo ("E-Warning"); ?></td>
<td align="center"><?php echo urldecode($row["errorfile"]); ?></td>
<td align="center"><?php echo urldecode($row["errorline"]); ?></td>
<td align="center">
<a onclick="return checkDelete()" href="delete2.php?id=<?php echo $row["id"]; ?>"><button class="btn btn-danger">Delete</button></a>
</td>
</tr>
<?php  }

else if($row["errornumber"]==512){?>
   <tr><td align="center"><?php echo $count; ?></td>
    <td align="center"><?php echo $row["username"]; ?></td>
    <td align="center"><?php echo urldecode($row['errormessage']); ?></td>
    <td align="center"><?php echo ("E-User Warning"); ?></td>
    <td align="center"><?php echo urldecode($row["errorfile"]); ?></td>
    <td align="center"><?php echo urldecode($row["errorline"]); ?></td>
    <td align="center">
    <a onclick="return checkDelete()" href="delete2.php?id=<?php echo $row["id"]; ?>"><button class="btn btn-danger">Delete</button></a>
    </td>
    </tr>


<?php
}
else if($row["errornumber"]==8){?>
   <tr><td align="center"><?php echo $count; ?></td>
    <td align="center"><?php echo $row["username"]; ?></td>
    <td align="center"><?php echo urldecode($row['errormessage']); ?></td>
    <td align="center"><?php echo ("E-Notice"); ?></td>
    <td align="center"><?php echo urldecode($row["errorfile"]); ?></td>
    <td align="center"><?php echo urldecode($row["errorline"]); ?></td>
    <td align="center">
    <a onclick="return checkDelete()" href="delete2.php?id=<?php echo $row["id"]; ?>"><button class="btn btn-danger">Delete</button></a>
    </td>
    </tr>


<?php
}
else if($row["errornumber"]==256){?>
   <tr><td align="center"><?php echo $count; ?></td>
    <td align="center"><?php echo $row["username"]; ?></td>
    <td align="center"><?php echo urldecode($row['errormessage']); ?></td>
    <td align="center"><?php echo ("E-User Error"); ?></td>
    <td align="center"><?php echo urldecode($row["errorfile"]); ?></td>
    <td align="center"><?php echo urldecode($row["errorline"]); ?></td>
    <td align="center">
    <a onclick="return checkDelete()" href="delete2.php?id=<?php echo $row["id"]; ?>"><button class="btn btn-danger">Delete</button></a>
    </td>
    </tr>


<?php
}
else if($row["errornumber"]==1024){?>
  <tr><td align="center"><?php echo $count; ?></td>
    <td align="center"><?php echo $row["username"]; ?></td>
    <td align="center"><?php echo urldecode($row['errormessage']); ?></td>
    <td align="center"><?php echo ("E-User Notice"); ?></td>
    <td align="center"><?php echo urldecode($row["errorfile"]); ?></td>
    <td align="center"><?php echo urldecode($row["errorline"]); ?></td>
    <td align="center">
    <a onclick="return checkDelete()" href="delete2.php?id=<?php echo $row["id"]; ?>"><button class="btn btn-danger">Delete</button></a>
    </td>
    </tr>
    <?php
}
else{?>
   <tr><td align="center"><?php echo $count; ?></td>
    <td align="center"><?php echo $row["username"]; ?></td>
    <td align="center"><?php echo urldecode($row['errormessage']); ?></td>
    <td align="center"><?php echo ("Other"); ?></td>
    <td align="center"><?php echo urldecode($row["errorfile"]); ?></td>
    <td align="center"><?php echo urldecode($row["errorline"]); ?></td>
    <td align="center">
    <a onclick="return checkDelete()" href="delete2.php?id=<?php echo $row["id"]; ?>"><button class="btn btn-danger">Delete</button></a>
    </td>
    </tr>
    <?php

}
$count++;
}
?>



</tbody>
</table>

<script>
function myFunction() {
  alert("dleted succes");
}
</script>
</body>

</html>