<div class="corps py-4">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-4">
            <div class="card">
                <div class="card-header bg-warning">
                    Modifier article
                </div>
                <div class="card-body">
                    <form class="row" method="POST" action="index.php?page=article&action=edit">
                        <div class="row">
                            <div class="col">
                                <input type="hidden" name="frm_aid" value="<?php echo $data_to_edit->id; ?>">
                                <label class="form-label" for="frm_code">Code</label>
                                <input type="text" class="form-control" id="frm_code" name="frm_code" placeholder="Code" value="<?php echo $data_to_edit->code; ?>">
                            </div>
                            <div class="col">
                                <label class="form-label" for="frm_cat">Catégorie</label>
                                <select class="form-select" id="frm_cat" name="frm_cat">
                                <?php 
                                    foreach ($categories as $cat){

                                        $selectOption = ($cat['nom']==$data_to_edit->famille)?'Selected="Selected"':'';
                                        echo '<option value="'.$cat['nom'].'" '.$selectOption.'>'.$cat['nom'].'</option>';
                                    }
                                ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col">
                                <label for="frm_lib" class="form-label">Désignation</label>
                                <input type="text" class="form-control" id="frm_lib" name="frm_lib" placeholder="Désignation" value="<?php echo $data_to_edit->nom; ?>" required>
                            </div>
                        </div>
                        
                        <div class="row align-items-end">
                            <div class="col">
                                <label for="frm_prix" class="form-label">Prix</label>
                                <div class="input-group">
                                <input type="number" class="form-control" aria-label="Prix le plus proche" step=50 name="frm_prix" id="frm_prix" placeholder="0.00" value="<?php echo $data_to_edit->prix; ?>">
                                <span class="input-group-text">Ar</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row py-4">
                            <div class="col">
                                <a href="index.php?page=article" class="form-control btn btn-secondary">Annuler</a>
                            </div>
                            <div class="col">
                                <button type="submit" class="form-control btn btn-warning" name="btn_edit_OK">Modifier</button>
                            </div>
                        </div>      
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>