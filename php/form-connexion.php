<h2>Formulaire Connexion</h2>
<form action="connexion.php" method="post" class="form_connexion">
    <?php if(isset($message)) : ?>
        <div class="message">
            <?= $message ?>   
        </div>
    <?php endif ?>
    <!--- Login --->
    <label for="email">Login</label>
    <input type="email" name="email" id="" placeholder="Votre Email" class="input" value="<?= isset($_POST['email']) ? htmlentities($_POST['email']) : '' ?>" required>
    <!--- Mot de Passe --->
    <label for="password">Mot de passe</label>
    <input type="password" name="password" id="" placeholder="Votre mot de passe" class="input"  value="<?= isset($_POST['password']) ? htmlentities($_POST['password']) : '' ?>" required>
    <button type="submit">Connecter</button>
</form>