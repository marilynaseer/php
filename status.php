<?php
require 'connection.inc.php';
	$userIdFromPost = $_POST["userid"];
	$sql = "SELECT userid, GROUP_CONCAT(status SEPARATOR ',') AS statuses FROM statustable where userid = $userIdFromPost";
	$status = mysql_query($sql);
	while ($fetchStatus = mysql_fetch_assoc($status)) {
		echo $fetchStatus['statuses'];
	}
?>