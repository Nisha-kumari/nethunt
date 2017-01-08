<?php
require_once("../../backend/connect_local.php");

$email=$password="";
$emailErr = "";
$errors="";
$login_errors="";
$reg_errors="";
$login_message="";

if(hasSessionVar("login_message")) {
    $login_message=getSessionVar("login_message");
    unset($_SESSION["login_message"]);
}

global $CON;

$ip = $_SERVER['REMOTE_ADDR'];
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
}

if(isset($_POST['login'])) {
	if(empty($_POST['email'])) {
		$emailErr = "Please enter your email.";
	}
	else {
		$email = test_input($_POST['email']);
		$password = test_input($_POST['password']);
        
        $query="SELECT active,id,first,last,password FROM users where email='$email'";
        $result=mysqli_query($CON,$query);
        if($result->num_rows==0) {
            $login_errors="Email is not registered";
            //die;
        }
        else {
            $row=$result->fetch_row();
            $active=$row[0];
            
            
            if(!$active) {
                $login_errors="Email is not Activated. Email Verification Mail Sent!";
                verification_mail_to($email);
            }
            else {
                $pwd_md5=$row[4];
                if(md5($password)==$pwd_md5) {
                    
                    
                    
                    $query_ip="UPDATE users SET ip='$ip' WHERE email='$email'";
                    $result_ip=mysqli_query($CON,$query_ip);
                    
                    //======== LOGIN SUCCESSFULL ============
                    user_login($email);
                    if(isset($_SESSION["returnto"])) {
                        unset($_SESSION["returnto"]);
                        header("location: ../nethunt_1/");
                    }
                    else {
                        header("Location: ../index.php");
                    }
                }
                else {
                    $login_errors="Incorrect Password";
                }
            }
            /*
            while($row=mysql_fetch_array($querry1))
	  {
	  	$check=$row['check-value'];
	  	$displayname=$row['first'];
	  	}
	  if($check==1)	
	  {
		 $querry=mysql_query("select * from users where email='$email'and password='$password'");
         $narrow= mysql_num_rows($querry);
         if($narrow > 0){
        
         $_SESSION['email']=$email;
         $querry2=mysql_query("select * from activated where email='$email'");
         while($row1=mysql_fetch_array($querry2))
         {
            $reg=$row1['reg_id'];
            $fullname=$row1['name'];
            }
         $_SESSION['reg']=$reg;  
         $_SESSION['fullname']=$displayname;
         header('location: http://cadnitd.co.in/index.php');  
         exit(0);
	     }
	     else
		 {
			 $emailErr = "Incorrect email & password combination.";
		 }
		} else
		 {
			 $emailErr = "You have not verified your email id";
		 }*/
        }
    }
}

if(isset($_POST['register'])) {
    
    $email=test_input($_POST["email"]);
    $password=test_input($_POST["password"]);
    $retype_password=test_input($_POST["retype_password"]);
    $firstname=test_input($_POST["firstname"]);
    $lastname=test_input($_POST["lastname"]);
    $college=test_input($_POST["college"]);
    $country=test_input($_POST["country"]);
    $contact=test_input($_POST["contact"]);
    
    //========VALIDATION============
    $reg_errors=valid($email, $password, $retype_password, $firstname, $lastname, $college, $country, $contact);
    //==============================
    
    if($reg_errors=="") {
        $query_emailchk="SELECT * FROM users WHERE email='$email'";
        if($result=mysqli_query($CON,$query_emailchk)) {
            if($result->num_rows) {
                $reg_errors="Email already Exists";
            }
            else {
                $password=md5($password);
                $query="INSERT INTO users (first,last,contact,college,country,email,password,ip) VALUES ('$firstname', '$lastname', '$contact', '$college', '$country', '$email', '$password','$ip')";
                if ($result=mysqli_query($CON,$query)) {
                    //echo "Registration SUCCESSFULL";

                    $hash=md5($email.time());
                    $query="SELECT id FROM users where email='$email'";
                    $result=mysqli_query($CON,$query);
                    $row=$result->fetch_row();
                    $uid=$row[0];
                    $query="INSERT INTO activation (uid,hash) VALUES ($uid, '$hash')";
                    $result=mysqli_query($CON,$query);

                    /*if(verification_mail_to($email)) {
                    }*/
                    setSessionVar("email",$email);
                    setSessionVar("email_type","Email Verification");
                    header("location: emailsent.php");
                    /*else {
                        echo "Email Verification NOT sent";
                        die;
                    }*/
                }
                else {
                    echo "Error description: " . mysqli_error($CON);
                    echo "Registration UNsuccessfull";
                }
            }
        }
        else {
           echo "Error description: " . mysqli_error($CON);
            die;
        }
    }
}

function valid($email, $password, $retype_password, $firstname, $lastname, $college, $country, $contact) {
    $error="";
    $rex='/^[a-z0-9 .]+$/i';
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error="Email is invalid";
    }
    else if(strlen($password)<8) {
        $error="Password should be of at least 8 characters";
    }
    else if(!ctype_alnum($password)) {
        $error="Password should be alphanumeric";
    }
    else if($password!=$retype_password) {
        $error="Passwords do not match";
    }
    else if(!preg_match($rex, $firstname)) {
        $error="Firstname can only have alphabets";
    }
    else if(!preg_match($rex, $lastname)) {
        $error="Lastname can only have alphabets";
    }
    else if(!preg_match($rex, $college)) {
        $error="College can only have alphabets";
    }
    else if(!preg_match($rex, $country)) {
        $error="Country can only have alphabets";
    }
    else if(!preg_match($rex, $contact)) {
        $error="Contact can only have alphabets";
    }
    return $error;
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
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="technoshine x.5, technoshine , nit durgapur, techno-fest, fest, mca, cad, centre for application development, login">
        <link rel="shortcut icon" href="../favicon.ico">
        <link rel="stylesheet" type="text/css" href="../css/main.css" />
        <link rel="stylesheet" type="text/css" href="../css/homepage.css" />
        <link rel="stylesheet" type="text/css" href="../css/login.css" />

        <!--
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style2.css" />
        -->

        <script type="text/javascript">
            function validate() {
                var form = document.forms["login"];
                var email = form["email"].value;
                var pwd = form["password"].value;

                //EMAIL VALIDATION
                if (!validateEmail(email)) {
                    alert("Invalid Email");
                    form["email"].focus();
                    return false;
                }

                //ALPHANUMERIC PASSWORD
                if (pwd.length < 8) {
                    alert("Password Length should be more than 8 characters");
                    form["password"].focus();
                    return false;
                }

                return true;
            }



            function validate_register() {
                var form = document.forms["register"],
                    email = form["email"].value,
                    pwd = form["password"].value,
                    retype_pwd = form["retype_password"].value,
                    contact = form["contact"].value;
                //fname = form["firstname"].value,
                //lname = form["lastname"].value,
                //college = form["college"].value,
                //country=form["country"].value;

                //EMAIL VALIDATION
                if (!validateEmail(email)) {
                    alert("Invalid Email");
                    form["email"].focus();
                    return false;
                }

                //PASSWORD LENGTH
                if (pwd.length < 8) {
                    alert("Password Length should be more than 8 characters");
                    form["password"].focus();
                    return false;
                }
                //PASSWORD ALPHABUMERIC
                if (!hasAlphaNumeric(pwd)) {
                    alert("Password should be Alpha-Numeric");
                    form["password"].focus();
                    return false;
                }
                //PASSWORD MATCH
                if (pwd != retype_pwd) {
                    alert("Passwords do not match");
                    form["retype_password"].focus();
                    return false;
                }

                // FIRSTNAME
                if (!fieldHasAlphabets(form, "firstname"))
                    return false;
                //LASTNAME
                if (!fieldHasAlphabets(form, "lastname"))
                    return false;
                //COLLEGE
                if (!fieldHasAlphabets(form, "college"))
                    return false;
                //COUNTRY
                if (!fieldHasAlphabets(form, "country"))
                    return false;
                //CONTACT
                if (contact.length < 10) {
                    alert("Contact number should contain 10 digits");
                    form["contact"].focus();
                    return false;
                }


                return true;
            }

            function fieldHasAlphabets(form, fieldname) {
                var value = form[fieldname].value;
                if (hasAlphabets(value)) {
                    return true;
                } else {
                    alert(fieldname[0].toUpperCase() + fieldname.substring(1) + " can only have alphabets");
                    form[fieldname].focus();
                    return false;
                }

            }

            function validateEmail(email) {
                var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
                return re.test(email);
            }

            function hasAlphabets(text) {
                var sp_re = /^[a-zA-Z ]*$/
                return sp_re.test(text);
            }

            function hasAlphaNumeric(text) {
                var an_re = /^[a-z0-9]*$/i
                return an_re.test(text);
            }
            
            /*function hasAlphaNumeric(text) {
                var an_re = /^.*[a-z].*\d.*|.*\d.*[a-z].*$/i
                return an_re.test(text);
            }*/

            function contact_keypressed(e) {
                if (e.charCode == 13)
                    return true;
                return (e.charCode >= 48 && e.charCode <= 57);
            }
        </script>

    </head>

    <body>
        <div id="container">
            <div id="header" class="login-header">
                <div id="header-wrapper">
                    <div id="bg"></div>
                    <div class="nit-logo">
                        <img src="../images/nit_dgp_logo.png" />
                    </div>
                    <div class="cad-logo">
                        <img src="../images/cad_logo.png" />
                    </div>
                    <h1><a href="../index.php"><span class="tsver">&lt;</span>TECHN<div class="o"></div>SHINE<span class="tsver">&#47;&gt;</span><br/><span class="tsver">X.5</span></a></h1>
                </div>
                <div id="wrapper">
                    <div class="form-wrapper">
                        <div id="login-form" class="">
                            <form onsubmit="return validate();" action="" method="post" name="login">
                                <h2>Log in</h2>
                                <input class="text" name="email" required type="email" placeholder="Email" />
                                <input class="text last" name="password" required type="password" placeholder="Password" minlength=8 />
                                <input type="submit" value="Login" name="login" />
                            </form>
                            <p class="change_link">
                                <a href="forgotpassword.php">Forgot Password?</a>
                            </p>

                        </div>
                        <div class="errors">
                            <p>
                                <?php echo $login_errors ?>
                            </p>
                        </div>
                        <div class="login-message">
                            <p>
                                <?php echo $login_message ?>
                            </p>
                        </div>
                    </div>
                    <div class="form-wrapper">
                        <div id="reg-form" class="">
                            <form onsubmit="return validate_register();" action="<?=htmlentities($_SERVER['PHP_SELF'])?>" method="post" name="register">
                                <input class="text" name="email" required type="email" placeholder="Email" />
                                <input class="text" name="password" required type="password" placeholder="Password" minlength=8/>
                                <input class="text" name="retype_password" required type="password" placeholder="Retype Password" minlength=8 />
                                <input class="text" name="firstname" required type="text" placeholder="Firstname" />
                                <input class="text" name="lastname" required type="text" placeholder="Lastname" />
                                <input class="text" name="college" required type="text" placeholder="College" />
                                <input class="text" name="country" required type="text" placeholder="Country" />
                                <input class="text last" name="contact" required type="text" placeholder="Contact" minlength="10" maxlength="10" onkeypress='return contact_keypressed(event)' />
                                <input type="submit" value="Register" name="register" />
                            </form>
                        </div>
                        <div class="errors">
                            <p>
                                <?php echo $reg_errors ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>

    </html>