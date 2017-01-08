<?php
require_once("connect_local.php");

global $CON;

if(isset($_GET['email'])) {
	$email = $_GET['email'];
    $hash = $_GET['hash'];
    
    //echo "$email $hash  hehe";
    
    $query_emailchk="SELECT a.hash FROM activation a,users u WHERE a.uid=u.id AND u.email='$email'";
    $result=mysqli_query($CON,$query_emailchk);
    if($result->num_rows==0) {
        echo "Email doesn't Exists in activation";
        die;
    }
    else {
        $row=$result->fetch_row();
        $hash_chk=$row[0];
        //echo "hash_chk: $hash ";
        
        if($hash==$hash_chk) {
            $query="UPDATE users SET active=1 WHERE email='$email'";
            $result=mysqli_query($CON,$query);
            
            setSessionVar("login_message","Your Account has been Activated. Login to join the Fun!");
            header("location: loginnew.php");
            //user_login($email);
            //header("Location: http://2015.cadnitd.co.in");
            //echo "user $email activated";
        }
    }
    
    /*
	$activation=$_GET['key'];
	 $querry5=mysql_query("select * from activated where email='$email'");
         $narrow= mysql_num_rows($querry5);
         if($narrow==0)
         {
	$querry1=mysql_query("select * from users where email='$email'");
	  while($row=mysql_fetch_array($querry1))
	  {
	  	$check=$row['email'];
	  	$contact=$row['contact'];
	  	$firstname=$row['first'];
	  	$lastname=$row['last'];
	  	
	  	}
	$emailid=md5($check); 
	$add=$check.$contact;
	$add_encrypt=md5($add); 
	$cont=$_GET['key1'];	
	if($activation==$emailid && $add_encrypt==$cont)
	{
	$querry = "UPDATE `users` SET `check-value`=1 WHERE email='$email'";
	mysql_query($querry);
	$querry2 = "select * from activated";
	$result=mysql_query($querry2);
	$reg_id=mysql_num_rows($result);
	
	$reg_id = $reg_id+1;
	$reg_id="TSX.5_".$reg_id;
	$result1=mysql_query("INSERT INTO `activated` VALUES('".mysql_real_escape_string($firstname." ".$lastname)."','".mysql_real_escape_string($email)."','".mysql_real_escape_string($reg_id)."')");
	
	
	
        header("location: http://cadnitd.co.in/REGISTRATION/tsx.5/promptnew.php?x=1&id=$reg_id");
         }
        }
          else
          {
              header("location: http://cadnitd.co.in/REGISTRATION/tsx.5/promptnew.php?x=3&");
          }
        }
        
        else
        {
           header("location: http://cadnitd.co.in/REGISTRATION/tsx.5/promptnew.php?x=2&");
        }*/
    
}
else {
    header("location: ../index.php");
}