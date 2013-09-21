<?php
$dbc = mysql_connect('localhost','root','marilyn') or  die("Cant connect :" . mysql_error());
 
mysql_select_db("task",$dbc)
 
or
die("Cant connect :" . mysql_error()); 
 
?>

