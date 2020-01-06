<?php

if($_SERVER['REQUEST_URI']!="/webproject/loadEmployeeData.php"){
    //put sssion here
      $stmt=$conn->prepare("select employee.status,employee.documentstatus,person.name,employee.jobtitleid,person.username,employee.gender,person.password,employee.nationality,employee.worktype,employee.day,employee.worklocationid,employee.month,employee.year,employee.email,worklocation.location,workjob.jobtitle FROM employee JOIN person ON employee.personid = person.id JOIN worklocation ON employee.worklocationid = worklocation.id JOIN workjob ON employee.jobtitleid = workjob.id WHERE employee.personid =".$_SESSION['userid']."");
      $stmt->execute();
      $result=$stmt->get_result();
      $row=$result->fetch_assoc();

}else{
    header("location: login.php");
}


?>
