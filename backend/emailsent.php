<?php
require_once("../../backend/connect_local.php");

$email=$_SESSION["email"];
$email_type=$_SESSION["email_type"];

switch($email_type) {
    case "Email Verification":
        if(!verification_mail_to($email)) {
            die("Error in sending $email_type to $email");
        }
        break;
    case "Password Reset":
        if(!password_reset_to($email)) {
            die("Error in sending $email_type to $email");
        }
        break;
}

?>
    <!DOCTYPE HTML>
    <!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
    <!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
    <!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
    <!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
    <!--[if (gt IE 9)|!(IE)]><!-->
    <html lang="en" class="no-js">
    <!--<![endif]-->

    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>Email Sent!</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <link rel="shortcut icon" href="../favicon.ico">
        <link rel="stylesheet" type="text/css" href="../css/main.css" />
        <link rel="stylesheet" type="text/css" href="../css/homepage.css" />
        <link rel="stylesheet" type="text/css" href="../css/login.css" />
    </head>

    <body>
        <div id="container">
            <div id="header" class="login-header">
                <div id="bg"></div>
                <div class="nit-logo">
                    <img src="../images/nit_dgp_logo.png" />
                </div>
                <div class="cad-logo">
                    <img src="../images/cad_logo.png" />
                </div>
                <h1><span class="tsver">&lt;</span>TECHN<div class="o"></div>SHINE<span class="tsver">&#47;&gt;</span><br/><span class="tsver">X.5</span></h1>
                <div id="wrapper">
                    <div class="message">
                        <img src="../images/email.png" />
                        <div class="text">
                            <?php echo $email_type;?> mail sent to <span class="email"><?php echo $email;?></span>. Please check your mail and verify it.<br>Check <span style="color:crimson">SPAM</span> folder if email is not found in Inbox.
                        </div>
                        <br>
                        <a style="color:green" href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">RESEND EMAIL</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </html>