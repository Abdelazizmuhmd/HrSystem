<?php
include("session.php");
include("checksession.php");
?>
<!DOCTYPE html>
<html>

<head>
    <title>Letters</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        .header {
            overflow: hidden;
            background-color: rgb(0, 0, 255);
            opacity: 0.6;
            padding: 5px 10px;
            opacity: 20px;

            position: fixed;
            /*header still apeear while you scrolling */
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
            border-radius: 4px;
            /*rounded corner of join button*/

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

        .headeropacity {
            background-color: #3d6c78;
            opacity: 0.8;
            filter: Alpha(opacity=50);
            /* IE8 and earlier */
        }

        form {
            display: inline-block;

        }

        .square {
            height: 500px;
            width: 750px;
            background-color: #f7f3f3;
        }

        .ss {
            display: inline-block;
        }

        .square2 {
            height: 40px;
            width: 300px;
            background-color: #fff;

        }

        .qu {
            color: #383da2;
            font-family: "Open Sans", "Helvetica Neue", sans-serif;
            font-weight: bold;
            letter-spacing: -0.1px;
        }

        .answer {
            color: #414690;
            font-family: "Arial";
            letter-spacing: -0.1px;
            font-weight: 300;
            font-size: 14px;
        }

        .button {
            border: none;
            outline: 0;
            display: inline-block;
            padding: 10px 25px;
            color: white;
            text-align: center;
            cursor: pointer;
            border-radius: 4px;
        }

        .accept.button {
            background-color: #53d37a;
        }

        .decline.button {
            background-color: #f41e41;
        }

        .view.button {
            background-color: #10989b;
        }

        .qu,
        .answer {
            padding: 8px;

        }

        .img {
            border-radius: 50%;
            width: 120px;
            height: 120px;
            border: 2px solid rgba(236, 231, 231, 0.58);
            padding: 3px;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
        }
    </style>
</head>

<body>

    <?php
    include("menu.php");
    ?>
    
       <center>     <h1 style="margin-top: 100px;">Informations Of Requested Changes</h1></center>

    <?php

 include("databaseConnect.php");
    /*if(!$conn)
echo("not connected");
else
echo("connected");
*/

    $sql = "select * from employeechangeinfo order by id desc";
    $result = mysqli_query($conn, $sql);
    $employeeValues = [];

    if (mysqli_num_rows($result) > 0) {
        while ($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $values = [];
            $personid = $rows["personid"];
            if (array_key_exists($personid, $employeeValues)) {
                $values = $employeeValues[$personid];
            } else {
                $values = array(
                    "name" => "--",
                    "namechanged" => false,
                    "nationality" => "--",
                    "nationalitychanged" => false,
                    "gender" => "--",
                    "genderchanged" => false,
                    "day" => "--",
                    "daychanged" => false,
                    "month" => "--",
                    "monthchanged" => false,
                    "year" => "--",
                    "yearchanged" => false,
                    "worklocation" => "--",
                    "worklocationchanged" => false,
                    "email" => "--",
                    "emailchanged" => false,
                    "jobtitle" => "--",
                    "jobtitlechanged" => false,
                    "worktype" => "--",
                    "worktypechanged" => false,
                    "image" => null,
                    "imagechanged" => false,
                    "documentchanged" => false
                );
            }

            switch ($rows['datachangetype']) {
                case "name":
                case "nationality":
                case "gender":
                case "day":
                case "month":
                case "year":
                case "email":
                case "worktype":
                case "image":
                case "document":
                    $key = $rows['datachangetype'];
                    if (!$values[$key . "changed"]) {
                        $values[$key] = $rows["datachangevalue"];
                        $values[$key . "changed"] = true;
                    }
                    break;
                case "worklocationid":
                    if (!$values["worklocationchanged"]) {
                        $worklocationSql = "select * from worklocation WHERE id = " . $rows["datachangevalue"];
                        $worklocationResult = mysqli_query($conn, $worklocationSql);
                        $worklocationRow = mysqli_fetch_array($worklocationResult, MYSQLI_ASSOC);

                        $values["worklocation"] = $worklocationRow["location"];
                        $values["worklocationchanged"] = true;
                    }
                    break;
                case "jobtitleid":
                    if (!$values["jobtitlechanged"]) {
                        $jobtitleSql = "select * from workjob WHERE id = " . $rows["datachangevalue"];
                        $jobtitleResult = mysqli_query($conn, $jobtitleSql);
                        $jobtitleRow = mysqli_fetch_array($jobtitleResult, MYSQLI_ASSOC);

                        $values["jobtitle"] = $jobtitleRow["jobtitle"];
                        $values["jobtitlechanged"] = true;
                    }
                    break;
            }

            $employeeValues[$personid] = $values;
        }
    }

    foreach ($employeeValues as $key => $values) {
    ?> <center>
        <div class="square" style="margin-top:70px;">
            <br>
            <div style=" width:690px; height:400px; ">
            <?php
            if ($values["image"] != null) {
                echo "<center><img class=\"img\" src=\"" . $values["image"] . "\"/></center><br>";
            }else{
                echo"<br><br><br><br><br><br>";
            }
            ?>

            <div class="square2 ss" >
                <label class="qu"><b>Name</b></label><br>
                <font class="answer"><?php echo $values["name"] ?></font><br>
            </div>

            <div class="square2 ss" >
                <label class="qu"><b>Nationality</b></label><br>
                <font class="answer"><?php echo $values["nationality"] ?></font><br>
            </div>

            <div class="square2 ss" style="margin-top: 10px;">
                <label class="qu">Gender</label><br>
                <font class="answer"><?php echo $values["gender"] ?></font><br>
            </div>

            <div class="square2 ss" style="">
                <label class="qu"><b>Birth Date</b></label><br>
                <font class="answer"><?php echo $values["day"] . "/" . $values["month"] . "/" . $values["year"] ?></font><br>
            </div>

            <div class="square2 ss" style="margin-top: 10px;">
                <label class="qu">Location</label><br>
                <font class="answer"><?php echo $values["worklocation"] ?></font><br>
            </div>

            <div class="square2 ss" style="">
                <label class="qu"><b>Email</b></label><br>
                <font class="answer"><?php echo $values["email"] ?></font><br>
            </div>

            <div class="square2 ss" style="margin-top: 10px;">
                <label class="qu">Job Title</label><br>
                <font class="answer"><?php echo $values["jobtitle"] ?></font><br>
            </div>

            <div class="square2 ss" style="">
                <label class="qu"><b>Work Type</b></label><br>
                <font class="answer"><?php echo $values["worktype"] ?></font><br>
            </div>

            <div style="margin-top: 30px;"></div>

            <center>
                <div style="margin-top: 30px;">
                    <form method="post" action="makeChanges.php">
                        <input type="hidden" name="personid" value="<?php echo $key ?>" >
                        <input type="submit" class="accept button" name="submit" value="Accept" >
                        <input type="submit" class="decline button" name="submit" value="Decline" >
                    </form>  
                    
                    <form method="post" action="document.php" target="_blank">
                    <?php if ($values["documentchanged"]) { ?>
                        <input type="text" name="uid" value="<?php echo $key ?>" hidden>
                        <input type="submit" class="view button" name="view doc" value="View Documents" >
                    <?php } ?>
                    </form>
                       <form method="POST" action="employeeInfo.php" target="_blank">
                    <input type="hidden" name="userid" value="<?php echo $key ?>" >
                    <input type= "submit" class="view button" name="view profile" value="View Profile" >
                    </form>
                   
                </div>
            </center>
                  </div>
        </div>
    </center>
    <?php
    }
    ?>
</body>

</html>