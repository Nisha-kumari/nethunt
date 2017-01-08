<?php
 
require_once("connect_local.php");

 
$response = array();
    global $CON;

 
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

	if(empty($_POST['var1'])) {
	
          $response["success"] = 0;
                $response["description"] = "Please enter your email";
                   echo json_encode($response);
	}
	else {
		$email = test_input($_POST['var1']);
		$password = test_input($_POST['var2']);
        
        $query="SELECT active,id,first,last,password FROM users where email='$email'";
        $result=mysqli_query($CON,$query);
        if($result->num_rows==0) {
            
          $response["success"] = 0;
                $response["description"] = "Email is not registered";
                   echo json_encode($response);
        }
        else {
            $row=$result->fetch_row();
            $active=$row[0];
            if(!$active) {
            
          $response["success"] = 0;
                $response["description"] = "Email is not Activated. Email Verification Mail Sent!";
                   echo json_encode($response);
                verification_mail_to($email);
            }
            else {
                $pwd_md5=$row[4];
                if(md5($password)==$pwd_md5) {
                    //======== LOGIN SUCCESSFULL ============
                 //   user_login($email);
                  //  header("Location: ../index.php");
                }
                else {

          $response["success"] = 0;
                $response["description"] = "Incorrect Password";
                   echo json_encode($response);                
                   }
            }
          	 
        }
    }