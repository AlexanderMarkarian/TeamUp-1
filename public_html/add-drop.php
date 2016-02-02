<?php
    session_start();
    if(!$_SESSION['auth']){
        header('Location:index.php');
    }

	include("include/db.php");
	$nba = "SELECT * from pool WHERE sport='NBA'"; 
	$nfl = "SELECT * from pool WHERE sport='NFL'"; 
	$mlb = "SELECT * from pool WHERE sport='MLB'"; 
	$nhl = "SELECT * from pool WHERE sport='NHL'";  
	if(!$dbcon = mysql_connect($host,$username,$password)){
		die("Couldn't connect");
	}
	if(!mysql_select_db($database,$dbcon)){
		die("Couldn't open database");
	}
	$nba_run = mysql_query($nba, $dbcon); 
	$nfl_run = mysql_query($nfl, $dbcon);
	$mlb_run = mysql_query($mlb, $dbcon);
	$nhl_run = mysql_query($nhl, $dbcon);
	mysql_close($dbcon);
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Team-Up</title>
    <meta name="description" content="HTML framework description">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/general.css">
	<link href="http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700,300italic,400italic,500italic,700italic%7COswald:400,300,700&amp;subset=latin,latin-ext" rel="stylesheet" type="text/css">

	<link rel="stylesheet" href="css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/pageLoader.css">

    <script type='text/javascript' src='js/libs/modernizr-2.5.3.min.js'></script>

</head>
<body>
	<div id="load_screen"><div id="loading"><img id="image" src="images/other/loading2.gif"></div></div>
    <header>
		<div class="top">
			<div class="container">
				<div class="col-12">
				  <div class="col-2">
					<div class="logo"><img src="images/logo.png" alt=""/></div>
				  </div>
                    <nav id="top-menu">
                        <ul class="clearfix">
                            <li><a href="home.php">Home</a></li>
                            <li><a href="roster.php">Roster</a></li>
                            <li class="active"><a href="add-drop.php">Add/Drop</a></li>
                            <li><a href="trades.php">Trades</a></li>
							<li><a href="matchup.php">Matchup</a></li>
                            <li><a href="draft.php">draft</a></li>

                        </ul>
                        <a href="#" id="pull">Menu</a>
                    </nav>
                    <nav class="mobilemenu">
                        <select>
                            <option value="home.php">Home</option>
                            <option value="roster.php">Roster</option>
                            <option value="add-drop.php">Add/Drop</option>
                            <option value="trades.php">Trades</option>
                            <option value="matchup.php">Matchup</option>
                            <option value="draft.php">Draft</option>
                        </select>
                    </nav>
					<div class="login">
						<a href="profile.php"><span id="icon-user"><i class="fa fa-user"></i>Profile</span></a><a href="logout.php"><span>Log Out</span></a>
					</div>
				</div>
			</div>
		</div>
    </header>
	<!-- Breadcrumb and title -->
	<section id="bc-t">
		<div class="container">
			<h1 class="blog-title">Add/Drop</h1>
		</div>
	</section>
    <section id="club">
		<div class="container">
			<!-- POST -->
			<article class="club-post">
				<div class="club-content">
					<div id="tab" class="tabs">
						<ul class="clearfix">
				            <li><a href="#section-1" >NBA</a></li>
				            <li><a href="#section-2" >NFL</a></li>
				            <li><a href="#section-3" >MLB</a></li>
				            <li><a href="#section-4" >NHL</a></li>
						</ul>
			
			
						<div id="section-1" class="tab-content ">
							<?php
								if($nba_run) {
							      while($row = mysql_fetch_array($nba_run)) {
							      	echo '<div class="col-4 margin-10">';
							      	echo '<div class="col-3">';
							      	echo '<img src="'.$row[3].'" alt="" class="resize"/>';
							      	echo '</div>';
							      	echo '<div class="col-9 dir-n">';
							      	echo '<a href="#">'.$row[1].'</a>';
							      	echo '</div></div>';
							      }
							    }
							?>
						</div>
						<div id="section-2" class="tab-content ">
							<?php
								if($nfl_run) {
							      while($row = mysql_fetch_array($nfl_run)) {
							      	echo '<div class="col-4 margin-10">';
							      	echo '<div class="col-3">';
							      	echo '<img src="'.$row[3].'" alt="" class="resize"/>';
							      	echo '</div>';
							      	echo '<div class="col-9 dir-n">';
							      	echo '<a href="#">'.$row[1].'</a>';
							      	echo '</div></div>';
							      }
							    }
							?>
						</div>
						<div id="section-3" class="tab-content ">
							<?php
								if($mlb_run) {
							      while($row = mysql_fetch_array($mlb_run)) {
							      	echo '<div class="col-4 margin-10">';
							      	echo '<div class="col-3">';
							      	echo '<img src="'.$row[3].'" alt="" class="resize"/>';
							      	echo '</div>';
							      	echo '<div class="col-9 dir-n">';
							      	echo '<a href="#">'.$row[1].'</a>';
							      	echo '</div></div>';
							      }
							    }
							?>
						</div>
						<div id="section-4" class="tab-content ">
							<?php
								if($nhl_run) {
							      while($row = mysql_fetch_array($nhl_run)) {
							      	echo '<div class="col-4 margin-10">';
							      	echo '<div class="col-3">';
							      	echo '<img src="'.$row[3].'" alt="" class="resize"/>';
							      	echo '</div>';
							      	echo '<div class="col-9 dir-n">';
							      	echo '<a href="#">'.$row[1].'</a>';
							      	echo '</div></div>';
							      }
							    }
							?>
						</div>
					</div>
				
				
				</div>
			</article>
			
		</div>
	</section>

    <!-- Libs -->
    <script src="js/libs/jquery-1.10.2.min.js"></script>
    <script src='js/libs/jquery.flexslider-min.js'></script>
	<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<script src="js/libs/jquery.bxslider.min.js"></script>
	<script src="js/pageLoader.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html>