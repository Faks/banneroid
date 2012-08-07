<?php
require 'configuracijas/configuracija.php';

if ($_SESSION['ienacis'])
{
	echo $_SESSION['vards'];
}
else 
{
	echo "Ludzu ienac sistema";
        echo "<form name='input' action='configuracijas/configuracija.php' method='post'>
            Lietotājvārds: <input type='text' name='vards' /></br />
            Parole: <input type='password' name='kods' /><br />
            <input type='submit' name='ienakt' value='Ienākt' />
        </form>";
}	

?>