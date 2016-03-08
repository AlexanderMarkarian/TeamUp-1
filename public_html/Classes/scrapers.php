<?php
if(!empty($_POST['teamInfo'])){   
	$teamID = $_POST['id'];
	$content = file_get_contents('https://glacial-tor-26990.herokuapp.com/teamSplits/' . $teamID);
	echo $content;
}

?>