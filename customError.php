<?php
if(isset($_REQUEST['errormessage'])){   
    
    echo'<center>  
        <div style="margin-top:200px;">
        <h1 style="display:inline-block; vertical-align: middle; color:#DB4437; font-size:60px;">Oops <br><span style="color:#777; font-size:15px;" >Error occured.</span></h1>
        <img style="display:inline-block;   vertical-align: middle;" src="images/robot.png">
         <h2 style="color:#4285F4;">OH NO! SORRY SOMETHING WENT WRONG WE ARE WORKING ON FIX</h2>
        </div>
    
    </center>';

}
function myException($exception) {
    header("location: customerror.php?errormessage=".$exception->getMessage());
    $message = $exception->getMessage().", WE ARE WORKING ON SOLUTION NOW <br>";
    echo $message;
    sendErrorByMail($message);
}
set_exception_handler("myException");

function myErrorHandler($errno, $errstr, $errfile, $errline)
{
    saveErrorLog($errno, $errstr, $errfile, $errline);
    switch ($errno) {
    case E_USER_ERROR:
         header("location: customError?errormessage=SORRY SOMETHING WRONG WITH YOUR REQUEST,A REPORT HAS BEEN SENT TO US");
        break;

    case E_USER_WARNING:
         header("location: customError?errormessage=SORRY YOUR REQUEST IS NOT GETTING RESPONSE, A REPORT HAS BEEN SENT TO US");
        break;

    case E_USER_NOTICE:
           echo"<h3 >SOMETHING MAY GO WRONG , AN ERROR MAY OCCURE</h3>";
           break;
    case E_WARNING:
        header("location: customError?errormessage=SORRY YOUR REQUEST IS NOT COMPLETELY VAILED, A REPORT HAS BEEN SENT TO US ");
        break;
          default:
        header("location: customError?errormessage=SORRY WE CAN'T MAKE YOUR REQUEST RIGHT NOW , A REPORT HAS SENT TO US WE WILL INVESTIGATE SOON AND FIX IT ");
             
    break;
    }

    return true;
}
set_error_handler("myErrorHandler");

function sendErrorByMail($message){
include_once("mailer/PHPMailerAutoload.php");
$mail = new PHPMailer;
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';               // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'hrcompany213@gmail.com';                 // SMTP username
$mail->Password = 'hrpassword123';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            
$mail->Port = 465;                                   

$mail->setFrom('hrcompany213@gmail.com', 'Mailer');
$mail->AddAddress("hrcompany213@gmail.com");
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'CRITICAL ERROR';
$mail->Body    = ''.$message;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}
}




function saveErrorLog($errno , $errstr , $errfile, $errline){
if(!isset($_SESSION['userid'])){
$init=35;
}else{
    $init=$_SESSION['userid'];
}
$conn= mysqli_connect("localhost","root","","hr_system");
$errstr= filter_var($errstr,FILTER_SANITIZE_ENCODED);
$errfile= filter_var($errfile,FILTER_SANITIZE_ENCODED);
$stmt=$conn->prepare("INSERT INTO errorlog(personid,errormessage,errornumber,errorfile,errorline)VALUES(?,?,?,?,?)");
 $stmt->bind_param('isisi',$init,$errstr,$errno,$errfile,$errline);
 $stmt->execute();
 $stmt->close(); 

}

































?>