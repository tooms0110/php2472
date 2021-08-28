<?php
    
    // Insertion Articles
    if(isset($action_model)=='ajout')
    {
        $queryAjoutArticle ="INSERT INTO Articles (CodeArticle, nomArticle, CategorieArticle, PrixArticle) VALUES (:aCode, :aNom, :aCat, :aPrix)";
        
        $ajout = $cnxDB->prepare($queryAjoutArticle);
        $ajout->bindParam('aCode', $aCode);
        $ajout->bindParam('aNom', $aNom);
        $ajout->bindParam('aCat', $aCat);
        $ajout->bindParam('aPrix', $aPrix);
    
        try {
            $data_ajout_art = $ajout->execute();
            $action_status='OK';
            $action_desc="Article $aCode - $anom ajouté dans la base";
        } catch (PDOException $e) {
            $action_status='KO';
            $action_desc=$e->getMessage();
        }
        
        $actions = array('action_status'=>$action_status, 'action_desc'=>$action_desc);
    }

    // Modification Articles
    if(isset($action_model)=='modifier')
    {
        
    }

    //fonction recherche article
    function GetAllArticle($connexion, $critere='')
    {
        if($critere=='')
        {
            $query = "SELECT IdArticle as id, CodeArticle as code, nomArticle as nom, CategorieArticle as famille, PrixArticle as prix FROM Articles ORDER by IdArticle";
        }else{
            $query = "SELECT IdArticle as id, CodeArticle as code, nomArticle as nom, CategorieArticle as famille, PrixArticle as prix FROM Articles Where nomArticle like '%".$critere."%' ORDER by IdArticle";
        }

        $result = $connexion->query($query);
        return $result;
    }

    function findArticleById($connexion, $id)
    {
        $query = "SELECT IdArticle as id, CodeArticle as code, nomArticle as nom, CategorieArticle as famille, PrixArticle as prix FROM Articles Where IdArticle=$id";

        $resultat=$connexion->query($query);
        
        return $resultat->fetchAll(PDO::FETCH_CLASS);
    }

    function updateArticleById($connexion, $champs=[])
    {
        $champs=(object)$champs;
        $queryUpdate = "UPDATE Articles SET CodeArticle='".$champs->code."', CategorieArticle='".$champs->famille."', nomArticle='".$champs->nom."', PrixArticle=".$champs->prix." WHERE IdArticle=$champs->id";

        try{
            $updateResult = $connexion->prepare($queryUpdate);
            $updateResult = $updateResult->execute();
            $action_status='OK';
            $action_desc="Article $champs->id modifié ";
        }catch(PDOException $e){
            $action_status='KO';
            $action_desc=$e->getMessage();
        }

        $actions = array('action_status'=>$action_status, 'action_desc'=>$action_desc);
        return $actions;
    }

    function deleteArticleById($connexion, $id)
    {
        $query = "DELETE FROM Articles Where IdArticle=$id";

        $resultat=$connexion->query($query);
        
        return $resultat->fetch(PDO::FETCH_CLASS);
    }
?>