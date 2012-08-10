<?php
if($included){
    $select_bildes_skaititaju = mysql_query("SELECT * FROM bannera_sistema") or die(mysql_error());
    if (mysql_num_rows($select_bildes_skaititaju) > 0) 
    {
        while($bildes_skaititajs = mysql_fetch_array($select_bildes_skaititaju))
        {

                    echo "<img src='{$bildes_skaititajs['bannera_kods']}'><br>";
                    
                    if ($_SESSION['vards'] == $bildes_skaititajs['autors']) 
                    {
                    	echo "<a href='?sadala=dzest_banneri&id={$bildes_skaititajs['id']}&autors={$bildes_skaititajs['autors']}'>Dzest Bildi</a>";
                    }
                    else
                    {
                    	$parbauda_vai_jau_lieto_panem = mysql_query("SELECT * FROM bannera_sistema_lietotaji WHERE bannera_id = '".$bildes_skaititajs["id"]."' AND lietotajs = '".$_SESSION["vards"]."' ") or die(mysql_error());
                    	$parbauda_vai_jau_lieto = mysql_fetch_array($parbauda_vai_jau_lieto_panem);
	                    	if ($parbauda_vai_jau_lieto['lietotajs'] != $_SESSION['vards']) 
	                    	{
	                    		echo "<a href='?sadala=pievienot_lietot_banneri&id={$bildes_skaititajs['id']}&autors={$bildes_skaititajs['autors']}'>Lietot Bildi</a>";
	                    	}
	                    	else
	                    	{
	                    		echo "Jau Lietoju Bildi";
	                    	}
                    }	
                    	

                    $select_counter_bildes = mysql_query("SELECT COUNT(id) FROM bannera_sistema_lietotaji WHERE bannera_id = '".$bildes_skaititajs['id']."' ") or die(mysql_error());
                    $counter_bildes = mysql_fetch_array($select_counter_bildes);

                    echo '<br>bildi izmanto '.$counter_bildes['COUNT(id)'].' cilveki<br />';
        }
    }
    else
    {
        echo "Nav Ko izvadit";
    }
}
?>