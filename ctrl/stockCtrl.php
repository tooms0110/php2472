<?php

    $stock = (object)[];

    if(isset($_SESSION['tokken']) AND $_SESSION['tokken']!=FALSE)
    {
        $stockToFind ='';
        $stock_aid = '';

        if(isset($_SESSION['action_aid']))
        {
            $stock_aid = $_SESSION['action_aid'];
        }

        if(isset($_GET['frm_search']))
        {
            $stockToFind=$_GET['frm_search'];
        }

        require('./mdl/connexion.php');
        require('./mdl/articlesMdl.php');
        require('./mdl/stockMdl.php');

        //liste article
        $articles = GetAllArticle($cnxDB); 
        $articles = $articles->fetchAll(PDO::FETCH_CLASS);

        //liste article en stock
        $stock = GetStock($cnxDB, $stockToFind);
        $stock = $stock->fetchAll(PDO::FETCH_CLASS);
        
        //nettoyer session : reinitiliser message description des actions
        if(isset($_SESSION['action_desc']))
        {
            $action_desc = $_SESSION['action_desc'];
            unset($_SESSION['action_desc']);
        }
    }

    //INSERTION nouveau stock
    if(isset($_GET['action']) && $_GET['action']=='add')
    {
        $action_model = 'ajout';

        $s_aId=$_POST['frm_article'];
        $s_Date=$_POST['frm_date'];
        $s_Qte=$_POST['frm_qte'];


        // check si stock exist déjà

        $stockExist = checkStockExist($cnxDB, $s_aId);

        if($stockExist>0)
        {
            $_SESSION['action_desc'] = showActionMessage('Avertissement', 'L\'article existe déjà dans le stock');

        }else{

            $data_to_insert = array('id'=>$s_aId, 'date'=>$s_Date, 'qte'=>$s_Qte);
    
            try {
                $action = AddStock($cnxDB, $data_to_insert);
                $action_status = 'OK';
                $action_desc = 'Stock inserer avec succès';
            } catch (Exception $e) {
                $action_status = 'KO';
                $action_desc = $e->getMessage();
            }

            $_SESSION['action_aid']=$s_aId;
            $_SESSION['action_desc'] = showActionMessage($action_status, $action_desc);

        }
       // require('./mdl/stockMdl.php');
        
        header('Location:index.php?page=stock');
    }

    include('./vues/stockV.php');

?>