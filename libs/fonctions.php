<?php
// FUNCTION MENU

    function showMenuConnex($isTrue, $element='li')
    {
        switch ($isTrue) {
            case TRUE:
                $el_class = 'btn-outline-warning';
                $act = array('out', 'Se deconnecter');
                break;
            default:
                $el_class = 'btn-outline-secondary';
                $act = array('in', 'Se connecter');
                break;
        }
        $eld = '<'.$element.' class="btn '.$el_class.'">';
        $elf = '</'.$element.'>';
        $menuCnx = $eld.'<a class="dropdown-item" href="?page=login&action='.$act[0].'">'.$act[1].'</a>'.$elf;
        return $menuCnx;
    }

    function showMenuOperation($isTrue, $page, $ops=array())
    {
        //$page = isset($_GET['page'])?$_GET['page']:'';
        // echo '<script>alert(\'page en cours : '.$page.'\');</script>';
        $menuOp = '';
        if($isTrue)
        {
            foreach($ops as $op)
            {
                $actif = ($op['nom']==$page) ? 'active': '';
                $menuOp = $menuOp.'<li class="nav-item"><a class="nav-link link-dark px-2 '.$actif.'" href="index.php?page='.$op['nom'].'">'.ucfirst($op['nom']).'</a></li>';
            }
        }
        return $menuOp;
    }


    function showActionMessage($status='OK', $description='Bref description')
    {
        
        switch ($status) {
            case 'KO':
            case 'echec':
            case 'erreur':
                $status = 'danger';
                break;
            case 'Success':
            case 'OK':
                $status = 'success';
                break;
            case 'Warning':
            case 'Avertissemetn':
                $status = 'warning';
                break;
            default:
                $status = 'info';
                break;
        }

        $action_msg= '<div class="alert alert-'.$status.' py-4" role="alert">';
        $action_msg.='<p>'.$description.'</p>';
        $action_msg.='</div>';
        return $action_msg;
    }

    //Trouver l'ID max
    function findMaxId($cnxDB, $table, $column_cible)
    {
        $queryMaxValue = "SELECT IFNULL(max($column_cible),0) as maxVal FROM $table";
        $res = $cnxDB->query($queryMaxValue);
        $maxValue=$res->fetch();
        return $maxValue['maxVal'];
    }
?>