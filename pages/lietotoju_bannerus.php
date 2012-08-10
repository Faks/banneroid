<?php
$bannerus_kurus_lietoju_panem = mysql_query("SELECT * FROM bannera_sistema_lietotaji WHERE lietotajs = '{$_SESSION['vards']}' ") or die(mysql_error());
if (mysql_num_rows($bannerus_kurus_lietoju_panem) > 0) 
{
	while($bannerus_kurus_lietoju = mysql_fetch_array($bannerus_kurus_lietoju_panem))
	{
		$salizina_banerus_panem = mysql_query("SELECT * FROM bannera_sistema WHERE id = '{$bannerus_kurus_lietoju['bannera_id']}' ") or die(mysql_error());
		while($salizina_banerus = mysql_fetch_array($salizina_banerus_panem))
		{
			if ($salizina_banerus['id'] == $bannerus_kurus_lietoju['bannera_id'])
			{
				echo "<img src='{$salizina_banerus['bannera_kods']}'> <br> <a href='?sadala=nelietot_banneri&id={$bannerus_kurus_lietoju['bannera_id']}'>Nelietot Banneri</a>";
			}	
		}
	}
}
else
{
	echo "Nelietoju Nevienu Banneri";
}