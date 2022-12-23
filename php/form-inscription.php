<H2>Formulation Inscription</H2>
<form action="" method="post" class="form_inscription">
    <!-- Nom -->
    <label for="matricule">Matricule</label>
    <input type="number" placeholder="Entrer votre matricule" class="input" name="Matricule" value="<?= isset($datas) ? htmlentities($datas->Matricule) : '' ?>" required>
    <label for="matricule">Nom</label>
    <input type="text" placeholder="Entrer votre nom" class="input username" name="Nom" value="<?= isset($datas) ? htmlentities($datas->Nom) : '' ?>" required>
    <!-- Prenom -->
    <label for="matricule">Prénom</label>
    <input type="text" placeholder="Entrer votre prénom" class="input username" name="Prénom" value="<?= isset($datas) ? htmlentities($datas->Prenom) : '' ?>" required>
    <!-- Sexe -->
    <div class="radio">
        <p> Sexe </p>
        <?php foreach($sexe as $content) : ?>
            <input type="radio" name="radio" id="" value="<?= $content ?>" <?= (isset($datas) && ($datas->Sexe == $content)) ? 'checked' : '' ?> required>
            <label for="radio"><?= $content ?></label>
        <?php endforeach ?>
    </div>
    <!-- Compte -->
    <label for="matricule">Email</label>
    <input type="mail" placeholder="Entrer votre email" class="input email" name="Email" value="<?= isset($datas) ? htmlentities($datas->Email) : '' ?>" required> 
    <!-- Mot de passe -->
    <label for="matricule">Mot de passe</label>
    <input type="password" placeholder="Entrer votre <?= isset($datas) ? "nouveau" : "" ?> mot de passe" class="input pwd" name="Password" value="" required> 
    <div class="action-buttons">
        <button type="submit"><?= isset($_GET['modifier']) ? "Modifier" : "S'inscrire" ?></button>
        <button type="reset">Effacer</button>
        <button class="retour"><a href="<?= (isset($_GET['modifier'])) ? "../admin/index.php" : "../index.php" ?>">Quitter</a></button>
        <?php if(!isset($_GET['modifier'])) : ?>
            <button class="retour"><a href="inscription.php?afficher=1">Afficher</a></button>
        <?php endif ?>
    </div>
</form>