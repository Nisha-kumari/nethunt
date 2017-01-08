<?php
require_once("connect_local.php");

global $CON;
//Open a new connection to the MySQL server


//define variables and set to empty values
 $email = "";
 $emailErr="";

if (isset($_POST['submit'])) {
  if (empty($_POST["email"])) {
    $emailErr= "Email is required";
  }
  else {
    $email= test_input($_POST["email"]);
    $sql = "SELECT * from users where email='$email'";
    if(!$result = $CON->query($sql)) {
      die('There was an error running the query [' . $CON->error . ']');
    }
    $num=$result->num_rows;
    if ($num==0) {
        // output data of each row
       $emailErr= "Email is not registered";
    }
    else {
        //password_reset_to($email);
        setSessionVar("email",$email);
        setSessionVar("email_type","Password Reset");
        header("location: emailsent.php");
    }
  }
}

?>
    <!DOCTYPE HTML>
    <html>

    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>Forgot Password</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="technoshine x.5, technoshine , nit durgapur, techno-fest, fest, mca, cad, centre for application development, forgot, password">
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
                    <div class="form-wrapper">
                        <div id="email-form">
                            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="submit">
                                <input class="text" name="email" required type="email" placeholder="Email" />
                                <input type="submit" name="submit" value="Reset Password" />
                            </form>
                        </div>
                        <div class="errors">
                            <p>
                                <?php echo $emailErr ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>