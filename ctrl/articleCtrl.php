<?php 

    $lstArticle = (object)[];

    if(isset($_SESSION['tokken']) AND $_SESSION['tokken']!=FALSE)
    {
        $articleToFind ='';
        if(isset($_GET['frm_search']))
        {
            $articleToFind=$_GET['frm_search'];
        }

        include('./mdl/connexion.php');
        require('./mdl/articlesMdl.php');

        //liste article
        $artGetAll=GetAllArticle($cnxDB,$articleToFind);
        $lstArticle = $artGetAll->fetchAll(PDO::FETCH_CLASS);
        
        //nettoyer session : reinitiliser message description des actions
        if(isset($_SESSION['action_desc']))
        {
            $action_desc = $_SESSION['action_desc'];
            unset($_SESSION['action_desc']);
        }
    }

    $maxIdArticle = findMaxId($cnxDB, 'Articles', 'IdArticle');

    //INSERTION nouvel article
    if(isset($_GET['action']) && $_GET['action']=='add')
    {
        //comparaison code article
        $action_model = 'ajout';

        $aCode=$_POST['frm_code'];
        $aNom=$_POST['frm_lib'];
        $aCat=$_POST['frm_cat'];
        $aPrix=$_POST['frm_prix'];

        require('./mdl/articlesMdl.php');

        $_SESSION['action_desc'] = showActionMessage($action_status, $action_desc);
        
        header('Location:index.php?page=article');
    }
    //MODIFICATION article
    if((isset($_POST['action']) && $_POST['action']=='edit') || (isset($_GET['action']) && $_GET['action']=='edit'))
    {
        if(isset($_POST['id']) && $_POST['action']=='edit')
        {
            unset($_SESSION['data_to_edit']);
            $id = $_POST['id'];
            $_SESSION['data_to_edit']=findArticleById($cnxDB, $id);
        }
        
        $data_to_edit = $_SESSION['data_to_edit'][0];

        if(isset($_POST['btn_edit_OK']))
        {
            $data_to_update = array('id'=>$data_to_edit->id, 'code'=>$_POST['frm_code'], 'famille'=>$_POST['frm_cat'], 'nom'=>$_POST['frm_lib'], 'prix'=>$_POST['frm_prix']);
            $actions=updateArticleById($cnxDB, $data_to_update);
            $_SESSION['action_desc'] = showActionMessage($actions['action_status'], $actions['action_desc']);
            header('Location:index.php?page=article');
        }

        include('./vues/articleEditV.php');
        exit;
    }


    //SUPPRESSION article
    if(isset($_GET['action']) && $_GET['action']=='delete')
    {
        echo 'Delete : '.$_POST['id'];
        $_SESSION['action_desc']=showActionMessage('OK', 'Verification action suppr');
    }

    include('./vues/articleV.php');
?>