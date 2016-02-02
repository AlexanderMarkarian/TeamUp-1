<?php
    session_start();
    if(!$_SESSION['auth']){
        header('Location:index.php');
    }
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Team-Up</title>
    <meta name="description" content="HTML framework description">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Styles -->
    <link rel="stylesheet" href="css/general.css">
	<!-- Google fonts -->
	<link href="http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700,300italic,400italic,500italic,700italic%7COswald:400,300,700&amp;subset=latin,latin-ext" rel="stylesheet" type="text/css">
	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.css">
    <!-- Modernizr -->
    <script type='text/javascript' src='js/libs/modernizr-2.5.3.min.js'></script>

</head>
<body>
    <header>
		<div class="top">
			<div class="container">
				<div class="col-12">
				  <div class="col-2">
					<div class="logo"><img src="images/logo.png" alt=""/></div>
				  </div>
                    <nav id="top-menu">
                        <ul class="clearfix">
                            <li class="active"><a href="home.php">Home</a></li>
                            <li><a href="roster.php">Roster</a></li>
                            <li><a href="add-drop.php">Add/Drop</a></li>
                            <li><a href="trades.php">Trades</a></li>
							<li><a href="matchup.php">Matchup</a></li>
                            <li><a href="draft.php">Draft</a></li>

                        </ul>
                        <a href="#" id="pull">Menu</a>
                    </nav>
                    <nav class="mobilemenu">
                        <select>
                            <option value="home.php">Home</option>
                            <option value="roster.php">Roster</option>
                            <option value="available.php">Add/Drop</option>
                            <option value="trades.php">Trades</option>
                            <option value="matchup.php">Club</option>
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
	<section id="bc-t">
		<div class="container">
			<h1 class="blog-title">League Name</h1>
		</div>
	</section>
    <section id="blog-single">
		<div class="container">
			<article class="blog-post">
				<div class="ftitle"><h2>Standings</h2></div>
				<div class="col-12">
					<!-- TABLE STRIPED -->
					<br><br>
					 <table class="table-striped-dflt">
						<tr class="tr-head">
							<td>Team Name</td>
							<td>Wins</td>
							<td>Ties</td>
							<td>Losses</td>
							<td>Percentage</td>
						</tr>
						<tr>
							<td class="td-head">Title of the row</td>
							<td>324</td>
							<td>324</td>
							<td>8 240</td>
							<td>324</td>
						</tr>
						<tr>
							<td class="td-head">Second row</td>
							<td>324</td>
							<td>324</td>
							<td>8 240</td>
							<td>324</td>
						</tr>
						<tr>
							<td class="td-head">Third row</td>
							<td>324</td>
							<td>324</td>
							<td>8 240</td>
							<td>324</td>
						</tr>
						<tr>
							<td class="td-head">Forth row</td>
							<td>324</td>
							<td>324</td>
							<td>8 240</td>
							<td>324</td>
						</tr>
					 </table>
				</div>
			</article>
		</div>
	</section>
	<section>
		<br><Br>
		<div class="container">
			<div class="col-12">
				<div class="a-games">
					<div class="ftitle"><h2>Matchups</h2></div>
					<ul class="clearfix">
						<li><span class="text-right">Team 1</span><span class="d-g">vs</span><span class="text-left">Team 2</span></li>
						<li><span class="text-right">Team 3</span><span class="d-g">vs</span><span class="text-left">Team 4</span></li>
						<li><span class="text-right">Team 5</span><span class="d-g">vs</span><span class="text-left">Team 6</span></li>
						<li><span class="text-right">Team 7</span><span class="d-g">vs</span><span class="text-left">Team 8</span></li>
					</ul>
				</div>
			</div>
		</div>

	</section>
	

    <!-- Libs -->
    <script src="js/libs/jquery-1.10.2.min.js"></script>
    <script src='js/libs/jquery.flexslider-min.js'></script>
	<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<script src="js/libs/jquery.bxslider.min.js"></script>
    <!-- Custom -->
    <script src="js/scripts.js"></script>
</body>
</html>
