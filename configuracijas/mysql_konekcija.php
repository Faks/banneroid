<?php
$mysql = mysql_connect('127.0.0.1','Faks','hakerx37');//mysql datubÄ�zes konekcija 
if (!$mysql)
{
	die('<center>Datubāzes Serveris nedarbojas vai ir pārlādēta</center>');
}

$database_select = mysql_select_db('banneroid');//mysql datubÄ�zes tabulu izvelas
if (!$database_select)
{
	die ('Datubāze neatrod tabulu'.mysql_error());
}	
?>