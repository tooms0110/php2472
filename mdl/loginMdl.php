<?php

    function checkUser($db, $user, $pass)
    {
        $stm = $db->prepare("SELECT uNom, uRole FROM Utilisateurs WHERE uLogin=:user and uPass=:pass");
        $stm->bindValue(':user', $user);
        $stm->bindValue(':pass', $pass);
        $stm->execute();

        $rst=$stm->fetch(PDO::FETCH_OBJ);
        $stm->closeCursor();
        
        return $rst;
    }

?>