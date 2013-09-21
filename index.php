<?php 
require 'core.inc.php';
require 'connection.inc.php';

if(loggedin())
{   
	$currentUser=$_SESSION['user_id'];
 	$sqlQuery = mysql_query("SELECT * FROM usertable WHERE id = $currentUser") or die(mysql_error());  
    $data = mysql_fetch_array($sqlQuery);  
    $userid = $data['id'];
    
	$sqlCount = mysql_query("SELECT * FROM usertable");
 	$count = mysql_num_rows($sqlCount);
    
    $tempuserid = $userid;	
    echo 'Welcome!<br/><br/>';
    echo '<a  href="logout.php"><input type="button"  value="Logout"/></a> <br/>';
    
    if($tempuserid < $count)
    {
   		for($i=1;$i < $count;$i++)
   		{
   			$localUserId = ++$tempuserid;
   			if($localUserId > $count)
   			{
   				$localUserId = 1;
   			}
   			
   		$sqlUsername = mysql_query("SELECT username FROM usertable WHERE id = $localUserId");
   		$row = mysql_fetch_assoc($sqlUsername);
   		$fetchRow = $row["username"];
   		echo $fetchRow;
   		echo '<form method="post" action="status.php"> <input type="hidden" name="userid" value ="'.$localUserId.'"> <input type="submit" value="Add Friend"/> </form>'; 
      	}
   	}
   	
  	else if($tempuserid == $count)
   	{
   		for($i=$count-1;$i > 0;$i--)
   		{
   			$localUserId = $i;
   			$sqlUsername = mysql_query("SELECT username FROM usertable WHERE id = $localUserId");
   			$row = mysql_fetch_assoc($sqlUsername);
   			$fetchRow = $row["username"];
   			echo $fetchRow;
   			echo '<form method="post" action="status.php"> <input type="hidden" name="userid" value ="'.$localUserId.'"> <input type="submit" value="Add Friend"/> </form>';
   		}
   	}
    include 'allstatuses.php';
}

else
	
{
	include 'login.inc.php';
}
?>
