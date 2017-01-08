<?php
require_once("../backend/connect_local.php");
require_once("cases.php");

global $CON;

$last_level=17;

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
    if($level<=$last_level) {
        header("location: xbcga.php");
    }    
}
else {
    header("location: index.php");
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
        </head>

        <body>
            <div id="container">
                <div id="header">
                    <h1>NETHUNT</h1>
                    <p><a href="https://www.facebook.com/groups/264277007009318/" target="_blank"><i class="fa fa-question-circle"></i></a> - Keep Calm and Google - <a title="Leaderboard" target="_blank" href="leaderboard.php"><i class="fa fa-trophy"></i></a></p>
                    <p class="error">
                        <?php echo $error ?>
                    </p>
                </div>
                <div id="content">
                    <div class="instructions">
                        <h2>CONGRATULATIONS</h2>
                        <p>You have completed the LAST LEVEL</p>
                    </div>
                </div>


                <div id="footer">
                </div>
            </div>
        </body>

        </html>