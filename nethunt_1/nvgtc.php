<?php
require_once("../backend/connect_local.php");
require_once("cases.php");

global $CON;

$this_level=3;

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
    $level=$row[0];
    if($level!=$this_level) {
        $go = level($level);
        header($go);
    }    
}
else {
    header("location: index.php");
}
/*
$query_lb="SELECT * FROM `nethunt` ORDER BY level DESC, time";
$lb_chk=mysqli_query($CON,$query_lb);
//$num_result = mysqli_num_rows($lb_chk);
*/

if(isset($_POST['answer']))
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
	      header('location:http://2015.cadnitd.co.in/nethunt_1/mctbd.php');

	  }
	   else
	   {
	     $error = "Wrong Answer";
       }
    }
   
} 
?>




@font-face {
  font-family: "colored_crayons";
  src: url("../fonts/Colored_Crayons.ttf") format("truetype"); }

@font-face {
  font-family: "crayon_crumble";
  src: url("../fonts/crayon_crumble.ttf") format("truetype"); }

/* line 12, C:/xampp/htdocs/technoshinexv/scss/nethunt.scss */
body {
  background: url("../images/nethunt/cb5.jpg");
  height: 100vh;
  color: white;
  box-shadow: inset 0px 0px 80px black;
  font-family: 'crayon_crumble', Raleway;
  letter-spacing: 0.2em;
  overflow: hidden; }

/* line 24, C:/xampp/htdocs/technoshinexv/scss/nethunt.scss */
#container {
  height: 100%;
  position: relative; }

/* line 29, C:/xampp/htdocs/technoshinexv/scss/nethunt.scss */
#demo-canvas {
  position: absolute;
  width: 100%;
  height: 100%; }

/* line 35, C:/xampp/htdocs/technoshinexv/scss/nethunt.scss */
#header {
  font-family: colored_crayons;
  position: relative;
  text-align: center;
  height: 30%; }
  /* line 39, C:/xampp/htdocs/technoshinexv/scss/nethunt.scss */
  #header h1 {
    padding: 20px;
    font-weight: bold;
    font-size: 50pt;
    text-shadow: inset 0px 0px 5px black;
    letter-spacing: 0.4em;
    color: white; }
  /* line 47, C:/xampp/htdocs/technoshinexv/scss/nethunt.scss */
  #header p {
    padding: 10px 20px;
    display: block;
    color: springgreen;
    font-weight: bold;
    border-radius: 5px; }
    /* line 55, C:/xampp/htdocs/technoshinexv/scss/nethunt.scss */
    #header p.error {
      color: crimson; }

/* line 62, C:/xampp/htdocs/technoshinexv/scss/nethunt.scss */
#content {
  position: relative;
  height: 50%;
  text-align: center; }
  /* line 66, C:/xampp/htdocs/technoshinexv/scss/nethunt.scss */
  #content .instructions {
    height: 100%;
    background: url("../images/nethunt/green_board.jpg");
    background-size: 100% 100%;
    display: inline-block;
    padding: 30px 25px;
    width: 550px; }
    /* line 73, C:/xampp/htdocs/technoshinexv/scss/nethunt.scss */
    #content .instructions h2 {
      padding: 10px;
      color: yellow; }
    /* line 80, C:/xampp/htdocs/technoshinexv/scss/nethunt.scss */
    #content .instructions ul,
    #content .instructions p {
      text-align: left;
      list-style: none;
      font-size: 14pt; }
      /* line 84, C:/xampp/htdocs/technoshinexv/scss/nethunt.scss */
      #content .instructions ul li,
      #content .instructions p li {
        margin: 5px 0px; }

/* line 91, C:/xampp/htdocs/technoshinexv/scss/nethunt.scss */
#footer {
  position: relative;
  width: 100%;
  height: 20%;
  padding-top: 25px;
  text-align: center;
  display: table; }
  /* line 98, C:/xampp/htdocs/technoshinexv/scss/nethunt.scss */
  #footer .play-button {
    cursor: pointer;
    display: table-cell;
    vertical-align: middle;
    font-size: 40px;
    color: white;
    width: 70px;
    height: 70px;
    line-height: 75px;
    border-radius: 50%;
    background: #8BC34A;
    display: inline-block;
    padding-left: 10px;
    box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.3);
    transition: transform 0.3s; }
    /* line 113, C:/xampp/htdocs/technoshinexv/scss/nethunt.scss */
    #footer .play-button:hover {
      transform: scale(1.1); }
  /* line 118, C:/xampp/htdocs/technoshinexv/scss/nethunt.scss */
  #footer input#answer {
    font-family: crayon_crumble;
    font-size: 16pt;
    display: inline-block;
    background: transparent;
    text-align: center;
    color: white;
    padding: 10px;
    min-width: 400px;
    max-width: 100%;
    border-bottom: 2px solid crimson;
    letter-spacing: 0.2em; }

/* line 133, C:/xampp/htdocs/technoshinexv/scss/nethunt.scss */
#material-overlay {
  position: absolute;
  top: 0px;
  left: 0px;
  width: 70px;
  height: 70px;
  border-radius: 50%;
  background: transparent;
  transition: transform 0.8s ease-in-out, background 0s linear 0.8s; }
  /* line 143, C:/xampp/htdocs/technoshinexv/scss/nethunt.scss */
  #material-overlay.show {
    transition: transform 0.8s ease-in-out;
    background: #2196F3;
    transform: scale(30); }

/* line 153, C:/xampp/htdocs/technoshinexv/scss/nethunt.scss */
input:focus {
  outline: 0; }

/*# sourceMappingURL=nethunt.css.map */








  

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
        </head>

        <body>
            <div id="container">
                <canvas id="demo-canvas"></canvas>
                <div id="header">
                    <h1>NETHUNT</h1>
                    <p>- Keep Calm and Google -</p>
                    <p class="error">
                        <?php echo $error ?>
                    </p>
                </div>
                <div id="content">
                    <div class="instructions">
                        <h2>Level 3:</h2>
                        <p>Which word in the dictionary is spelled incorrectly?</p>
                    </div>
                </div>


                <div id="footer">
                    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" id="nethunt_form" onsubmit="return validate()">
                        <input id="answer" type="text" name="answer" placeholder="Answer?" />
                        <!--<input type="submit" value="Submit" name="submit" />-->
                        <input type="hidden" name="level" value="3" />
                    </form>
                </div>
            </div>

            <!--<table style='width:20%' border='1'>
            <tr>
      <th>Name</th>
      <th>Level</th>
      </tr><?php
        /*
 while ($row=mysqli_fetch_row($lb_chk))
    {  
      $uid=$row[0];
      $level=$row[1];
      $qw1="SELECT first FROM users WHERE id=$uid";
      $qw=mysqli_query($CON,$qw1);
      $row1=mysqli_fetch_array($qw);
      ?>
      <tr>
      
      <td><?php echo $row1[0] ?></td>
             <td><?php echo $level ?></td>       
                </tr>
     <?php
    }*/
    ?>
    </table>-->
            <script>
                document.getElementById("answer").focus();
            </script>
        </body>

        </html>