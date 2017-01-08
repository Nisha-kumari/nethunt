<?php
 
require_once("connect_local.php");

 
$response = array();
    global $CON;

    
    $email=test_input($_POST["var1"]);
    $password=md5(test_input($_POST["var2"]));
    $firstname=test_input($_POST["var5"]);
    $lastname=test_input($_POST["var6"]);
    $college=test_input($_POST["var3"]);
    $country=test_input($_POST["var4"]);
    $contact=test_input($_POST["var7"]);
    
    $query_emailchk="SELECT * FROM users WHERE email='$email'";
    if($result=mysqli_query($CON,$query_emailchk)) {
        if($result->num_rows) {
          $response["success"] = 0;
                $response["description"] = "email exists.";
                   echo json_encode($response);
        }
        else {
            $query="INSERT INTO users (first,last,contact,college,country,email,password) VALUES ('$firstname', '$lastname', '$contact', '$college', '$country', '$email', '$password')";
            if ($result=mysqli_query($CON,$query)) {
                //echo "Registration SUCCESSFULL";

              $hash=md5($email.time());
                $query="SELECT id FROM users where email='$email'";
                $result=mysqli_query($CON,$query);
                $row=$result->fetch_row();
                $uid=$row[0];
                $query="INSERT INTO activation (uid,hash) VALUES ($uid, '$hash')";
                $result=mysqli_query($CON,$query);
		$response["success"] = 1;
		$msg="Registartion successful. Verification mail sent to ";

                $response["description"] = $msg.$email;
                   echo json_encode($response);
                
            }
            else {
                $response["success"] = 0;
                $response["description"] = "not created.";
                   echo json_encode($response);

            }
        }
    }
    else {
       
                $response["success"] = 0;
                $response["description"] = "not created.";
                   echo json_encode($response);

    }    


?>