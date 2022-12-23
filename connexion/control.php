<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=test','root','');
    if(isset($_POST['email']) && isset($_POST['password'])) {
        $req = $bdd->prepare("SELECT * FROM utilisateurs WHERE Email = ? ");
        $req->execute([$_POST['email']]);
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        if(count($datas)>0) {
            $_SESSION['connexion'] = 1;
        }
    }         
}
catch(Exception $e) {
    die('Error' . $e->getMessage());
}
?>