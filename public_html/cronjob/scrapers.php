
<?php 

	$output = file_get_contents("https://teamup-node.herokuapp.com/nba");

    echo json_decode($output);
?>