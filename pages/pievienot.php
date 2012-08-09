<?php
    echo " <form enctype='multipart/form-data' method='post'>
  <p>
  <label>Banera Kods</label>
  </p>
  <p>
    <textarea name='banerakods' cols='50' rows='5'></textarea>
  </p>
  <input type='submit' name='ins' value='Ievietot' /><br />
  or<br />
  <label for='file'>Filename:</label><input type='file' name='file' id='file' /><br />
  <input type='submit' name='upload' value='Augšuplādēt' />
  
</form>";
    $ext=array('jpg','png','gif');
    
if(isset($_POST['ins']) && isset($_POST['banerakods'])){
    $banneris = $_POST['banerakods'];
    $banneris = mysql_real_escape_string($_POST['banerakods']);
    $banneris = htmlspecialchars($_POST['banerakods']);
    $links = parse_url($banneris);
    if(isset($links['path'])){
        $formats = preg_split('/[.]/', $links['path'], null, PREG_SPLIT_DELIM_CAPTURE|PREG_SPLIT_NO_EMPTY);
        //print_r($formats);
        if(in_array($formats[1], $ext)){
            $bilde = getimagesize($banneris);  
            //print_r($bilde);
            echo 'Veiksmīgi pievienots!<br />';
            echo 'Platums:',$bilde['0'],'<br />Augstums:',$bilde['1'],'<br />Formāts:',$bilde['mime'],'<br />';
            echo '<img src="',$banneris,'" alt="image"/><br />';
            mysql_query("INSERT INTO `bannera_sistema`(`bannera_kods`,`autors`,`tips`)VALUES('{$banneris}','{$_SESSION['vards']}','1')");
        }else{
            echo 'Links nesatur bildes elementu';
        }
    }else{
        echo 'Links nesatur bildes elementu';
    }
}
if(isset($_POST['upload']) && isset($_POST['file'])){
    echo 'Pašlaik vēl nedarbojās!';
}
?>
