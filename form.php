<!DOCTYPE html>

<html>

<body>



<?php
/*ini_set("SMTP","ssl:smtp.gmail.com" );
ini_set('smtp_port',465);*/
$name = $mobile = $message = $email = "";
$nameErr = $mobileErr = $messageErr = $emailErr = "";

if (strtoupper($_SERVER["REQUEST_METHOD"]) == "POST") {

    if (empty($_POST["name"] || $_POST["name"]==" ")) {
    $nameErr = "Name is required";
  } else {
    $name = form($_POST["name"]);
    // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
     $nameErr = "Only letters and white space allowed"; }
  }

   if (empty($_POST["subject"])) {
    $mobileErr = "Required";
  } else {
    $mobile = form($_POST["subject"]);
  }

  if (empty($_POST["email"])) {
    $emailErr = "Required";
  } else {
    $email = form($_POST["email"]);
  }

  if (empty($_POST["message"])) {
    $messageErr = "Required";
  } else {
    $message = form($_POST["message"]);
  }

  }

function form($data) {

  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;

}

$to = "dheeraj@appanalytics.in";
$subject = "Website contact form query";
$msg = "Hi, \n\r  My name is :". $name." \n\r And My Mobile Number is :".$mobile. " \n\r And My Email Id is :".$email. " \n\r Message :" . $message;
$headers = 'From: '.$email. "\r\n";
$headers .= "To: ".$to."\n";
$headers .= "Organization: Mobiaviator\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
$headers .= "X-Priority: 3\r\n";
$headers .= "X-Mailer: PHP". phpversion() ."\r\n" ;



mail($to,$subject,$msg,$headers, "-f dheeraj@appanalytics.in");
echo '<script type="text/javascript">alert("Successfull!!");window.location.href="index.html";</script>';
?>


</body>

</html>