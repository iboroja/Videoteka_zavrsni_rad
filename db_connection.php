<?php

$server   = 'localhost';
$username = 'root';
$password = 'root';
$database = 'kolekcija';

$db = mysql_connect($server, $username, $password);

if($db)
{
	#echo 'You have successfully connected to the base';
	
	if(mysql_select_db($database, $db))
	{
		#echo '<br />DB selected';
		mysql_query("SET NAMES utf8");
	}
	else
	{
		echo '<br />an error occurred while selecting db';
	}
}
else
{
	echo 'An error occured while connecting';
}

?>