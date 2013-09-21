<?php
if(isset($_POST["submit"])) {
	mysql_connect ("localhost", "root", "marilyn") or die ('Error: ' . mysql_error());
	mysql_select_db("task") or die ('Data error:' . mysql_error());
	$text = $_POST['comments'];
	$query="INSERT INTO statustable(userid,status) values('$userid','$text')";
	mysql_query($query) or die ('Error updating database' . mysql_error());
	
}
?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <textarea name="comments">What's on Your Mind? </textarea>
    <input name="submit" type="submit" value="submit" />
</form>