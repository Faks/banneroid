<?php
if ((int)$_GET['id']) 
{
	if ($_GET['autors']) 
	{
		$id = (int)$_GET['id'];
		$izveidoja_authors = $_GET['autors'];
		if (mysql_query("INSERT INTO bannera_sistema_lietotaji (bannera_id,lietotajs,izveidoja) VALUES ('".$id."','".$_SESSION['vards']."','".$izveidoja_authors."') ")) 
		{
			header('Location: ./');
		}
	}
	else
	{
		header('Location: ./');
	}
}
else 
{
	header('Location: ./');
}