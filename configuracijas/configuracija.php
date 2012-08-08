<?php
ini_set('display_errors', 'On');
#error_reporting(E_ALL);
#ini_set('display_errors', '1');

session_start();

require 'mysql_konekcija.php';
if(isset($_GET['iziet'])){
    if ($_GET['iziet'] == "ja") 
    {
        session_unset();
	session_destroy();
        header('Location: ./');
	unset($_SESSION);
    }
}

if(isset($_POST['reg'])){
    if(empty($_POST['vards'])||empty($_POST['parole'])||empty($_POST['parole2']))
    {
        echo 'Jāaizpilda visi lauki';
    }
    else
    {
        $vards = $_POST['vards'];
        $vards = mysql_real_escape_string($_POST['vards']);
        $vards = htmlspecialchars($_POST['vards']);
        $parole = mysql_real_escape_string($_POST['parole']);
        $parole = htmlspecialchars($_POST['parole']);
        $parole = sha1($_POST['parole']);
        $parole2 = mysql_real_escape_string($_POST['parole2']);
        $parole2 = htmlspecialchars($_POST['parole2']);
        $parole2 = sha1($_POST['parole2']);
        if($parole==$parole2){
            $varda_parbaude=mysql_query("SELECT `vards` FROM `lietotaji` WHERE `vards`='{$vards}'");
            if(mysql_num_rows($varda_parbaude) > 0)
            {
                echo 'Šis lietotāja vārds jau ir aizņemts!';
            }
            else 
            {
                $datums=date('Y-m-d H:i:s');
                mysql_query("INSERT INTO `lietotaji`(`vards`, `kods`, `pievienojas`, `limenis`)VALUES('{$vards}','{$parole}','{$datums}','lietotajs')");
                echo 'Reģistrācija veiksmīga tagad variet <a href="./">ielogoties</a> sistēmā!<br />';
            }
        }
        else
        {
            echo 'Parole nesakrīt';
        }
    }
    
}

if (isset($_POST['ienakt'])) 
{
	//drosibas filtrs bazisks nau nekads pasaules brinums
        if(empty($_POST['vards']) || empty($_POST['kods'])){
            echo 'Jāaizpilda abas ailes';
        }else{
            $vards = $_POST['vards'];
            $vards = mysql_real_escape_string($_POST['vards']);
            $vards = htmlspecialchars($_POST['vards']);

            $kods = mysql_real_escape_string($_POST['kods']);
            $kods = htmlspecialchars($_POST['kods']);
            $kods = sha1($_POST['kods']);

        
	$panem_kodu = mysql_query("SELECT * FROM lietotaji WHERE vards = '{$vards}' ") or die(mysql_error());
	if (mysql_num_rows($panem_kodu) > 0)
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
}
?>