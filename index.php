<?php
echo '<!DOCTYPE html>
<html lang="lv">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link rel="stylesheet" type="text/css" href="style.css"/>
	<title>Baneroid</title>
</head>
<body>';
require 'configuracijas/configuracija.php';

$test = sha1("test");
#echo $test;
	
	if (isset($ienakt_neizdevas))
	{
		echo "Lietotāja vārds vai parole ir nepareizs";
	}
	
	if (!isset($_SESSION['ienacis']))
	{
	        echo "
                <div id='login'>
	        <form name='input' method='post'>	
	            <label>Lietotāja Vārds:</label><input type='text' name='vards' /></br />
	            <label>Parole:</label><input type='password' name='kods' /><br />	
	            <input type='submit' name='ienakt' value='Ienākt' />
	        </form>
                </div>";
	}
	else
	{
		echo $_SESSION['vards']."<br /><a href='?iziet=ja'>Iziet</a>";
	}

	#print_r($dati);
        	
echo '</body>
</html>';
?>