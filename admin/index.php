<?php
try {
    
    $bdd = new PDO('mysql:host=localhost;dbname=test','root','');
    if(isset($_GET['supprimer'])) {
        $req = $bdd->prepare("SELECT Id FROM utilisateurs WHERE Id = ?");
        $req->execute([$_GET['supprimer']]);
        $tabId = $req->fetch(PDO::FETCH_OBJ);
        if($tabId)
        {
            $req = $bdd->prepare("DELETE FROM utilisateurs WHERE Id = ?");
            $info = $req->execute([$tabId->Id]);
            if($info)
            {
                $message = "Suppression effectuée avec succès"; 
            }
        }
    }
    $req = $bdd->prepare('SELECT Id, Matricule, Nom, Prenom, Sexe, Email  FROM utilisateurs ');
    $req->execute();
    $datas = $req->fetchAll(PDO::FETCH_ASSOC);
}
catch(Exception $e) {
    die('Error' . $e->getMessage());
}
$nom = ["#","Matricule","Nom","Prénom","Sexe","Email", "Action 1","Action 2"]
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration</title>
    <link rel="stylesheet" href="../assets/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/style.css">
    <script src="../js/script.js" defer></script>
    <style>
        table, td {
            border : 1px solid rgba(0,0,0,0.3);
            border-collapse : collapse;
            padding : 20px;
            text-align : center;
            margin-bottom: 25px; 
        }
        .donnee {
            transform : translate(0, 160px);
            margin : auto;
            width : 70%;
            display : flex;
            flex-direction: column ; 
        }
        .t-bord+a {
            text-decoration : none;
            color : white;
            border-radius : 5px; 
            background : rgba(0,0,255,0.8);
            padding: 10px;
            margin : 15px 0px 15px 570px;
            width : 140px;
        }
        .t-bord {
            font-weight : bold;
            font-size : large;
            text-transform : uppercase;
            text-align : center;
        }
    </style>
</head>
<body>
    <?php require "../php/header.php" ?>
    <div class="donnee">
        <div class="t-bord">
            Récapitulatif des utilisateurs de Notre Plateforme
        </div>
        
        <a href="../php/inscription.php">Ajouter utilisateur</a>
        <?php if(isset($message)) : ?>
            <div class="alert alert-success ml-5">
                <?= $message ?>
            </div>
        <?php endif ?>
        <?php if($datas) : ?>
            <table>
                <thead>
                    <?php foreach($nom as $value) : ?>
                        <td style="background : whitesmoke "><b><?= $value ?></b></td>
                    <?php endforeach ?>
                </thead>
                <tbody>
                    <?php foreach($datas as $data) : ?>
                        <tr>
                            <?php foreach($data as $k => $d) : ?>
                                <?php if($k=="Id") : ?>
                                    <td><?= "#" . $d ?></td>
                                <?php else : ?>
                                    <td><?= $d ?></td>
                                <?php endif ?>
                            <?php endforeach ?>
                            <td><a href="../php/inscription.php?modifier=<?= $data['Id'] ?>" class="btn btn-primary">Modifier</a></td>
                            <td><a onclick="return confirm('Etes-vous sûr de supprimer cet utilisateur ? ')" href="./?supprimer=<?= $data['Id'] ?>" class="btn btn-danger">Supprimer</a></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table> 
        <?php else : ?>
            <div class="card-body border p-5 col-md-4 m-auto" style="font-size: x-large;">
                Aucun utilisateur pour l'instant.
            </div>  
        <?php endif ?>
    </div> 
</body>
</html>


