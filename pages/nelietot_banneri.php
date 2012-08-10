<?php
if ((int)$_GET['id']) 
{
	$id = (int)$_GET['id'];
	if (mysql_query("DELETE FROM bannera_sistema_lietotaji WHERE bannera_id = '".$id."' AND lietotajs = '".$_SESSION['vards']."' ")) 
	{
		header('Location: ./');
	}
}
else
{
	echo "id missinmgs";
}