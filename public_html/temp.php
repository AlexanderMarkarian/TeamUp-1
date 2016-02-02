<html lang="en">
<head>
    <meta charset="utf-8">
    <title>TeamUp</title>
    <meta name="description" content="HTML framework description">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="css/pure.min.css">
	<link rel="stylesheet" href="css/general.css">
	<link rel="stylesheet" type="text/css" href="css/submit.css">

	<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  	<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
  	<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<!-- Google fonts -->
	<link href="http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700,300italic,400italic,500italic,700italic%7COswald:400,300,700&amp;subset=latin,latin-ext" rel="stylesheet" type="text/css">
	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/pageLoader.css">
    <!-- Modernizr -->
    <script type='text/javascript' src='js/libs/modernizr-2.5.3.min.js'></script>

</head>
<body>
	<div id="load_screen"><div id="loading"><img id="image" src="images/other/loading2.gif"></div></div>
	<div class="slider">
		<div class="flexslider">
			<ul class="slides">
				<li>
					<img src="images/slider/baseball.jpg" alt=""/>
					<div class="caption"><div class="container">
					</div></div>
				</li>
				<li>
					<img src="images/slider/hockey.jpg" alt=""/>
					<div class="caption"><div class="container">
					</div></div>
				</li>
				<li>
					<img src="images/slider/basketball.jpg" alt=""/>
					<div class="caption"><div class="container">
					</div></div>
				</li>
				<li>
					<img src="images/slider/football.png" alt=""/>
					<div class="caption"><div class="container">
					</div></div>
				</li>
			</ul>
		</div>
	</div>
	
    <section id="m-a-n">
		<div class="container">
			<div class="left-half">
				<div class="title">Register</div>
				<form method="post" class="content pure-form pure-form-aligned">
			        <div class="pure-control-group">
			            <label>First Name</label>
			            <input class="pure-input-1-2 pure-input-rounded" type="text" name="firstname">
			        </div>
			      	<div class="pure-control-group">
			            <label>Last Name</label>
			            <input class="pure-input-1-2 pure-input-rounded" type="text" name="lastname">
			        </div>
			     	<div class="pure-control-group">
			            <label>Email Address</label>
			            <input class="pure-input-1-2 pure-input-rounded" type="text" name="email">
			        </div>
			        <div class="pure-control-group">
			            <label>Password</label>
			            <input class="pure-input-1-2 pure-input-rounded" type="password" name="password">
			        </div>
			        <div class="pure-controls">
			           <input type="submit" name="register" value="Register">
			        </div>
				</form>
			</div>
			<div class="right-half">
				<div class="title">Log In</div>
				<form method="post" class="content pure-form pure-form-aligned">
			        <div class="pure-control-group">
			            <label>Email Address</label>
			            <input class="pure-input-1-2 pure-input-rounded" type="text" name="email">
			        </div>
			        <div class="pure-control-group">
			            <label>Password</label>
			            <input class="pure-input-1-2 pure-input-rounded" type="password" name="password">
			        </div>
			    	<div class="pure-control-group">
		        		<label></label>
		        		<a href="#">Forgot Password?</a>
		        	</div>
			        <div class="pure-controls">
			            <input type="submit" name="login" value="Log In">
			        </div>
				</form>
			</div>
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

<?php
	include("include/db.php"); 
  
	if(isset($_POST['login']))  
	{  
	    $user_email = $_POST['email'];  
	    $user_password = $_POST['password'];  
	  
	    $check_user="SELECT * from users WHERE email='$user_email'AND password ='$user_password'";  
	  
		if(!$dbcon = mysql_connect($host,$username,$password)){
			die("Couldn't connect");
		}

		if(!mysql_select_db($database,$dbcon)){
			die("Couldn't open database");
		}

		$run = mysql_query($check_user, $dbcon);  
	  
	    if(mysql_num_rows($run) > 0){
	    	session_start();
	    	$_SESSION['auth']= 'true';
	        echo "<script type='text/javascript'>window.location.href = 'home.php';</script>";
	        exit();
	    }  
	    else{ 
	      echo "<script>alert('Email or password is incorrect!')</script>";
	    }  
	    mysql_close($dbcon);	
	}  

	if(isset($_POST['register'])){
		$user_firstname = $_POST['firstname'];
		$user_lastname = $_POST['lastname'];
		$user_email = $_POST['email'];
		$user_password = $_POST['password'];

		if($user_firstname == ''){
			echo "<script>alert('Please enter a first name')</script>";
			exit();
		}
		if($user_lastname == ''){
			echo "<script>alert('Please enter a last name')</script>";
			exit();
		}
		if($user_email == ''){
			echo "<script>alert('Please enter an email')</script>";
			exit();
		}
		if($user_password == ''){
			echo "<script>alert('Please enter a password')</script>";
			exit();
		}

		$insert_query = "INSERT into users (first_name, last_name, email, password) VALUES ('$user_firstname', '$user_lastname', '$user_email', '$user_password')";

		if(!$dbcon = mysql_connect($host,$username,$password)){
			die("Couldn't connect");
		}

		if(!mysql_select_db($database,$dbcon)){
			die("Couldn't open database");
		}

		if(mysql_query($insert_query, $dbcon)){
			session_start();
	    	$_SESSION['auth']= 'true';
	        echo "<script type='text/javascript'>window.location.href = 'home.php';</script>";
	        exit();
		}		

		mysql_close($dbcon);		
	}
                    "css9" => '<link rel="stylesheet" href="' . ABSOLUTH_PATH_CSS . 'profile.css">',
            "css10" => '<link rel="stylesheet" href="' . ABSOLUTH_PATH_CSS . 'profile-animation.css">',
            "css11" => '<link rel="stylesheet" type="text/css" href="' . ABSOLUTH_PATH_CSS . 'jquery.datetimepicker.css">'
?>