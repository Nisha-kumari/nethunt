<?php
require_once("connect_local.php");

global $CON;
$pwd_error="";
$pass=$conpass="";

$email="";
$hash="";

if(isset($_GET['email']) && isset($_GET['hash'])) {
    $email = $_GET['email'];
    $hash = $_GET['hash'];
}
else if(isset($_POST['reset'])) {
    $pass=test_input($_POST['password']);
    $conpass=test_input($_POST['con-password']);
    
    if($pass!=$conpass) {
        $pwd_error="Passwords do not match";
    }
    else {
        $md5_pass=md5($pass);
        $email=$_POST['email'];

        $query="UPDATE users SET password='$md5_pass' WHERE email='$email'";
        $result=mysqli_query($CON,$query);
        if(!$result) {
            die("Error in updating password");
        }
        
        // REDIRECTING TO LOGIN PAGE
        setSessionVar("login_message","Password has been changed. Dont forget it this time!");
        header("location: loginnew.php");
    }
}
else {
    //redirect to hompage
    header("location: ../index.php");
}

?>
    <!DOCTYPE HTML>
    <html>

    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>Forgot Password</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../favicon.ico">
        <link rel="stylesheet" type="text/css" href="../css/main.css" />
        <link rel="stylesheet" type="text/css" href="../css/homepage.css" />
        <link rel="stylesheet" type="text/css" href="../css/login.css" />

        <script>
            function validate() {
                var form = document.forms["reset"],
                    pwd = form["password"].value,
                    con_pwd = form["con-password"].value;

                //PASSWORD ALPHABUMERIC
                if (!hasAlphaNumeric(pwd)) {
                    alert("Password should be Alpha-Numeric");
                    form["password"].focus();
                    return false;
                }

                if (pwd != con_pwd) {
                    alert("Passwords do not match");
                    form["con-password"].focus();
                    return false;
                }

                return true;
            }

            function hasAlphaNumeric(text) {
                var an_re = /^.*[a-z].*\d.*|.*\d.*[a-z].*$/i
                return an_re.test(text);
            }
        </script>
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
                        <div id="password-form">
                            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return validate()" name="reset">
                                <input class="text" name="password" required type="password" placeholder="Password" minlength=8 />
                                <input class="text last" required type="password" placeholder="Retype Password" name="con-password" minlength=8/>
                                <input type="hidden" name="email" value="<?php echo $email; ?>" />
                                <input type="submit" name="reset" value="Submit" />
                            </form>
                        </div>
                        <div class="errors">
                            <p>
                                <?php echo $pwd_error; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>