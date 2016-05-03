<?php
/* Functions.php created for the functions
 * 
 * 
 */
 require_once('config.php');

 class DClass 
{
	protected $conn; 
	function __construct() {
       //print "In BaseClass constructor\n";
       try 
		{
			$this->conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
			// set the PDO error mode to exception
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		}
		catch(PDOException $e)
		{
			echo "Error: " . $e->getMessage();
		}
   }
   function getUserTeams($uid)
	{
		$sth = $this->conn->prepare("SELECT * FROM `user_team` WHERE user_id=".$uid);
		$sth->execute();

		/* Fetch all of the remaining rows in the result set */
		//print("Fetch all of the remaining rows in the result set:\n");
		//print_r($sth->fetchAll());
		return $sth->fetchAll();
		
	}    
	function getLeagueUsers($teamId,$userId)
	{
		$sth = $this->conn->prepare("SELECT * FROM `users` WHERE id IN (SELECT DISTINCT user_id FROM `user_team` WHERE user_id!=".$userId." AND league_id IN ( SELECT league_id  FROM `user_team` WHERE user_id=".$userId." ))");
		$sth->execute();

		return $sth->fetchAll();
	}
	function sendTradeRequest($uID,$tuID,$ttID,$tID)
	{
		$stmt = $this->conn->prepare("INSERT INTO usertrades (sendinguserid, receivinguserid,team1id,team2id) VALUES (:uid, :tuid, :tid, :ttid)");
		$stmt -> bindParam(':uid', $uID);
		$stmt -> bindParam(':tuid', $tuID);
		$stmt -> bindParam(':tid', $tID);
		$stmt -> bindParam(':ttid',$ttID);
		$stmt -> execute();
		return true;
	}
	function getTradeRequests($uID)
	{
		$sth = $this->conn->prepare("SELECT ut.*,u.name,u.email,t1.team_id AS team_1, t2.team_id AS team_2 FROM `usertrades` as ut LEFT JOIN `users` AS u  ON ut.sendinguserid=u.id  LEFT JOIN `user_team` AS t1  ON ut.team1id=t1.id LEFT JOIN `user_team` AS t2  ON ut.team2id=t2.id WHERE status=0 AND  receivinguserid=".$uID);
		$sth->execute();

		return $sth->fetchAll();
	}
	function approveTrade($tid)
	{
		$sth = $this->conn->prepare("SELECT * FROM `usertrades`  WHERE status=0 AND  id=".$tid);
		$sth->execute();
		if($trade=$sth->fetch())
		{
			$stmt = $this->conn->prepare("UPDATE `user_team` SET `user_id`= :uid WHERE id=:tid");
			$stmt -> bindParam(':uid', $trade['sendinguserid']);
			$stmt -> bindParam(':tid', $trade['team2id']);
			$stmt -> execute();
			$stmt = $this->conn->prepare("UPDATE `user_team` SET `user_id`= :uid WHERE id=:tid");
			$stmt -> bindParam(':uid', $trade['receivinguserid']);
			$stmt -> bindParam(':tid', $trade['team1id']);
			$stmt -> execute();
			$stmt = $this->conn->prepare("UPDATE `usertrades` SET `status`=1 WHERE id= :tid");

			$stmt -> bindParam(':tid', $tid);
			$stmt -> execute();
		}

		return true;
	}
}

$conn = null;
?>
