<?php
require_once("../backend/connect_local.php");
require_once("cases.php");

global $CON;

$this_level=1;
$last_level=20;

$user_answer="";
$error="";
//$id=user_id();

if(!is_user_loggedin()) {
    header("location: ../index.php");
}


$lvl_chk      = "SELECT level FROM nethunt WHERE uid=".$_SESSION['uid'];
$query_lvlchk = mysqli_query($CON, $lvl_chk);
$rows         = mysqli_num_rows($query_lvlchk);

if($rows) {
    $row   = mysqli_fetch_array($query_lvlchk);
    $this_level=$row[0];
    if($this_level==$last_level+1) {
        header("location: last.php");
        exit;
    }
}
else {
    header("location: index.php");
}

if( isset($_POST['answer']) )
{
	if(empty($_POST['answer']))
	{
		$error = "Please enter your answer.";
	}
	else
	{
	    $user_answer = test_input($_POST['answer']);
        $query="SELECT answer FROM questions WHERE level=".$_POST['level'].";";
        $answer=mysqli_query($CON,$query);
        $row=mysqli_fetch_row($answer);
        $answer=$row[0];
        
        
	   if($user_answer==$answer)
	  {
	      date_default_timezone_set('Asia/Kolkata');
	      $datetime = date_create()->format('Y-m-d H:i:s');
	      $level=$_POST['level']+1;
	     /* echo $datetime;
	      echo "uid is ".$id."and time is  ".$datetime; */
	      $query="UPDATE nethunt SET level='$level',time='$datetime' WHERE uid=".$_SESSION['uid'];
	      $query1=mysqli_query($CON,$query);
	      //header('location: http://2015.cadnitd.co.in/nethunt/opntb.php');
           header("location: ".$_SERVER['PHP_SELF']);

	  }
	   else
	   {
	     $error = "Wrong Answer";
       }
    }
} 
  
?>
    <DOCTYPE! html>
        <html>

        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <title>NetHunt</title>
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <link rel="stylesheet" type="text/css" href="../css/font-awesome-4.3.0/css/font-awesome.min.css" />
            <link rel="stylesheet" type="text/css" href="../css/main.css">
            <link rel="stylesheet" type="text/css" href="../css/nethunt.css">

            <script src="../js/nethunt/nethunt.js"></script>

            <script>
                function validate() {
                    var form = document["answer-form"];
                    if (form["answer"].value.trim() == "") {
                        return false;
                    }
                    return true;
                }
                
                document.onmousedown = disableclick;
                function disableclick(event) {
                    if (event.button == 2) {
                        return false;
                    }
                }
            </script>
        </head>

        <body oncontextmenu="return false">
            <div id="container">
                <div id="header">
                    <h1>NETHUNT</h1>
                    <a class="logout" href="../backend/logout.php">Logout</a>
                    <p><a title="Query Forum" href="https://www.facebook.com/groups/264277007009318/" target="_blank"><i class="fa fa-question-circle"></i> Query Forum </a> - Keep Calm and Google - <a title="Leaderboard" target="_blank" href="leaderboard.php">LeaderBoard <i class="fa fa-trophy"></i> </a></p>
                    
                </div>
                <div id="content">
                    <div class="instructions">
                        <h2>Level <?php echo $this_level ?>:</h2>
                        <p>
                            <?php 
                    $query_question="SELECT question from questions WHERE level=$this_level";
                    $result_question = mysqli_query($CON, $query_question);
                    $row = mysqli_fetch_array($result_question);
                    echo $row[0];
                            ?>
                        </p>
                    </div>
                </div>


                <div id="footer">
                    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" id="nethunt_form" onsubmit="return validate()" name="answer-form" autocomplete="off">
                        <input id="answer" type="text" name="answer" placeholder="Answer?" />
                        <!--<input type="submit" value="Submit" name="submit" />-->
                        <input type="hidden" name="level" value="<?php echo $this_level ?>" />
                    </form>
                    <p class="error">
                        <?php echo $error ?>
                    </p>
                </div>
            </div>

            <script>
                document.getElementById("answer").focus();
            </script>
        </body>

        </html>