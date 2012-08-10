<?php
if ((int)$_GET['id']) 
{
	$id = (int)$_GET['id'];
	$autors = $_GET['autors'];
	if (mysql_query("DELETE FROM bannera_sistema WHERE id = '".$id."' AND autors = '".$autors."' ")) 
	{
		header('Location: ./');
	}
}