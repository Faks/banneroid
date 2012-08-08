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

//$test = sha1("test");
//echo $test;
	
	if (isset($ienakt_neizdevas))
	{
		echo "Lietotāja vārds vai parole ir nepareizs";
	}
	
	if (!isset($_SESSION['ienacis']))
	{
            if(isset($_GET['register']))
            {
                echo "<div id='register'>
                <form name='input' method='post'>
                    <label>Lietotāja vārds:</label><input type='text' name='vards' /></br />
                    <label>Parole:</label><input type='password' name='parole' /></br />
                    <label>Velreiz parole:</label><input type='password' name='parole2' /></br />
                    <input type='submit' name='reg' value='Reģistrēties' />
                </form>
                </div>";
            }
            else{
	        echo "
                <div id='login'>
	        <form name='input' method='post'>	
	            <label>Lietotāja Vārds:</label><input type='text' name='vards' /></br />
	            <label>Parole:</label><input type='password' name='kods' /><br />	
	            <input type='submit' name='ienakt' value='Ienākt' /><a href='?register'>Reģistrēties</a>
	        </form>
                </div>";
            }
	}
	else
	{
            echo "<div>",$_SESSION['vards'],"<br /><a href='?iziet=ja'>Iziet</a></div>";
            $pages = scandir('pages/');
            unset($pages[0],$pages[1]);
            if(isset($_GET['sadala']) && in_array("{$_GET['sadala']}.php",$pages)){
                $included = true; // taisot jaunu sadaļu vajag pārbaudīt vai iet caur indexu
                include 'pages/'.$_GET['sadala'].'.php'; 
            }
	}
        
	#print_r($dati);
        	
echo '</body>
</html>';
?>