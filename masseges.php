<?php
include("session.php");
include("checksession.php");
include("databaseConnect.php");
?>
<html>

<style>
    body{
        background-image: url("images/wg.jpg");

    }
input[type=button] {
  background-color: #10989b;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
</style>

<head>

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
<th><strong><center>Name</center></strong></th>
<th><strong><center>email</center></strong></th>
<th><strong><center>subject</center></strong></th>
<th><strong><center>phone number</center></strong></th>
<th><strong><center>Message</center></strong></th>
<th><strong><center>Delete</center></strong></th>
</tr>
</thead>
<tbody>

<?php
$count=1;
$sel_query="Select messages.id ,messages.subject, messages.telephone,messages.email,person.username,messages.message from messages join person on person.id = messages.personid ORDER BY username DESC;";
 $result = mysqli_query($conn,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $row["username"];; ?></td>
<td align="center"><?php echo $row["email"]; ?></td>
<td align="center"><?php echo $row["subject"]; ?></td>
<td align="center"><?php echo $row["telephone"]; ?></td>
<td align="center"><?php echo $row["message"]; ?></td>
<td align="center">
<a onclick="return checkDelete()" href="delete.php?id=<?php echo $row["id"]; ?>"><button class="btn btn-danger">Delete</button></a>
</td>
</tr>
<?php $count++; } ?>
</tbody>
</table>

<script>
function myFunction() {
  alert("deleted succes");
}
</script>
</body>

</html>