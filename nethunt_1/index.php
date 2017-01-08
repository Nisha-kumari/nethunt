<?php
require_once("../backend/connect_local.php");
require_once("cases.php");

global $CON;

if (isset($_POST['play'])) {
    
    if (!is_user_loggedin()) {
        $_SESSION["returnto"]="../nethunt_1/";
        header('location: ../backend/loginnew.php');
    }
    
    $lvl_chk      = "SELECT level FROM nethunt WHERE uid=" . $_SESSION['uid'];
    $query_lvlchk = mysqli_query($CON, $lvl_chk);
    $rows         = mysqli_num_rows($query_lvlchk);
    if (!($rows)) {
        $uid = $_SESSION['uid'];
        date_default_timezone_set('Asia/Kolkata');
        $datetime  = date_create()->format('Y-m-d H:i:s');
        $query     = "INSERT INTO nethunt(uid,level,time) VALUES ('$uid','1','$datetime')";
        $query_chk = mysqli_query($CON, $query);
        $level = 1;
    }
    else {
        $row   = mysqli_fetch_array($query_lvlchk);
        $level = $row[0];
    }
    header("location: xbcga.php");
}

?>


    <!DOCTYPE html>
    <html>

    <head>
        <title>NetHunt</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" type="text/css" href="../css/font-awesome-4.3.0/css/font-awesome.min.css" />
        <link rel="stylesheet" type="text/css" href="../css/main.css">
        <link rel="stylesheet" type="text/css" href="../css/nethunt.css">
    </head>

    <body>
        <div id="container">
            <div id="header">
                <h1>NETHUNT</h1>
                <p><a href="https://www.facebook.com/groups/264277007009318/" target="_blank"><i class="fa fa-question-circle"></i></a> - Keep Calm and Google - <a title="Leaderboard" target="_blank" href="leaderboard.php"><i class="fa fa-trophy"></i></a></p>
            </div>
            <div id="content">
                <div class="instructions">
                    <h2>Instructions:</h2>
                    <ul>
                        <li>- All characters should be in small letters</li>
                        <li>- Numbers should be entered in alphabetical form</li>
                        <li>- There should be no space between words</li>
                        <li>- There is no time limit</li>
                    </ul>
                </div>
            </div>
            <div id="material-overlay"></div>
            <div id="footer">
                <div class="play-button">
                    <i class="fa fa-play"></i>
                </div>
            </div>
            <form id="submit_form" name="submit_form" method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
                <input type="hidden" name="play" value="START PLAYING">
            </form>
        </div>
        
        <script src="../js/nethunt/nethunt.js"></script>
    </body>

    </html>