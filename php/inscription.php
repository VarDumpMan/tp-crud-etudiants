<?php
session_start();
$sexe = ['Masculin','Feminin'];

if(isset($_GET['session']) && $_GET['session'] == 0) {
    unset($_SESSION['user']);
}
require 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="../assets/style.css">
    <script src="../js/script.js" defer></script>
</head>
<body>
    <?php
        require '../php/header.php';
    ?>
    <section class="inscription">
        <?php if(isset($message)) : ?>
            <div class="message">
                <?= $message ?>   
            </div>
        <?php endif ?>
        <?php if(isset($_GET['afficher']) && $_GET['afficher']==1 && isset($_SESSION['Nom'],$_SESSION['Prénom'], $_SESSION['radio'], $_SESSION['Email'], $_SESSION['Password'])) : ?>
            <div class="text">
                <p>
                    Vous avez entré comme nom : <b><?= $_SESSION['Nom']; ?></b>, prénom : <b><?= $_SESSION['Prénom']; ?></b>.
                    Vous êtes de sexe <b><?= $_SESSION['radio']; ?></b>. On peut vous joindre à l'adresse mail : <b><?= $_SESSION['Email']; ?></b>. <br>
                    Votre mot de passe est : <b><?= $_SESSION['Password']; ?></b>
                </p>
                <a href="inscription.php?form=1">Retourner au formulaire</a>
            </div>
        <?php else : ?>
            <?php require 'form-inscription.php'; ?>
        <?php endif ?>
    </section>
    <script>
        var email = document.querySelector(".email");
        var matricule = document.querySelector(".matricule");
        var pwd = document.querySelector('.pwd');
        var username = document.querySelectorAll(".username");
        console.log(pwd);
        var pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/; // il s'agit d'un regex (expression reguliere)
        /*
        format d'un regex 
        / $/ 
        */
        var correcte, correcte2;
        function Input(t, min, max) {
            t.addEventListener('input', function () {
                if(t.value != "") {
                    if(t.value.length>=min && t.value.length<=max) {
                        t.style.border = "2px solid green";
                        //correcte = true;
                    }
                    else {
                        t.style.border = "2px solid red";
                    }
                }
            });
           // return correcte;
        }
        email.addEventListener('input',()=>{
            if(email.value !="") {
                if(email.value.match(pattern)) {
                    email.style.border = "2px solid green";
                    correcte2 = true;
                }
                else {
                    email.style.border = "2px solid red";
                }
            }
        });
        Input(matricule,8,8);
        Input(pwd,3,12);
        Input(username[0],3,15);
        Input(username[1],3,15);
    </script>
</body>
</html>