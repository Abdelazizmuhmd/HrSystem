<?php
include("checksession.php");

if ($_SERVER["REQUEST_METHOD"] != "POST" || !isset($_POST["personid"]) || !isset($_POST["submit"])) {
    header("Location: requestedChanges.php");
    exit();
}

$personid = $_POST["personid"];
$change = $_POST["submit"];
if ($change != "Accept" && $change != "Decline") {
    header("Location: requestedChanges.php");
    exit();
}

function redirectToEmployeeInfo($id) {
?>
    <form id="redirect" action="employeeInfo.php" method="post">
    <input type="hidden" name="userid" value="<?php echo $id; ?>"/>
    </form>
    <script type="text/javascript">document.getElementById('redirect').submit();</script>
<?php
    exit();
}

$conn = mysqli_connect("localhost", "root", "", "hr_system");
$sql = "select * from employeechangeinfo where personid = " . $personid . " order by id desc";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) <= 0) {
    redirectToEmployeeInfo($personid);
    exit();
}

if ($change == "Accept") {
    $changes = [];
    while ($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $key = $rows['datachangetype'];
        if (!array_key_exists($key, $changes)) {
            $changes[$key] = $rows['datachangevalue'];
        }
    }

    $employeeUpdate = "";
    $personUpdate = "";
    foreach ($changes as $key => $value) {
        switch ($key) {
            case "name":
                $personUpdate .= "name = '" . $value . "'";
                break;
            case "nationality":
            case "gender":
            case "email":
            case "worktype":
            case "image":
            case "document":
            case "status":
                $employeeUpdate .= " " . $key . " = '" . $value . "',";
                break;
            case "worklocationid":
            case "jobtitleid":
            case "day":
            case "month":
            case "year":
            case "documentstatus":
                $employeeUpdate .= " " . $key . " = " . $value . ",";
                break;
        }
    }
    $employeeChange = true;
    if ($employeeUpdate != "") {
        $employeeIdSql = "select * from employee where personid = " . $personid;
        $employeeIdResult = mysqli_query($conn, $employeeIdSql);

        if (mysqli_num_rows($employeeIdResult) <= 0) {
            header("Location: requestedChanges.php");
            exit();
        }
        $employeeId = -1;
        while ($employeeIdRows = mysqli_fetch_array($employeeIdResult, MYSQLI_ASSOC)) {
            $employeeId = $employeeIdRows['id'];
            break;
        }

        $employeeUpdate = "update employee set " . substr($employeeUpdate, 0, -1) . " where id = " . $employeeId;
        $employeeChange = mysqli_query($conn, $employeeUpdate);
    }

    $personChange = true;
    if ($personUpdate != "") {
        $personUpdate = "update person set " . $personUpdate . " where id = " . $personid;
        $personChange = mysqli_query($conn, $personUpdate);
    }

    if (!$employeeChange || !$personChange) {
        header("Location: requestedChanges.php");
        exit();
    }
}
$deleteChangesSql = "delete from employeechangeinfo where personid = " . $personid;
$deleteChanges = mysqli_query($conn, $deleteChangesSql);
if (!$deleteChanges) {
    header("Location: requestedChanges.php");
} else {
    if($change != "Decline"){
      redirectToEmployeeInfo($personid);}
    else{
            header("Location: requestedChanges.php");
    }
}

?>