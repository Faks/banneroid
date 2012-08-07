<?php
require 'configuracijas/configuracija.php';

$test = sha1("test");
#echo $test;
	
	if ($ienakt_neizdevas)
	{
		echo "vards vai kods nepareizs";
	}
	
	if (!$_SESSION['ienacis'])
	{
	        echo "
	        	<form name='input' method='post'>
	        		
	            <label>Lietotâja Vârds:</label>
	        		<input type='text' name='vards' /></br />
	            <label>Parole:</label> 
	       	  		<input type='password' name='kods' /><br />
	        		
	            <input type='submit' name='ienakt' value='ienakt' />
	        </form>";
	}
	else
	{
		echo $_SESSION['vards']."<br><a href='?iziet=ja'>Iziet</a>";
	}

	#print_r($dati);
        	

?>