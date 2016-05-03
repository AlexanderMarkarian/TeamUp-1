<?php
/* user1.php created for the user1
 * 
 * 
 */
 require_once('functions.php');
 $dClass = new DClass();
 if(isset($_REQUEST['approve'])&&$_REQUEST['approve']!='')
 {
	 $dClass-> approveTrade($_REQUEST['approve']);
	 echo "your trade has been done sucessfully";
 }
 if($teams=$dClass-> getUserTeams(1))
 {
	 foreach($teams as $team)
	 {
		?>
		<div>
			<span> Team <?php echo $team['team_id'];?></span><a href="trade.php?teamid=<?php echo $team['id']; ?>&user_id=1"> Trade</a>
		</div>
		<?php
	 }
 }
 if($trades=$dClass-> getTradeRequests(1))
 {
	 ?><h2>Trade Requests</h2><?php
	 foreach($trades as $trade)
	 {
		?>
		<div>
			You received a Trade Request For Your Team <?php echo $trade['team_2']; ?> From <?php echo $trade['name']; ?> For their Team <?php echo $trade['team_1']; ?> Click <a href="?approve=<?php echo $trade['id']; ?>">here</a> to Approve.
		</div>
		<?php
	 }
 }
?>
