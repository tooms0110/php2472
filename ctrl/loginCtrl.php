<?php

    $action = isset($_GET['action']) ? $_GET['action'] : FALSE;

    if ($action=='in' and isset($_POST['frm_login'])) 
    {
        include('./mdl/connexion.php');   
        include('./mdl/loginMdl.php');

        $txt_user = $_POST['frm_login'];
        $txt_pass = md5($_POST['frm_pass']);
        
        $result = checkUser($cnxDB, $txt_user, $txt_pass);

        if($result==FALSE)
        {
            $login_message = '<div class="d-grid gap-1"><div class="alert alert-danger">Nom utilisateur ou mot de passe incorrect</div></div>';
            //header('Location:index?page=login&act=in');
        }else{
            $_SESSION['tokken']=rand(10000, 99999);
            $_SESSION['utilisateur']=$result->uNom;
            var_dump($_SESSION);
            header('Location: ./');
        }
    }

    if($action=='out')
    {
        session_destroy();
        header('Location: ./');
    }

    if(isset($_SESSION['tokken'])==FALSE)
    {
        include('./vues/loginV.php');   
    } 
?>