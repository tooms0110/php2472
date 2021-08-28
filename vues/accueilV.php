<?php if(isset($_SESSION['tokken'])) { ?>
<div class="container">
  <div class="row py-4">
    <div class="alert alert-secondary" role="alert">
      <div class="row">
        <div class="col-4">
          <div class="input-group mb-3">
            <button class="btn btn-outline-secondary" type="button">Exercice</button>
            <select class="form-select" id="frm_exo" aria-label="Choisir l'exercice">
              <?php 
                foreach ($exercices as $exo){
                  echo '<option value="'.$exo['id'].'">'.$exo['nom'].'</option>';
                }
              ?>
            </select>
          </div>
        </div>
        <div class="col">
          <div class="input-group mb-3">
            <button class="btn btn-outline-secondary" type="button">Magasin</button>
            <select class="form-select" id="frm_mag" aria-label="Choisir le magasin">
              <?php 
                foreach ($magasins as $mag){
                  $etatSelectMag=($mag['nom']==$selectMag)?'selected="selected"':'';
                  echo '<option value="'.$mag['id'].'" '.$etatSelection.'>'.$mag['nom'].'</option>';
                }
              ?>
            </select>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>
