<!DOCTYPE html>
<html>
<body>

<?php
print_r($_POST);die;
$name = $email = $contact = $message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = form($_POST["name"]);
    // check if name only contains letters and whitespace
     // if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
    // $nameErr = "Only letters and white space allowed"; }
    $email = form($_POST["email"]);
    // check if e-mail address is well-formed
   // if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	   //$emailErr = "Invalid email format"; }
    $contact = form($_POST["contact"]);
    $message = form($_POST["message"]);
	}

function form($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$to = "dheeraj@appanalytics.in";
$subject = "Query";
$msg = "Hi, \n\r <br> My name is :". $name." <br> and You can Contact Me Through :\n\r".$email."<br> And My Mobile Number is :\n\r".$contact."<br> Query :\n\r".$message ;
$headers = 'From: '.$email."\r\n";
$headers .= "To: ".$to."\n";
$headers .= "Organization: ADS Hustle\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
$headers .= "X-Priority: 3\r\n";
$headers .= "X-Mailer: PHP". phpversion() ."\r\n" ;

mail($to,$subject,$msg,$headers, "-f dheeraj@appanalytics.in");
header('Location: thanks.html');
?>

</body>
</html>