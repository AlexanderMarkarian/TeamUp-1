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
                            <li><a href="home.php">Home</a></li>
                            <li><a href="roster.php">Roster</a></li>
                            <li><a href="add-drop.php">Add/Drop</a></li> 
                            <li><a href="trades.php">Trades</a></li>
 							<li class="active"><a href="matchup.php">Matchup</a></li>
                            <li><a href="draft.php">Draft</a></li>
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
	<section id="bc-t">
		<div class="container">
		<ul class="breadcrumb">
			<li><a href="#">Homepage</a></li><li><span class="sep">   →   </span></li><li><a href="#">Matchup</a></li>
		</ul>
		
		<h1 class="blog-title">Matchup</h1>
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