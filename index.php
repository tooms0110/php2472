<?php
    session_start();

    ini_set("display_errors", 1);
    date_default_timezone_set('UTC');

    //Definition de la page par defaut
    $page = isset($_GET['page'])? $_GET['page']: 'accueil';
    $isConnect = isset($_SESSION['tokken'])? TRUE : FALSE ;
    
    //liste des opérations existant
    require_once('./mdl/donneesMdl.php');
    require_once('./libs/fonctions.php');

    include_once('./vues/header.php');
    include_once('./vues/menu.php');

    //test existance session et redirection page 
    if(isset($_SESSION['tokken'])==FALSE)
    {
        $page = 'login';
    }

    require('./ctrl/'.$page.'Ctrl.php');
    
    include_once('./vues/footer.php');
?>