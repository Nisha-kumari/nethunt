<?php
session_start();

$mysql_host='localhost';
$mysql_user='technos_cad';
$mysql_pass='wnI8T$-Ct9JX';

$mysql_db='technos_technoshinex5';

$CON=mysqli_connect($mysql_host,$mysql_user,$mysql_pass,$mysql_db);

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die;
}


function hasSessionVar($key) {
    return isset($_SESSION[$key]);
}

function getSessionVar($key) {
    if(!isset($_SESSION[$key]))
        return false;
    return $_SESSION[$key];
}

function setSessionVar($key,$value) {
    $_SESSION[$key]=$value;
}

function user_login($email) {
    global $CON;
    $query="SELECT id,first,last FROM users where email='$email'";
    $result=mysqli_query($CON,$query);
    $row=$result->fetch_row();
    
    setSessionVar("uid",$row[0]);       //$_SESSION["uid"]=;
    setSessionVar("firstname",$row[1]); //$_SESSION["firstname"]=$row[1];
    setSessionVar("lastname",$row[2]);  //$_SESSION["lastname"]=$row[2];
    $name=$row[1]." ".$row[2];
    setSessionVar("name",$name);
    
}

function is_user_loggedin() {
    return isset($_SESSION["uid"]);
}

function verification_mail_to($email) {
    global $CON;
    
    $query="SELECT a.hash from activation a,users u WHERE a.uid=u.id AND u.email='$email'";
    $result=mysqli_query($CON,$query);
    
    if($result->num_rows) {
        $row=$result->fetch_row();
        $hash=$row[0];
        $headers = "From: Technoshine X.5 <technoshine.ca@gmail.com>\r\n";
        $headers .= "Return-Path: Technoshine X.5 <technoshine.ca@gmail.com>\r\n";
        $headers .= "Reply-To: Technoshine X.5 <technoshine.ca@gmail.com>\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $headers .= "X-Priority: 3\r\n";
        $headers .= "X-Mailer: PHP". phpversion() ."\r\n";

        $subject = 'Verification mail from TECHNOSHINE X.5';

        $message = "<html>
        <body>
        Hi $firstname $lastname,
        <br>
        <br>
        To Activate your Technoshine X.5 Registration, please click on this ";
        $message .= "<a href='http://2015.cadnitd.co.in/backend/activate.php?email=".urlencode($email)."&hash=$hash'>&#35;LINK</a>
        <br>
        <br>
        Have a Code-tastic Day!!!
        </body>
        </html>";

        $success=mail($email,$subject,$message,$headers);
        return $success;
    }
    else {
        echo "Verification Email not found in DB";
        die;
    }
}

function password_reset_to($email) {
    global $CON;
     $query="SELECT a.hash from activation a,users u WHERE a.uid=u.id AND u.email='$email'";
    $result=mysqli_query($CON,$query);
    
    if($result->num_rows) {
        $row=$result->fetch_row();
        $hash=$row[0];
        $headers = "From: Technoshine X.5 <technoshine.ca@gmail.com>\r\n";
        $headers .= "Return-Path: Technoshine X.5 <technoshine.ca@gmail.com>\r\n";
        $headers .= "Reply-To: Technoshine X.5 <technoshine.ca@gmail.com>\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $headers .= "X-Priority: 3\r\n";
        $headers .= "X-Mailer: PHP". phpversion() ."\r\n";

        $subject = 'Password reset mail from TECHNOSHINE X.5';

        $message = "<html>
        <body>
        Hi $firstname $lastname,
        <br>
        <br>
        To Reset your password, please click on this ";
        $message .= "<a href='http://2015.cadnitd.co.in/backend/reset.php?email=".urlencode($email)."&hash=$hash'>&#35;LINK</a>
        <br>
        <br>
        Have a Code-tastic Day!!!
        </body>
        </html>";

        $success=mail($email,$subject,$message,$headers);
        return $success;
    }
    else {
        echo "Email not found in DB";
        die;
    }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data = strtolower($data);
  return $data;
}