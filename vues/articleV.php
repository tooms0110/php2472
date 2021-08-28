<div class="container">
    <div class="row py-4">
        <div class="col-4">
            <!-- debut formulaire --> 
            <div class="card">
                <div class="card-header text-white bg-success">
                    Nouvel article
                </div>
                <div class="card-body">
                    <form class="row" method="POST" action="index.php?page=article&action=add">
                        <div class="row">
                            
                            <div class="col">
                                <label class="form-label" for="frm_cat">Catégorie</label>
                                <select class="form-select" id="frm_cat" name="frm_cat">
                                <?php 
                                    foreach ($categories as $cat){
                                        $selectOption = ($cat['nom']=='Autre')?'Selected':'';
                                        echo '<option value="'.$cat['nom'].'" '.$selectOption.'>'.$cat['nom'].'</option>';
                                    }
                                ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col">
                                <label for="frm_lib" class="form-label">Désignation</label>
                                <input type="text" class="form-control" id="frm_lib" name="frm_lib" placeholder="Désignation" required>
                            </div>
                        </div>
                        
                        <div class="row align-items-end">
                            <div class="col">
                                <label for="frm_prix" class="form-label">Prix</label>
                                <div class="input-group">
                                <input type="number" class="form-control" aria-label="Prix le plus proche" step=50 name="frm_prix" id="frm_prix" placeholder="0.00">
                                <span class="input-group-text">Ar</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row py-4">
                            <div class="col">
                                <input type="hidden" name="frm_id_article" id="frm_id_article" value="<?php echo $maxIdArticle; ?>">
                                <input type="text" class="form-control" id="frm_code" name="frm_code" placeholder="Code" >
                            </div>
                            <div class="col">
                                <button type="submit" class="form-control btn btn-success">Ajouter</button>
                            </div>
                        </div>      
                    </form>
                </div>
            </div>   
            <!-- fin formulaire --> 
            <?php if(isset($action_desc)) {echo $action_desc ; }?>
            <?php if(isset($action)) {echo $action['action_desc'] ; }?>
        </div>

        <div class="col-8">
            <table class="table table-striped table-bordered table-hover" id="tableArticle">
                <thead class="text-white bg-success">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Code</th>
                    <th scope="col">Nom</th>
                    <th scope="col">categories</th>
                    <th scope="col">Prix</th>
                    <th class="text-center" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($lstArticle as $art):
                    ?>
                    <tr>
                        <td><?php echo $art->id; ?></td>
                        <td><?php echo $art->code; ?></td>
                        <td><?php echo $art->nom; ?></td>
                        <td><?php echo $art->famille; ?></td>
                        <td><?php echo $art->prix; ?></td>
                        <td class="text-center">
                            <button type="button" class="btn btn-warning" id="<?php echo 'btn_edit_art'.$art->id; ?>"><i class="bi-pencil-square"></i> Modifier</button> 
                            <button type="button" class="btn btn-danger" style="display:none;" id="<?php echo 'btn_del_art'.$art->id; ?>">
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
    </div>
</div>
