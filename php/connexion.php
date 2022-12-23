<?php
session_start();
include 'control.php';
function dump($variable) : void {
    echo '<pre>';
        var_dump($variable);
    echo '</pre>';
}
if(isset($_GET['deconnecter']) && $_GET['deconnecter'] == 1) {
    unset($_SESSION['connexion']);
}
if($_SESSION['connexion'] == 1) {
    if(isset($datas)) {
        if(!password_verify($_POST['password'], $datas[0]['Password'])) {
            $message = "Mot de passe ou Adresse Email invalide";
            $_SESSION['bonPwd'] = 0;
        }
        else {
            $_SESSION['bonPwd'] = 1;
            $_SESSION['FirstName'] = $datas[0]['Nom'];
            $_SESSION['LastName'] =  $datas[0]['Prenom'];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="../assets/style.css">
    <script src="../js/script.js" defer></script>
</head>
<body>
    <?php
        require 'header.php';
    ?>  
     <!-- Matricule -->
     <!-- <label for="matricule">Matricule</label>
            <input type="text" placeholder="Entrer votre matricule" class="input" name="Matricule">
            -->
    <section class="connexion">
    <?php if(!isset($_SESSION['connexion'])) : ?>
        <?php require 'form-connexion.php' ?>
    <?php else : ?>
        <?php if(isset($_SESSION['bonPwd']) && !$_SESSION['bonPwd']) : ?>
            <?php require 'form-connexion.php' ?>
        <?php else : ?>
            <div class="gestionUser">
                <div class="deconnexion">
                    <a href="connexion.php?deconnecter=1">
                        Déconnexion
                    </a>
                </div>
                <p class="text">
                    Bienvenue <b><?= $_SESSION['FirstName'] ?> <?= $_SESSION['LastName'] ?></b>.
                </p>
            </div>
            <p class="text">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium tempora sunt, eos quasi nobis incidunt. Consectetur quis pariatur, provident facilis minus in adipisci assumenda. Dolor tempora numquam eum provident eius?
                Quos placeat veniam nulla, animi qui quo, odio, nobis asperiores ducimus nisi labore rem expedita nemo voluptate? Id quasi doloremque, voluptatibus iusto ea debitis asperiores eum ratione quae, eveniet accusamus?
                Quaerat tenetur veritatis dolor ea, ipsam qui voluptate consequatur tempora! Cum, ad. Ex adipisci consequuntur veritatis dicta ab sunt voluptatibus odio ad quos reprehenderit, iste velit odit, neque aut maiores.
                Officia libero tempora facilis est, recusandae suscipit minus quibusdam inventore modi cupiditate voluptatum sed, maiores, ducimus porro? Iure asperiores, eveniet aliquid alias ipsum itaque quisquam quaerat error ex possimus maiores.
                Voluptas ab porro reprehenderit ratione, magni impedit, repellat id, officiis ex aperiam itaque exercitationem cum omnis odit laboriosam adipisci pariatur facilis doloribus? Repellat eveniet, explicabo in at obcaecati tenetur cupiditate?
            </p>
        <?php endif ?>
    <?php endif ?>
    </section>
</body>
</html>