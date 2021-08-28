<?php

$conf_db = (object)[];
$conf_db->host = 'localhost';
$conf_db->db = 'projetphp';
$conf_db->user = 'Tj2472';
$conf_db->pass = 'Prj4PHP$';

try{
    $cnxDB = new PDO('mysql:host='.$conf_db->host.';dbname='.$conf_db->db, $conf_db->user, $conf_db->pass);
    unset($conf_db);
}catch(PDOException $e){
    echo $e->getMessage();
}

?>