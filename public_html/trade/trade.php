<?php
/* user1.php created for the trade
 * 
 * 
 */
 require_once('functions.php');
 $dClass = new DClass();
 if(isset($_REQUEST['teamid'])&&$_REQUEST['teamid']!=''&&isset($_REQUEST['user_id'])&&$_REQUEST['user_id']!='')
 {
	 if(isset($_REQUEST['t_teamid'])&&$_REQUEST['t_teamid']!=''&&isset($_REQUEST['t_user_id'])&&$_REQUEST['t_user_id']!='')
	 {
		 if($dClass->sendTradeRequest($_REQUEST['user_id'],$_REQUEST['t_user_id'],$_REQUEST['t_teamid'],$_REQUEST['teamid']))
		 {
			 echo "Trade Request Sent Successfully!!";
		 }
     }		 
	 else if(isset($_REQUEST['t_user_id'])&&$_REQUEST['t_user_id']!='')
	 {
		 if($teams=$dClass-> getUserTeams($_REQUEST['t_user_id']))
		 {
			 foreach($teams as $team)
			 {
				?>
				<div>
					<span> Team <?php echo $team['team_id'];?></span><a href="trade.php?teamid=<?php echo $_REQUEST['teamid']; ?>&user_id=<?php echo $_REQUEST['user_id']; ?>&t_user_id=<?php echo $_REQUEST['t_user_id']; ?>&t_teamid=<?php echo $team['id']; ?>"> Trade</a>
				</div>
				<?php
			 }
		 }
	 }
	 else
	 {
		  if($users=$dClass-> getLeagueUsers($_REQUEST['teamid'],$_REQUEST['user_id']))
		 {
			 foreach($users as $user)
			 {
				?>
				<div>
					<a href="trade.php?teamid=<?php echo $_REQUEST['teamid']; ?>&user_id=<?php echo $_REQUEST['user_id']; ?>&t_user_id=<?php echo $user['id']; ?>"> <?php echo $user['name'];?></a>
				</div>
				<?php
			 }
		 }
	 }
	
 }

?>
