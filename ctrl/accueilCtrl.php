<?php
    //error_reporting(E_ALL);

    $colSize = count($listOperation);
    switch ($colSize) {
        case $colSize>4:
            $colSize = 'col-4';
            break;
        default:
            $colSize = 'col';
            break;
    }
    
    include('./vues/accueilV.php');
    

?>