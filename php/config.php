<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=test','root','');

    if(isset($_POST['Nom']) && isset($_POST['Prénom']) && isset($_POST['radio']) && isset($_POST['Email']) && isset($_POST['Password'])) {
       if(trim($_POST['Nom']) != "" && trim($_POST['Prénom']) != "" && trim($_POST['Email']) !="" && trim($_POST['Password']) !="") {
            $password = password_hash($_POST['Password'], PASSWORD_DEFAULT);
            if(isset($_GET['modifier']))
            {
                $req = $bdd->prepare("UPDATE utilisateurs SET Matricule=?, Nom=?, Prenom=?, Sexe=?, Email=?, Password=? WHERE Id = ?");
                $req->execute([$_POST['Matricule'],$_POST['Nom'],$_POST['Prénom'],$_POST['radio'],$_POST['Email'],$password,$_GET['modifier']]);
                $message = "Modification effectuée avec succès";
            }
            else {
                $req = $bdd->prepare("SELECT * FROM utilisateurs WHERE Email=? AND Matricule=?");
                $req->execute([$_POST['Email'],$_POST['Matricule']]);
                $data = $req->fetchAll(PDO::FETCH_ASSOC);
                if(count($data)==0)
                {
                    $req = $bdd->prepare("INSERT INTO utilisateurs VALUES ( NULL,:matricule,:nom, :prenom, :sexe, :email, :motdepasse)");
                    $info = $req->execute(array(
                        "matricule" => $_POST['Matricule'],
                        "nom" => $_POST['Nom'],
                        "prenom" => $_POST['Prénom'],
                        "sexe" => $_POST['radio'],
                        "email" => $_POST['Email'],
                        "motdepasse" => $password
                    ));
                    if($info){
                        $_SESSION['Matricule'] =  $_POST['Matricule'];
                        $_SESSION['Nom'] =  $_POST['Nom'];
                        $_SESSION['Prénom'] =  $_POST['Prénom'];
                        $_SESSION['radio'] =  $_POST['radio'];
                        $_SESSION['Email'] =  $_POST['Email'];
                        $_SESSION['Password'] =  $_POST['Password'];
                        header("Location: ../admin/index.php");
                        exit();
                    }
                }
                else {
                    $message = "Vous ne pouvez pas vous inscrire avec cet email";
                }
            }
       } 
       else {
        $message = "Veuillez remplir les champs ! ";
       }      
    } 
    if(isset($_GET['form']))
    {
        unset($_SESSION['Matricule']);
        unset($_SESSION['Nom']);
        unset($_SESSION['Prénom']);
        unset($_SESSION['radio']);
        unset($_SESSION['Email']);
        unset($_SESSION['Password']);
    }
    if(isset($_GET['modifier']))
    {
        $req = $bdd->prepare("SELECT Id FROM utilisateurs WHERE Id = ?");
        $req->execute([$_GET['modifier']]);
        $tabId = $req->fetch(PDO::FETCH_OBJ);
        if($tabId)
        {
            $req = $bdd->prepare("SELECT * FROM utilisateurs WHERE Id = ?");
            $info = $req->execute([$tabId->Id]);
            $datas = $req->fetch(PDO::FETCH_OBJ);
        }
    }
}
catch(Exception $e) {
    die('Error' . $e->getMessage());
}
?>