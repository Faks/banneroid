<?php
#ini_set('display_errors', 'On');
#error_reporting(E_ALL);
#ini_set('display_errors', '1');

session_start();

require 'mysql_konekcija.php';

if ($_GET['iziet'] == "ja") 
{
	session_destroy();
	unset($_SESSION);
}

if ($_POST['ienakt']) 
{
	//drosibas filtrs bazisks nau nekads pasaules brinums
	$vards = $_POST['vards'];
	$vards = mysql_real_escape_string($_POST['vards']);
	$vards = htmlspecialchars($_POST['vards']);

	$kods = mysql_real_escape_string($_POST['kods']);
	$kods = htmlspecialchars($_POST['kods']);
	$kods = sha1($_POST['kods']);
	
	$panem_kodu = mysql_query("SELECT * FROM lietotaji WHERE vards = '{$_POST['vards']}' ") or die(mysql_error());
	if (mysql_num_rows($panem_kodu) != 0)
	{
		$parbauda_kodu = mysql_fetch_array($panem_kodu);
	}
	else 
	{
		$ienakt_neizdevas = true;
	}
	
	
	if ($kods == $parbauda_kodu['kods']) #te bija kluda labota jau
	{
		$dati = mysql_query("SELECT * FROM lietotaji WHERE vards= '".$vards."' AND kods = '".$kods."' limit 1 ") or die(mysql_error()); #kluda labota bija gluks

		if (mysql_num_rows($dati) == 1) 
		{
			$mani_dati = mysql_fetch_array($dati);
			$_SESSION['ienacis'] = true; //labojums bija kluda :)
			
			$_SESSION['vards'] = $mani_dati['vards'];
		}
	}
	else 
	{
		$ienakt_neizdevas = true;
	}
}
?>