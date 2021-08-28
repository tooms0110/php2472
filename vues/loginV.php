<div class="corps py-4">
    <main class="form-signin">
        <form style="text-align:center;" method="POST" action="index.php?page=login&action=in">
            <img class="mb-4 center" src="./media/img/2472.svg" alt="" style="border-radius:32px; width:64px; height:64px;">
            <h1 class="h3 mb-3 fw-normal">Identification</h1>

            <div class="form-floating">
            <input type="text" class="form-control" id="frm_login" name="frm_login" placeholder="name@example.com">
            <label for="frm_login" required>Utilisateur</label>
            </div>
            <div class="form-floating">
            <input type="password" class="form-control" id="frm_pass" name="frm_pass" placeholder="Password">
            
            <?php if(isset($login_message)) {echo $login_message ; }?>
            <label for="frm_pass">Mot de passe</label>
            </div>

            <div class="checkbox mb-3">
            <label>
                Mot de passe oublier ?
            </label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Se connecté</button>
            <p class="mt-5 mb-3 text-muted">© 2472/20 - 2021</p>
        </form>
    </main>
</div>