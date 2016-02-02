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

	<link rel="stylesheet" type="text/css" href="css/dragdrop.css">
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
                            <li class="active"><a href="roster.php">Roster</a></li>
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
			<h1 class="blog-title">Roster</h1>
		</div>
	</section>
    <section id="club">
		<div class="container">
			<!-- POST -->
			<article class="teamd">
				<div class="col-6">
					<div class="tpp"><img src="http://placehold.it/470x269" alt=""/></div>
				</div>
				<div class="col-6">
					<div class="tpi">
						<h2>Alexander</h2>
						<p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of repeat</p>
					</div>
				</div>
			</article>
			<div class="team-pl grid clearfix" id="grid">
				<div class="col-2">
					<div class="grid__item"><img src="images/nba/mavericks.jpg" alt=""/></div>
					<div class="player-name"><a href="#">Dallas Mavericks</a><p>NBA</p></div>
				</div>
				<div class="col-2">
					<div class="grid__item"><img src="images/nba/cavaliers.jpg" alt=""/></div>
					<div class="player-name"><a href="#">Cleveland Cavaliers</a><p>NBA</p></div>
				</div>
				<div class="col-2">
					<div class="grid__item"><img src="images/nfl/cowboys.jpg" alt=""/></div>
					<div class="player-name"><a href="#">Dallas Cowboys</a><p>NFL</p></div>
				</div>
				<div class="col-2">
					<div class="grid__item"><img src="images/nfl/cardinals.jpg" alt="" /></div>
					<div class="player-name"><a href="#">Arizona Cardinals</a><p>NFL</p></div>
				</div>
				<div class="col-2">
					<div class="grid__item"><img src="images/mlb/braves.jpg" alt=""/></div>
					<div class="player-name"><a href="#">Atlanta Braves</a><p>MLB</p></div>
				</div>
				<div class="col-2">
					<div class="grid__item"><img src="images/nhl/kings.jpg" alt=""/></div>
					<div class="player-name"><a href="#">LA Kings</a><p>NHL</p></div>
				</div>
			</div>
		</div>
	</section>
	<section>
		<div class="container">
			<div class="team-pl">
				<div class="ftitle"><h2>Bench</h2></div>
				<div class="col-2">
					<img src="images/nba/clippers.jpg" alt=""/>
					<div class="player-name"><a href="#">LA Clippers</a><p>NBA</p></div>
				</div>
				<div class="col-2">
					<img src="images/nba/kings.jpg" alt=""/>
					<div class="player-name"><a href="#">Sacramenta Kings</a><p>NBA</p></div>
				</div>
				<div class="col-2">
					<img src="images/nfl/eagles.jpg" alt=""/>
					<div class="player-name"><a href="#">Philadelphia Eagles</a><p>NFL</p></div>
				</div>
				<div class="col-2">
					<img src="images/nfl/saints.jpg" alt=""/>
					<div class="player-name"><a href="#">New Orleans Saints</a><p>NFL</p></div>
				</div>
				<div class="col-2">
					<img src="images/nhl/flyers.jpg" alt=""/>
					<div class="player-name"><a href="#">Philadelphia Flyers</a><p>NHL</p></div>
				</div>
				<div class="col-2">
					<img src="images/mlb/yankees.jpg" alt=""/>
					<div class="player-name"><a href="#">New York Yankees</a><p>MLB</p></div>
				</div>
			</div>
		</div>
	</section>	

	<div id="drop-area" class="drop-area">
		<div>
			<div class="col-2 drop-area__item">
				<img src="images/nba/mavericks.jpg" alt=""/>
			</div>
			<div class="col-2 drop-area__item">
				<img src="images/nba/lakers.jpg" alt=""/>
			</div>
			<div class="col-2 drop-area__item">
				<img src="images/nba/knicks.jpg" alt=""/>
			</div>
			<div class="col-2 drop-area__item" id="trash">
				<img src="images/other/trash.png" alt=""/>
			</div>
		</div>
	</div>
	<div class="drop-overlay"></div>
    
    <!-- Scripts -->
    <script src="js/libs/jquery-1.10.2.min.js"></script>
    <script src='js/libs/jquery.flexslider-min.js'></script>
	<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<script src="js/libs/jquery.bxslider.min.js"></script>
	<script src="js/pageLoader.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/libs/draggability.pkgd.min.js"></script>
    <script src="js/libs/dragdrop.js"></script>

    <script>
		(function() {
			var body = document.body,
				dropArea = document.getElementById( 'drop-area' ),
				droppableArr = [], dropAreaTimeout;

			// initialize droppables
			[].slice.call( document.querySelectorAll( '#drop-area .drop-area__item' )).forEach( function( el ) {
				droppableArr.push( new Droppable( el, {
					onDrop : function( instance, draggableEl ) {
						// show checkmark inside the droppabe element
						console.log(this);
						classie.add( instance.el, 'drop-feedback' );
						clearTimeout( instance.checkmarkTimeout );
						instance.checkmarkTimeout = setTimeout( function() { 
							classie.remove( instance.el, 'drop-feedback' );
						}, 800 );
						// ...
					}
				} ) );
			} );

			// initialize draggable(s)
			[].slice.call(document.querySelectorAll( '#grid .grid__item' )).forEach( function( el ) {
				new Draggable( el, droppableArr, {
					draggabilly : { containment: document.body },
					onStart : function() {
						// add class 'drag-active' to body
						classie.add( body, 'drag-active' );
						// clear timeout: dropAreaTimeout (toggle drop area)
						clearTimeout( dropAreaTimeout );
						// show dropArea
						classie.add( dropArea, 'show' );
					},
					onEnd : function( wasDropped ) {
						var afterDropFn = function() {
							// hide dropArea
							classie.remove( dropArea, 'show' );
							// remove class 'drag-active' from body
							classie.remove( body, 'drag-active' );
						};

						if( !wasDropped ) {
							afterDropFn();
						}
						else {
							// after some time hide drop area and remove class 'drag-active' from body
							clearTimeout( dropAreaTimeout );
							dropAreaTimeout = setTimeout( afterDropFn, 400 );
						}
					}
				} );
			} );
		})();
	</script>

</body>
</html>

