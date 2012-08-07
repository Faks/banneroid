<?php
require 'configuracijas/configuracija.php';

if ($_SESSION['ienacis'])
{
	echo $_SESSION['vards'];
}
else 
{
	echo "Ludzu ienac sistema";
}	

?>