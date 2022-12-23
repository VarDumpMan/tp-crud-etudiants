<?php
$url = $_SERVER["SCRIPT_FILENAME"];
if($url == "D:/Informatique/xampp/htdocs/TP Rabelais/admin/index.php")
{
    $index = "../index.php";
    $inscription = "../php/inscription.php";
    $connexion = "../php/connexion.php";
    $admin = "";
    $class="class='fs-1'";
}
elseif($url == "D:/Informatique/xampp/htdocs/TP Rabelais/php/inscription.php" || $url=="D:/Informatique/xampp/htdocs/TP Rabelais/php/connexion.php")
{
    $index = "../index.php";
    $inscription = "./inscription.php";
    $connexion = "./connexion.php";
    $admin = "../admin/";
}
else {
    $index = "./index.php";
    $inscription = "./php/inscription.php";
    $connexion = "./php/connexion.php";
    $admin = "./admin/";
}
?>
<header>
    <div>
        <h2 <?= isset($class) ? $class : "" ?>>Bienvenue Au Cours De Programmation Web</h2>
        <span></span>
    </div>
    <nav>
        <ul>
            <li><a href="<?= $index; ?>">Accueil</a></li>
            <li><a href="<?= $inscription; ?>">Inscription</a></li>
            <li><a href="<?= $connexion; ?>">Connexion</a></li>
            <li><a href="<?= $admin ?>">Admin</a></li>
        </ul>
    </nav>
</header>