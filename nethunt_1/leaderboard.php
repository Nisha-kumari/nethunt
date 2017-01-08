<?php
require_once("../backend/connect_local.php");
require_once("cases.php");

global $CON;

$user_answer="";
$error="";
//$id=user_id();


if(!is_user_loggedin()) {
    header("location: ../backend/loginnew.php");
}


$lvl_chk      = "SELECT level FROM nethunt WHERE uid=".$_SESSION['uid'];
$query_lvlchk = mysqli_query($CON, $lvl_chk);
$rows         = mysqli_num_rows($query_lvlchk);

if(!$rows) {
    header("location: index.php");
}



//LEADERBOARD==============
$query_lb="SELECT u.first, u.last, n.level FROM nethunt n, users u WHERE n.uid=u.id ORDER BY n.level DESC, n.time LIMIT 10";
$lb_chk=mysqli_query($CON,$query_lb);
  
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
                        <h2>LEADERBOARD</h2>
                        <table class="leaderboard">
                            <tr>
                                <th>&#35;</th>
                                <th>Name</th>
                                <th>Level</th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>harsh modi</td>
                                <td>19</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>gaurav tiwari</td>
                                <td>19</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>mark ben</td>
                                <td>18</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>abhishek thakur</td>
                                <td>18</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>shubham verma</td>
                                <td>17</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>uttam omar</td>
                                <td>17</td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>yogendra kumar</td>
                                <td>16</td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>xavier mathew</td>
                                <td>16</td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td>priyanka rajput</td>
                                <td>15</td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td>shweta umrao</td>
                                <td>15</td>
                            </tr>
                            <?php
      /*
                                $i=1;
                                while ($row=mysqli_fetch_row($lb_chk)) {
                                    $first=$row[0];
                                    $last=$row[1];
                                    $level=$row[2];
                                    echo "<tr>";
                                    echo "<td>";
                                    echo "$i";
                                    echo "</td>";
                                    echo "<td>";
                                    echo "$first $last";
                                    echo "</td>";
                                    echo "<td>";
                                    echo "$level";
                                    echo "</td>";
                                    $i++;
                                }
                                */
                            ?>
                        </table>
                    </div>
                </div>

                <div id="footer">
                </div>
            </div>
        </body>

        </html>