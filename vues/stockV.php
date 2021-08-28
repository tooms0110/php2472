<div class="container">
    <div class="row py-4">
        
        <!-- ajout article en stock -->
        <div class="col-4">
            <div class="card">
                <div class="card-header bg-info">
                    Article en stock
                </div>
                <div class="card-body">
                    <form class="row" action="index.php?page=stock&action=add" method="post">
                        <input type="hidden" class="form-control" id="frm_id" name="frm_id" />
                        <div class="row">
                            <div class="col">
                                <label for="frm_article" class="form-label">Désignation</label>
                                <select name="frm_article" id="frm_article" class="form-select">
                                    <?php 
                                        foreach ($articles as $art):
                                            $selectOption = ($stock_aid==$art->id)?'Selected':'';
                                            echo '<option value="'.$art->id.'" '.$selectOption.'>'.$art->nom.'</option>';
                                        endforeach; 
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="frm_date" class="form-label">Date</label>
                                <input class="form-control" type="date" name="frm_date" id="frm_date" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="frm_qte" class="form-label">Quantités</label>
                                <input class="form-control"  type="number" name="frm_qte" id="frm_qte">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col py-4">
                                <button type="submit" class="form-control btn btn-info">Ajouter</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <?php if(isset($action_desc)) {echo $action_desc ; }?>

        </div>
        <!-- fin article en stock -->
        <!-- Liste article en stock -->

        <div class="col-8">
        <table class="table table-striped table-bordered table-hover" id="tableStock">
                <thead class="text-white bg-info">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Date</th>
                    <th scope="col">Code</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Qté</th>
                    <th class="text-center" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($stock as $stk):
                    ?>
                    <tr>
                        <td><?php echo $stk->id; ?></td>
                        <td><?php echo $stk->date; ?></td>
                        <td><?php echo $stk->code; ?></td>
                        <td><?php echo $stk->nom; ?></td>
                        <td><?php echo $stk->qte; ?></td>
                        <td class="text-center">
                            <button type="button" class="btn btn-warning" id="<?php echo 'btn_edit_stk'.$stk->id; ?>"><i class="bi-pencil-square"></i></button> 
                            <button type="button" class="btn btn-danger" id="<?php echo 'btn_del_stk'.$stk->id; ?>">
                        <i class="bi-trash"></i>
                        </button>
                        </td>
                    </tr>
                    <?php
                        endforeach;
                    ?>
                </tbody>
            </table>
        </div>

        <!-- fin liste article en stock -->
    </div>
</div>
