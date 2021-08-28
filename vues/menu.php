
<nav class="py-2 bg-light border-bottom">
    <div class="container d-flex flex-wrap">
      <ul class="nav me-auto">
        <li class="nav-item"><a href="./" class="nav-link link-dark px-2" aria-current="page">Accueil</a></li>
        <?php echo showMenuOperation($isConnect, $page, $listOperation); ?>
      </ul>
      <ul class="nav">
        <?php echo showMenuConnex($isConnect); ?>
      </ul>
    </div>
  </nav>
<?php if(isset($_SESSION['tokken'])) { ?>
<header class="py-3 mb-4 border-bottom">
  <div class="container d-flex flex-wrap justify-content-center">
    <a href="index.php?page" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
      <span class="fs-4">Gestion de Stock</span>
    </a>
    <form methode="GET" action="?page=article&like=critere" class="col-12 col-lg-auto mb-3 mb-lg-0">
      <div class="input-group">
        <input type="search" class="form-control" placeholder="Recherche <?php echo str_replace('accueil', '', $page); ?>..." name="frm_search" aria-label="Search">
        <button class="btn btn-secondary" type="submit" name="page" value="<?php echo $page; ?>">Réinitialiser</button>
      </div>
    </form>
  </div>
</header>
<?php } ?>