<?php

include_once("backend/connect_local.php");

//setSessionVar("uname","Johev");

//session_unset();

$is_Firefox=false;
if (isset($_SERVER['HTTP_USER_AGENT'])) {
    $agent = $_SERVER['HTTP_USER_AGENT'];
    if (strlen(strstr($agent, 'Firefox')) > 0)
        $is_Firefox=true;
}


?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>TechnoShine X.5</title>
        <link rel="image_src" href="images/cad_logo.png">
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <meta name="description" content="TechnoShine X.5, The TechFest of Computer Application Deptartment of NIT Durgapur, organised by CAD (Centre for Application Development) Club">
        <meta name="keywords" content="technoshine x.5, technoshine , nit durgapur, techno-fest, fest, mca, cad, centre for application development">
        <meta name="author" content="Sk Johev, johev09@gmail.com">
        <!--<link rel="shortcut icon" href="favicon.png">
        <link rel="stylesheet" type="text/css" href="css/normalize.css"/>-->
        <link rel="stylesheet" type="text/css" href="css/font-awesome-4.3.0/css/font-awesome.min.css" />
        <link rel="stylesheet" type="text/css" href="css/main.css" />
        <link rel="stylesheet" type="text/css" href="css/homepage.css" />
        <link rel="stylesheet" type="text/css" href="css/altwincircle.css" />
        <!--    
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="//cdn.jsdelivr.net/velocity/1.2.2/velocity.min.js"></script>
    -->
        <script src="js/jquery-1.11.0.min.js"></script>
        <script src="js/velocity.min.js"></script>
        <script src="js/modernizr.js"></script>
        <script src="js/mob.js"></script>
        <?php
            if(!$is_Firefox)
                echo "<script src='js/jquery.smooth-scroll.js'></script>";
        ?>

            <script src="js/classie.js"></script>
            <script src="js/preloader.js"></script>
            <script src="js/winlist.js"></script>
            <script src="js/viewport.js"></script>
            <script src="js/homepage.js"></script>

            <script src="js/snap.svg-min.js"></script>
            <script src="js/elastic-sidebar.js"></script>

            <!--
<script src="https://code.createjs.com/createjs-2014.12.12.min.js"></script>
<script src="http://ricostacruz.com/jquery.transit/jquery.transit.min.js"></script>
    -->
    </head>

    <body class="noselect">
        <div id="load-bg">
            <span class="load-percent"></span>
            <div class='loader4'>
                <div>
                    <div>
                        <div>
                            <div>
                                <div>
                                    <div>
                                        <div>
                                            <div>
                                                <div>
                                                    <div></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="container">

            <nav id="menu" class="menu">
                <button class="menu__handle"><span>Menu</span>
                </button>
                <div class="menu__inner">
                    <ul>
                        <li>
                            <a href="#" data-scroll-id="header"><i class="fa fa-circle-thin"></i><span>- Home -</span></a>
                        </li>
                        <li>
                            <a href="#" data-scroll-id="about-us"><i class="fa fa-spin fa-gear"></i><span>- About -</span></a>
                        </li>
                        <li>
                            <a href="#" data-scroll-id="online-events"><i class="fa fa-wifi"></i><span>- Online Events -</span></a>
                        </li>
                        <li>
                            <a href="#" data-scroll-id="offline-events"><i class="fa fa-gamepad"></i><span>- Offline Events -</span></a>
                        </li>
                        <li>
                            <a href="#" data-scroll-id="tsx4-winners"><i class="fa fa-trophy"></i><span>- TS X.5 Winners -</span></a>
                        </li>
                        <li>
                            <a href="#" data-scroll-id="sponsors"><i class="fa fa-rocket"></i><span>- Sponsors -</span></a>
                        </li>
                        <li>
                            <a href="#" data-scroll-id="team"><i class="fa fa-users"></i><span>- Team -</span></a>
                        </li>

                    </ul>
                </div>
                <div class="morph-shape" data-morph-open="M 0 0 L 300 0 M300-10c0,0,295,164,295,410c0,232-295,410-295,410 L 0 800 L 0 0 Z" data-morph-close="M 0 0 L 300 0 M300-10C300-10,5,154,5,400c0,232,295,410,295,410 L 0 800 L 0 0 Z">
                    <svg width="100%" height="100%" viewBox="0 0 600 800" preserveAspectRatio="none">
                        <path d="M 0 0 L 300 0 M300-10c0,0,0,164,0,410c0,232,0,410,0,410 L 0 800 L 0 0 Z" />
                    </svg>
                </div>
            </nav>
            <div class="login">
                <?php
                    if(hasSessionVar("uid")) {
                        echo "<span class='name'>Hello, ".getSessionVar("name"). "<a href='backend/logout.php'>Logout</a></span>";
                    }
                    else
                        echo "<span class='name'><a href='backend/loginnew.php'>Login / Register</a></span>";
                ?>
                    <button class="lines-button" type="button" role="button" aria-label="Toggle Navigation">
                        <span class="lines"></span>
                    </button>
            </div>
            <div id="header">
                <div class="nit-logo">
                    <img src="images/nit_dgp_logo.png" />
                </div>
                <div class="cad-logo">
                    <img src="images/cad_logo.png" />
                </div>
                <h1><span class="tsver">&lt;</span>TECHN<!--<div class="atom">
            <!--
            <div class="orbit">
            <div class="path">
            <div class="electron">
            <i class="fa fa-lg fa-windows"></i>
            </div>
            </div>                      
            </div>
            <div class="orbit">
            <div class="path">
            <div class="electron">
            <i class="fa fa-lg fa-android"></i>
            </div>
            </div>                      
            </div>
            <div class="orbit">
            <div class="path">
            <div class="electron">
            <i class="fa fa-lg fa-github"></i>
            </div>
            </div>                      
            </div>
            </div>
            --><div class="o"></div>SHINE<span class="tsver">&#47;&gt;</span><br/><span class="tsver">X.5</span></h1>
                <div class="scroll-down">
                    <h4><a>ACT OUT OF YOUR AGE</a></h4>
                    <img src="images/scroll_down.png" />
                </div>
                <!--
                <div class="schedule">
                   <ol>
                       <li>NETHUNT - 28th SEPT @ 12 PM</li>
                       <li>JUSTCLICK - 28th SEPT @ 2 PM</li>
                   </ol>
                </div>-->
                <div class="notification">
                    <h4>THANK YOU ALL FOR MAKING OUR TECH-FEST A HUGE SUCCESS!!!</h4>
                    <?php
//$query_notif="SELECT content,href,color FROM notification WHERE visible=1 ORDER BY nid";
//$result_notif=mysqli_query($CON,$query_notif);

/*while ($row=mysqli_fetch_row($result_notif)) {
    $content=$row[0];
    $href=$row[1];
    $color=$row[2];
    //echo "<p><a href='$href' style='color:$color'>$content</a></p>";
}*/
                    ?>
                </div>

            </div>
            <div id="content">
                <h1 class="section-heading about ros" data-anim="letter-sapcing">
                <span class="left">AB<i class="fa fa-gear"></i>UT</span><span class="right">US</span>
            </h1>
                <section id="about-us">
                    <div>
                        <h3>TechnoShine X.5</h3>
                        <h4>&#35;ActOutOfYourAge &#35;TechFest &#35;CADept &#35;NITDurgapur</h4>
                        <p>TechnoShine X.5, The TechFest of CA Dept, NIT DGP, is a melting pot of the technically inclined students from colleges all over Eastern India. The three-day fiesta consists of events spanning every possible field, ranging from coding events to challenge the hardcore coders, to providing a platform for all to showcase their hidden talents. There are quizzes on diverse topics, and the technical events encourage the enthusiasts to apply their theoretical knowledge in the real world. With 14 events and participation from over 20 colleges all over India, Technoshine leads the light of instilling a culture of science, technology and innovation among the youth of the nation.</p>
                    </div>
                    <div class="video">
                        <!--
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/_yXcoACi0kE" frameborder="0" allowfullscreen></iframe>
                        -->
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/rNzvvSZ_hro" frameborder="0" allowfullscreen></iframe>
                    </div>
                </section>
                <h1 class="section-heading online ros" data-anim="letter-sapcing">
                <span class="left">ONL<i class="fa fa-html5"></i>NE</span><span class="right">EVENTS</span>
            </h1>
                <section id="online-events">

                    <div class="events">
                        <div class="event nh ros" data-row-span=1 data-col-span=1>
                            <div class="details">
                                <h2>NET HUNT</h2>
                                <div class="p">
                                    <p>Keep Calm and Google
                                        <br>
                                        <br>Top two on the Leaderboard will win Cash Prize
                                        <br>
                                        <br>
                                        <a href="nethunt_1/index.php">LET THE HUNT BEGIN!!!</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!--
                    -->
                        <div class="event jc ros" data-row-span=1 data-col-span=1>
                            <div class="details">
                                <h2>JUST CLICK</h2>
                                <div class="p">
                                    <p>Rules:
                                        <br>
                                        <ol>
                                            <li>Register on www.cadnitd.co.in</li>
                                            <li>You need to send the photo to <a target="_top" href="mailto:justclickts@gmail.com" style="color:crimson">justclickts@gmail.com</a> from your registered email id between 28th SEPT 2015 and 1st OCT 2015</li>
                                            <li>The Submission of more than one picture will lead to disqualification</li>
                                            <li>The Submission must be a digital photo clicked by yourself</li>
                                            <li>The Submission must be entrant's original creation and owned fully by the entrant</li>
                                            <li>The Submission must demonstrate one of the following contest themes: <span style="color:green">Open, Landscape</span></li>
                                            <li>The Submission will be uploaded on our facebook page, you have to get as much likes as possible on your picture before 2nd OCT 2015</li>

                                            <li>One has to like <a style="color:yellowgreen" href="https://www.facebook.com/technoshinex.5">Technoshine X.5 page</a> for their like to be considered</li>
                                            <li>Winners will be decided with 50% weightage from number of Likes on your photo on our FB page and 50% weightage will be on our judges decision</li>
                                        </ol>
                                        <br>
                                        <br>
                                        <p><span class="thanks">Special Thanks to<br><a target="_blank" href="http://www.retinacharmer.com/about-retina-charmer-candid-wedding-photographer-in-delhi/">Mr. Navin Kumar</a>
                                <br>for judging the previous JUST CLICK event.</span></p>
                                </div>
                            </div>
                        </div>
                        <!--
                    -->
                        <div class="event cz ros" data-row-span=1 data-col-span=2>
                            <div class="details">
                                <h2>CODE ZIP</h2>
                                <div class="p">
                                    <a style="display:inline-block;margin:20px;color:black;background:yellowgreen;padding:10px" href=" https://www.hackerrank.com/codezip-ts">ZIP THE SOURCE</a>
                                    <br>
                                    <p>Rules:</p>
                                    <br>
                                    <ol>
                                        <li>The contest will be a 3 hours coding marathon</li>
                                        <li>Participation will be individual</li>
                                        <li>There will be 3 questions of different difficulties</li>
                                        <li>The codes must be optimized</li>
                                        <li>The winner will be selected according to the leaderboard of Hackerrank</li>
                                    </ol>
                                    <br>
                                    <br> Contact: +91-9038294623 (Snehasish)
                                    <br>
                                    <br>
                                    <p>So Come and ZIP THE SOURCE</p>
                                </div>
                            </div>
                        </div>
                        <!--               
                    -->
                        <div class="event ii ros" data-row-span=1 data-col-span=2>
                            <div class="details">
                                <h2>INSPIRE INDIA</h2>
                                <div class="p">
                                    Cast an inspiring spell on us with your thoughts.
                                    <br>Send us your entries at <a href="mailto:inspireindiats@gmail.com" target="_top" style="color:crimson">inspireindiats@gmail.com</a>
                                    <br>
                                    <br>Rules:
                                    <br>
                                    <br>
                                    <ol>
                                        <li>Participants are supposed to register at www.cadnitd.co.in. Entries from unregistered participants will not be considered for evaluation</li>
                                        <li>Participants have to send their write-ups as .doc/.docx files to inspireindiats@gmail.com before 1st October 2015 11 PM</li>
                                        <li>Participants must choose any one of the following:
                                            <ol style="padding-left: 25px;font-size: 85%;list-style: lower-roman">
                                                <li>A Short Story based on theme - <span style="color: yellowgreen">"RURAL INDIAN YOUTH"</span> (Max Word Count- 400)</li>
                                                <li>An Article on <span style="color: yellowgreen">"INDIA OF MY DREAMS"</span> (Max Word Count- 500)</li>
                                                <li>A Poem based on the theme - <span style="color: yellowgreen">"FREEDOM" AFTER 6 DECADES OF INDEPENDENCE</span></li>
                                                <li>An Article on <span style="color: yellowgreen">"PROUD? TO BE AN INDIAN"</span> (Max Word Count-500)</li>
                                            </ol>

                                        </li>
                                        <li>Note: Please give appropriate titles for the poem and short story</li>
                                        <li>Each of the entries should be an original creation of the participant</li>
                                    </ol>
                                    <br>
                                    <br>
                                    <br> #WriteToInspireNotToImpress
                                </div>
                            </div>
                        </div>
                        <!--
                    -->
                        <div class="event cw ros" data-row-span=1 data-col-span=2>
                            <div class="details">
                                <h2>CODE WAR</h2>
                                <div class="p">
                                    <p>Rules:</p>
                                    <br>
                                    <ol>
                                        <li>Go to Codechef, login and register for the contest "CODEWAR"</li>
                                        <li>The contest will be a 5 hour coding marathon</li>
                                        <li>Participation will be Individual</li>
                                        <li>There will be five questions of different difficulties</li>
                                        <li>Winner will be selected according to the leaderboard</li>
                                    </ol>
                                    <br>
                                    <br>
                                    <br>
                                    <p>So join the battle and CODE YOUR WAY TO VICTORY</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <span class="back-to-events"><i class="fa fa-close"></i></span>
                </section>
                <h1 class="section-heading offline ros" data-anim="letter-sapcing">
                <span class="left">OFFL<i class="fa fa-paper-plane"></i>NE</span><span class="right">EVENTS</span>
            </h1>
                <section id="offline-events">
                    <div class="events">
                        <ul class="list">
                            <li><a>COUNTER-STRIKE</a>
                            </li>
                            <li><a>TATTOO MAKING</a>
                            </li>
                            <li><a>TRICKOLOGY</a>
                            </li>
                            <li><a>TOTAL CHAOS</a>
                            </li>
                            <li><a>PERFORMER OF THE YEAR</a>
                            </li>
                            <li><a>GADGET GURU</a>
                            </li>
                            <li><a>BRAIN MARATHON</a>
                            </li>
                            <li><a>ROBOTICS</a>
                            </li>
                            <li><a>SOCKET COMBAT</a>
                            </li>
                            <li><a>CAMPUS TREASUR HUNT</a>
                            </li>
                        </ul>
                        <div class="event-show cs">
                            <div class="info">
                                GAME FORMAT:
                                <br>
                                <br> <span class="left">Competition Method:</span> 5 vs. 5
                                <br> <span class="left">Players:</span> 10 total (5 on each team)
                                <br> <span class="left">Rounds:</span> 12 rounds for regulation play
                                <br> <span class="left">Max Rounds Format:</span>6 rounds as Offense, and 6 rounds as Defense per team until the victory condition is met.
                                <br> <span class="left">Victory Condition:</span> The first team to win 6rounds in regulation or the team that wins the overtime period.
                                <br> <span class="left">Buy time:</span> 15 seconds
                                <br> <span class="left">Start money:</span> $800 for regulation play, $10,000 for overtime periods
                                <br> <span class="left">Freeze time:</span> 5 seconds
                                <br> <span class="left">C4 Timer:</span> 35 seconds
                                <br> <span class="left">Map Pool:</span> de_dust2, de_inferno, de_nuke, de_train
                                <br>
                                <br> <span class="left">Side Selection:</span>
                                <br>
                                <ul class="tab">
                                    <li>By knife round / coin toss, at admin discretion</li>
                                    <li>At half time, teams will switch sides</li>
                                    <li>All players names must be in the format of their team tag + gaming alias (i.e. TEAM | Player)</li>
                                </ul>
                                <br> <span class="left">Setup and Configuration:</span>
                                <br>
                                <ul class="tab">
                                    <li>Non-standard game settings or third party applications that affect game play are not permitted.</li>
                                    <li>Players are restricted from opening the console</li>
                                </ul>
                                <br>
                                <span class="left">Registration:</span> All members need to register at our registration desk with ₹50
                                <br>
                            </div>
                        </div>
                        <div class="event-show tm">
                            <div class="info">
                                Come participate and bring out the artist on you.
                                <br>
                                <br> RULES:
                                <br>
                                <br>
                                <ol>
                                    <li>We will provide you with water colors and paint brushes(2 max for every participant).
                                        <br>But if you wish to bring your own brushes, glitter or other accessories feel free to do so. Sky is the limit.</li>
                                    <li>The CATEGORIES are:
                                        <br>
                                        <ul class="tab">
                                            <li>Nature</li>
                                            <li>Cartoons or Anime</li>
                                            <li>Tribal</li>
                                            <li>Geometric</li>
                                        </ul>
                                    </li>
                                    <li>Participant will have to bring a willing accomplice upon whom they will paint</li>
                                    <li>They will have to explain their creation to the judges so their tattoo should be meaningful and should belong to any one of the categories mentioned above.</li>
                                    <li>Time: 1hour</li>
                                </ol>

                            </div>
                        </div>
                        <div class="event-show t">
                            <div class="info">
                                <ol>
                                    RULES:
                                    <br>
                                    <br>
                                    <li>It is a team event, each team has 2 members</li>
                                    <li>It will consist of 3 rounds ,round 1 is paper based ,selected team from round 1 goes to round 2 which is app based &amp; shortlisted team will face the third round which is purely based on coding</li>
                                    <li>Round 1 &amp; 2 will be of 30 minutes each &amp; consist of multiple choice question</li>
                                    <li>Round 3 is the coding round which is of 2 hours.</li>
                                    <li>For round 3 participants should have to bring their own laptops.</li>
                                </ol>
                                <br> For more information:
                                <br>
                                <br> Contact : +91-8759947674 (Umesh)
                                <br> Email: umesh.bitu6@yahoo.in
                                <br>
                            </div>
                        </div>
                        <div class="event-show tc">
                            <div class="info">
                                Who let The Chaos out?
                                <br>
                                <br> RULES:
                                <br>
                                <br>
                                <ol>
                                    <li>There will be team of two members.</li>
                                    <li>Whole event completed in two round</li>
                                    <li>1st round is App based… there will be 30 question based on (Programming, GK , Logical Reasoning ,Computer tricky questions).</li>
                                    <li>Time limit 30 minutes.</li>
                                    <li>Second round is surprise</li>
                                </ol>
                                <br> Winner get prize.
                                <br>
                            </div>
                        </div>
                        <div class="event-show poy">
                            <div class="info">
                                RULES:
                                <br>
                                <br>
                                <ol>
                                    <li>Performances should not exceed 4 minutes</li>
                                    <li>Only individual performances allowed</li>
                                    <li>Performances can include acting, singing, dancing, musical instrument, poetry-recital or stand-up comedy.</li>
                                    <li>Selected performers from the first round will compete against others in a second round.</li>
                                    <li>Performers are to bring their sound tracks, songs, props and other such requisites themseleves.</li>
                                </ol>
                            </div>
                        </div>
                        <div class="event-show gg">
                            <div class="info">

                                This events for specially for who loves the gadget’s. The whole event based on latest Gadget‘s.
                                <br>
                                <br> RULES:
                                <br>
                                <br>
                                <ol>
                                    <li>There will be team of two members.</li>
                                    <li>Whole event completed in two round.</li>
                                    <li>The first round is Paper based, there will be 20 question based on latest gadgets.</li>
                                    <li>Time limit for first round: 20 minutes</li>
                                    <li>Second round is App based, consisting of 20 questions</li>
                                    <li>Time limit for second round: 20 minutes</li>
                                </ol>
                                <br>Winners get prize money
                                <br>
                            </div>
                        </div>
                        <div class="event-show bm">
                            <div class="info">
                                Talent hits a target no one else can hit. Genius hits a target no one else can see. So guys time to shake your brains up!!! Get the best out of yourself. As The Quiz always floats slightly above the ground!!! And only you can do it. Here you go.
                                <br>
                                <br>RULES:
                                <br>
                                <br>
                                <ol>
                                    <li>The questions for quiz are based on general knowledge, current affairs</li>
                                    <li>There will be only 1 round, which is paper based.</li>
                                    <li>30 questions of 3 marks each. There will be no negative marking.</li>
                                    <li>Two members in each team.</li>
                                    <li>There will be strict prohibition on any source like internet for help</li>
                                </ol>
                            </div>
                        </div>
                        <div class="event-show r">
                            <div class="info">
                                PROBLEM STATEMENT: To design and implement a ground vehicle (rover) using a micro-controller, equipped with sensors that can traverse a room which has some severe obstacles. The room is GSM and GPS challenged hence the rover solely depends on offline data and an on-spot decision system. Hence it is suitable that it logs the surrounding co-ordinates of the present obstacle and a scope to generate a 3-D Map of the room after the data are fed in proper simulators.
                                <br>
                                <br> ROBOT SPECIFICATIONS:
                                <br> There will be no restriction to the length, width or height of the robot vehicle as long as the vehicle fits within the area bounded. The vehicle must be fully self-contained and not receive assistance from external sources and all parts of the vehicle must travel to the target. The judge may, however, allow participants to retrieve and restart their vehicles in the event of a collision or other situations when a restart is required. The vehicle must not attempt to change or damage its environment.
                                <br>
                                <br> COURSE:
                                <br> The course will be outdoors with both natural and manmade terrain and obstacles. The terrain may include pavement, dirt, small rocks, grass, gullies, trees, curbs and weeds. All robots must travel on the surface of the domain. Robot vehicles are required to travel within the specified domain and no part of the vehicle must come in direct contact with regions outside the domain. Overhanging within the boundary is allowed.
                                <br>
                                <br> GENERAL RULES:
                                <br>
                                <ol>
                                    <li>Winner is declared based on point rating and not on its time score.</li>
                                    <li>Winner is declared by the competition chair, based on the rating of the judges.</li>
                                    <li>Teams should respect security rules, and be “fair play”.</li>
                                    <li>During the competitions, only the team leader is authorized to present the robot.</li>
                                    <li>During the competitions, only the team leader is authorized to contact committee members for any claim or specific need.</li>
                                    <li>No servicing or repairs of any kind are allowed during the time allocation to each entry. Should the need arise to replace exhausted battery supplies, permission must be sought from the judges to perform this function. The decision to allow this is left at the discretion of the judges.</li>
                                </ol>
                            </div>
                        </div>
                        <div class="event-show sc">
                            <div class="info">
                                PRE-REQUISITES:
                                <br>
                                <br> SMTP, FTP, Stop and Wait, ICMP, Iterfacing Mic and Webcam
                            </div>
                        </div>
                        <div class="event-show th">
                            <div class="info">
                               RULES:<br><br>
                                <ol>
                                    <li>Every Team consists of maximum 3 members , minimum 2 members</li>
                                    <li>Registration fees per team is ₹100/-</li>
                                    <li>Interested participants must reach D.M Sen Auditorium at 2:30 p.m. on 3rd October.</li>
                                    <li>The treasure hunt will be held within campus.</li>
                                    <li>The objective of the hunt will be to reach the final check point as fast as possible after fulfilling certain interesting tasks all over the campus.</li>
                                    <li>The winner shall be decided on who reaches the final destination first</li>
                                </ol>

                            </div>
                        </div>
                        <canvas id="mycanvas"></canvas>
                    </div>
                </section>
                <h1 class="section-heading winners ros" data-anim="letter-sapcing">
             <span class="left">TS X.5</span><span class="right">W<i class="fa fa-trophy"></i>NNERS</span>
            </h1>
                <section id="tsx4-winners">
                    <div class="collage">
                        <div class="winners" id="online">
                            <ul>
                                <li class="wincircle" id="cz">
                                    <div class="flipper">
                                        <div class="front">
                                        </div>
                                        <div class="back">
                                            <h5>Code Zip</h5>
                                        </div>
                                    </div>
                                </li>
                                <li class="wincircle" id="cw">
                                    <div class="flipper">
                                        <div class="front">
                                        </div>
                                        <div class="back">
                                            <h5>Code War</h5>
                                        </div>
                                    </div>
                                </li>
                                <li class="wincircle" id="jc">
                                    <div class="flipper">
                                        <div class="front">
                                        </div>
                                        <div class="back">
                                            <h5>Just Click</h5>
                                        </div>
                                    </div>
                                </li>
                                <li class="wincircle" id="nh">
                                    <div class="flipper">
                                        <div class="front">
                                        </div>
                                        <div class="back">
                                            <h5>Net Hunt</h5>
                                        </div>
                                    </div>
                                </li>
                                <li class="wincircle" id="ii">
                                    <div class="flipper">
                                        <div class="front">
                                        </div>
                                        <div class="back">
                                            <h5>Inspire India</h5>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <h2>ONLINE EVENTS</h2>
                        </div>
                        <h3 style="display:none">ALL WINNERS WILL BE UPDATED ON<br> 5th OCTOBER 2015</h3>
                        <div class="winners" id="offline">
                            <h2>OFFLINE EVENTS</h2>
                            <ul>
                                <li class="wincircle" id="gg">
                                    <div class="flipper">
                                        <div class="front">
                                        </div>
                                        <div class="back">
                                            <h5>Gadget Guru</h5>
                                        </div>
                                    </div>
                                </li>
                                <li class="wincircle" id="tc">
                                    <div class="flipper">
                                        <div class="front">
                                        </div>
                                        <div class="back">
                                            <h5>Total Chaos</h5>
                                        </div>
                                    </div>
                                </li>
                                <li class="wincircle" id="trick">
                                    <div class="flipper">
                                        <div class="front">
                                        </div>
                                        <div class="back">
                                            <h5>Trickology</h5>
                                        </div>
                                    </div>
                                </li>
                                <li class="wincircle" id="tm">
                                    <div class="flipper">
                                        <div class="front">
                                        </div>
                                        <div class="back">
                                            <h5>Tatoo Making</h5>
                                        </div>
                                    </div>
                                </li>
                                <li class="wincircle" id="bm">
                                    <div class="flipper">
                                        <div class="front">
                                        </div>
                                        <div class="back">
                                            <h5>Brain Marathon</h5>
                                        </div>
                                    </div>
                                </li>
                                <li class="wincircle" id="cs">
                                    <div class="flipper">
                                        <div class="front">
                                        </div>
                                        <div class="back">
                                            <h5>Counter-Strike</h5>
                                        </div>
                                    </div>
                                </li>
                                <li class="wincircle" id="poy">
                                    <div class="flipper">
                                        <div class="front">
                                        </div>
                                        <div class="back">
                                            <h5>Performer of the Year</h5>
                                        </div>
                                    </div>
                                </li>
                                <li class="wincircle" id="sc">
                                    <div class="flipper">
                                        <div class="front">
                                        </div>
                                        <div class="back">
                                            <h5>Socket Combat</h5>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div id="container2">
                        <div id="winlist">
                            <h1>TECHNOSHINE X.5<br/><span>WINNERS</span></h1>
                            <div>
                                <ul>
                                    <li id="one">
                                        <div class="prize">
                                            <img src="images/1st.png" />
                                        </div>
                                        <div class="name">
                                            <b>Yet to be Announced</b>
                                        </div>
                                    </li>
                                    <li id="two">
                                        <div class="prize">
                                            <img src="images/2nd.png" />
                                        </div>
                                        <div class="name">
                                            <b>Yet to be Announced</b>
                                        </div>
                                    </li>
                                    <li id="three">
                                        <div class="prize">
                                            <img src="images/3rd.png" />
                                        </div>
                                        <div class="name">
                                            <b>Yet to be Announced</b>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>
                <h1 class="section-heading sponsorship ros" data-anim="letter-sapcing">
             <span class="left">OUR</span><span class="right">SP<i class="fa fa-rocket"></i>NSORS</span>
            </h1>
                <section id="sponsors">
                    <div class="sponsor" id="vatika"></div>
                    <a target="_blank" href="https://www.facebook.com/studioeindia">
                        <div class="sponsor" id="studioe"></div>
                    </a>
                    <a target="_blank" href="http://www.mageba.in/">
                        <div class="sponsor" id="mageba"></div>
                    </a>
                    <a target="_blank" href="http://www.macintelgroup.com/">
                        <div class="sponsor" id="macintel"></div>
                    </a>
                    <a target="_blank" href="http://ananyasrestaurant.com/">
                        <div class="sponsor" id="ananyas"></div>
                    </a>
                    <a target="_blank" href="https://www.codechef.com/">
                        <div class="sponsor" id="codechef"></div>
                    </a>
                    <a target="_blank" href="http://www.hackerrank.com/">
                        <div class="sponsor" id="hackerrank"></div>
                    </a>
                </section>
                <h1 class="section-heading team ros" data-anim="letter-sapcing">
                 <span class="left">THE</span><span class="right">TE<i class="fa fa-users"></i>M</span>
            </h1>
                <section id="team">
                    <div class="team-content">
                        <div class="member">
                            <div class="dp">
                                <img src="images/team/sumit.jpg">
                            </div>
                            <div class="details">
                                <span class="member-name">Sumit Agrawal</span>
                                <span class="designation">President</span>
                            </div>
                        </div>
                        <div class="member">
                            <div class="dp">
                                <img src="images/team/abhishek.jpg">
                            </div>
                            <div class="details">
                                <span class="member-name">Abhishek Tripathi</span>
                                <span class="designation">Vice-President</span>
                            </div>
                        </div>
                        <div class="member">
                            <div class="dp">
                                <img src="images/team/rahul.jpg">
                            </div>
                            <div class="details">
                                <span class="member-name">Rahul Gupta</span>
                                <span class="designation">Vice-President</span>
                            </div>
                        </div>
                        <div class="member">
                            <div class="dp">
                                <img src="images/team/prithvi.jpg">
                            </div>
                            <div class="details">
                                <span class="member-name">Prithviraj Pramanik</span>
                                <span class="designation">General Secretary</span>
                            </div>
                        </div>
                        <br>
                        <div class="member">
                            <div class="dp">
                                <img src="images/team/swati.jpg">
                            </div>
                            <div class="details">
                                <span class="member-name">Swati Singh</span>
                                <span class="designation">Treasurer</span>
                            </div>
                        </div>
                        <div class="member">
                            <div class="dp">
                                <img src="images/team/abhijeet.jpg">
                            </div>
                            <div class="details">
                                <span class="member-name">Abhijeet Gupta</span>
                                <span class="designation">Treasurer</span>
                            </div>
                        </div>
                        <div class="member">
                            <div class="dp">
                                <img src="images/team/anand.jpg">
                            </div>
                            <div class="details">
                                <span class="member-name">Anand Chowdhury</span>
                                <span class="designation">Open-Source App Head</span>
                            </div>
                        </div>
                        <div class="member">
                            <div class="dp">
                                <img src="images/team/soumya.jpg">
                            </div>
                            <div class="details">
                                <span class="member-name">Soumya Singh</span>
                                <span class="designation">Fest Coordinator</span>
                            </div>
                        </div>
                        <div class="member">
                            <div class="dp">
                                <img src="images/team/aditi.jpg">
                            </div>
                            <div class="details">
                                <span class="member-name">Aditi Phadnis</span>
                                <span class="designation">Sponsorship Head</span>
                            </div>
                        </div>
                        <div class="member">
                            <div class="dp">
                                <img src="images/team/mukund.jpg">
                            </div>
                            <div class="details">
                                <span class="member-name">Mukund Jha</span>
                                <span class="designation">Sponsorship Head</span>
                            </div>
                        </div>
                        <div class="member">
                            <div class="dp">
                                <img src="images/team/srikant.jpg">
                            </div>
                            <div class="details">
                                <span class="member-name">Shrikant Kumar</span>
                                <span class="designation">Software Cell Head</span>
                            </div>
                        </div>
                        <div class="member">
                            <div class="dp">
                                <img src="images/team/vikas.jpg">
                            </div>
                            <div class="details">
                                <span class="member-name">Vikas Kumar</span>
                                <span class="designation">Techtalk</span>
                            </div>
                        </div>
                        <div class="member">
                            <div class="dp">
                                <img src="images/team/puja.jpg">
                            </div>
                            <div class="details">
                                <span class="member-name">Puja Bharti</span>
                                <span class="designation">Resource Manager</span>
                            </div>
                        </div>
                        <div class="member">
                            <div class="dp">
                                <img src="images/team/rajnish.jpg">
                            </div>
                            <div class="details">
                                <span class="member-name">Rajnish Kr Jha</span>
                                <span class="designation">Group Coordinator</span>
                            </div>
                        </div>
                        <div class="member">
                            <div class="dp">
                                <img src="images/team/vidyu.jpg">
                            </div>
                            <div class="details">
                                <span class="member-name">Vidyu Rani</span>
                                <span class="designation">Group Coordinator</span>
                            </div>
                        </div>
                        <div class="member">
                            <div class="dp">
                                <img src="images/team/shivam.jpg">
                            </div>
                            <div class="details">
                                <span class="member-name">Shivam Sharma</span>
                                <span class="designation">Online Activity Head</span>
                            </div>
                        </div>
                        <div class="member">
                            <div class="dp">
                                <img src="images/team/amandeep.jpg">
                            </div>
                            <div class="details">
                                <span class="member-name">Amandeep Singh</span>
                                <span class="designation">Creative Head</span>
                            </div>
                        </div>
                        <div class="member">
                            <div class="dp">
                                <img src="images/team/anisha.jpg">
                            </div>
                            <div class="details">
                                <span class="member-name">Anisha Tulika</span>
                                <span class="designation">Designing Head</span>
                            </div>
                        </div>
                        <div class="member">
                            <div class="dp">
                                <img src="images/team/ankit.jpg">
                            </div>
                            <div class="details">
                                <span class="member-name">Ankit Singh Rajput</span>
                                <span class="designation">Designing Team</span>
                            </div>
                        </div>
                        <div class="member">
                            <div class="dp">
                                <img src="images/team/sandeep.jpg">
                            </div>
                            <div class="details">
                                <span class="member-name">Sandeep Vani</span>
                                <span class="designation">Designing Team</span>
                            </div>
                        </div>
                        <div class="member">
                            <div class="dp">
                                <img src="images/team/oindrila.jpg">
                            </div>
                            <div class="details">
                                <span class="member-name">Oindrila Saha</span>
                                <span class="designation">Designing Team</span>
                            </div>
                        </div>

                        <div class="member">
                            <div class="dp">
                                <img src="images/team/snehasish.jpg">
                            </div>
                            <div class="details">
                                <span class="member-name">Snehasish Dasgupta</span>
                                <span class="designation">Data-Structures Team</span>
                            </div>
                        </div>
                        <div class="member">
                            <div class="dp">
                                <img src="images/team/souradeep.jpg">
                            </div>
                            <div class="details">
                                <span class="member-name">Souradeep Saha</span>
                                <span class="designation">Data-Structures Team</span>
                            </div>
                        </div>
                        <div class="member">
                            <div class="dp">
                                <img src="images/team/subham.jpg">
                            </div>
                            <div class="details">
                                <span class="member-name">Subham Majavdiya</span>
                                <span class="designation">Application Team</span>
                            </div>
                        </div>
                        <div class="member">
                            <div class="dp">
                                <img src="images/team/abhishek_agarwal.jpg">
                            </div>
                            <div class="details">
                                <span class="member-name">Abhishek Agarwal</span>
                                <span class="designation">Application Team</span>
                            </div>
                        </div>
                        <div class="member">
                            <div class="dp">
                                <img src="images/team/umesh.jpg">
                            </div>
                            <div class="details">
                                <span class="member-name">Umesh Kumar</span>
                                <span class="designation">Application Team</span>
                            </div>
                        </div>
                        <div class="member">
                            <div class="dp">
                                <img src="images/team/saurabh_mishra.jpg">
                            </div>
                            <div class="details">
                                <span class="member-name">Saurabh Mishra</span>
                                <span class="designation">Networking Team</span>
                            </div>
                        </div>
                        <div class="member">
                            <div class="dp">
                                <img src="images/team/shristi.jpg">
                            </div>
                            <div class="details">
                                <span class="member-name">Shristi Parmanandka</span>
                                <span class="designation">Android Team</span>
                            </div>
                        </div>
                        <div class="member">
                            <div class="dp">
                                <img src="images/team/johev.jpg">
                            </div>
                            <div class="details">
                                <span class="member-name">Sk Jhohev</span>
                                <span class="designation">Web Designing Team</span>
                            </div>
                        </div>
                        <div class="member">
                            <div class="dp">
                                <img src="images/team/nisha.jpg">
                            </div>
                            <div class="details">
                                <span class="member-name">Nisha Kumari</span>
                                <span class="designation">Web Development Team</span>
                            </div>
                        </div>
                        <div class="member">
                            <div class="dp">
                                <img src="images/team/manisha.jpg">
                            </div>
                            <div class="details">
                                <span class="member-name">Manisha Chaudhary</span>
                                <span class="designation">Web Development Team</span>
                            </div>
                        </div>
                        <div class="member">
                            <div class="dp">
                                <img src="images/team/mahesh.jpg">
                            </div>
                            <div class="details">
                                <span class="member-name">Mahesh Yadav</span>
                                <span class="designation">Management Team</span>
                            </div>
                        </div>
                        <div class="member">
                            <div class="dp">
                                <img src="images/team/tiwari.jpg">
                            </div>
                            <div class="details">
                                <span class="member-name">Sourabh Tiwari</span>
                                <span class="designation">Management Team</span>
                            </div>
                        </div>
                        <div class="member">
                            <div class="dp">
                                <img src="images/team/arpit.jpg">
                            </div>
                            <div class="details">
                                <span class="member-name">Arpit Mishra</span>
                                <span class="designation">Management Team</span>
                            </div>
                        </div>
                        <div class="member">
                            <div class="dp">
                                <img src="images/team/bappa.jpg">
                            </div>
                            <div class="details">
                                <span class="member-name">Bappaditya Samanta</span>
                                <span class="designation">Management Team</span>
                            </div>
                        </div>
                        <div class="member">
                            <div class="dp">
                                <img src="images/team/mayank.jpg">
                            </div>
                            <div class="details">
                                <span class="member-name">Mayank Verma</span>
                                <span class="designation">Management Team</span>
                            </div>
                        </div>
                        <div class="member">
                            <div class="dp">
                                <img src="images/team/sonam.jpg">
                            </div>
                            <div class="details">
                                <span class="member-name">Sonam Agrawal</span>
                                <span class="designation">Management Team</span>
                            </div>
                        </div>
                        <div class="member">
                            <div class="dp">
                                <img src="images/team/tanushree.jpg">
                            </div>
                            <div class="details">
                                <span class="member-name">Tanushree Chakravarty</span>
                                <span class="designation">Management Team</span>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div id="footer">
                <div class="base">
                    <div class="contact">
                        <a href="mailto:technoshine.ca@gmail.com"><i class="fa fa-envelope"></i>&nbsp;&nbsp;technoshine.ca@gmail.com</a>
                    </div>
                    <div class="share">

                        <div class="facebook">
                            <a target="_blank" href="https://www.facebook.com/technoshinex.5">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </div>
                        <div class="youtube">
                            <i class="fa fa-youtube"></i>
                        </div>
                        <div class="twitter">
                            <a target="_blank" href="https://twitter.com/technoshineX5">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </div>

                    </div>
                    <div class="developed">
                        compiled by <a href="http://www.facebook.com/johev09" target="_blank">Sk Jhohev</a> @ CAD Team
                    </div>
                </div>
            </div>
        </div>
        <!--
        <div id="popup">
          <div class="popup-wrapper">
           <div class="popup-close">
               <button type="button"><i class="fa fa-times"></i></button>
           </div>
            <div class="popup-content">
                <img src="images/workshop/workshop2.jpg">
            </div>
            </div>
        </div>
        -->
    </body>

    </html>