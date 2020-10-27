<?php
date_default_timezone_set('Europe/Paris');

require_once("./deleteProp.php");
require_once("./accepterProp.php");

try {
    $file_db = new PDO('sqlite:../../tmp/films.sqlite');
    $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

    $req = "select nomAcc from account where nomAcc=:nom";
    $stmt = $file_db->prepare($req);
    if (isset($_POST['nom'])){
        $nom = htmlentities($_POST['nom']);
    }
    $stmt->bindParam(":nom", $nom, PDO::PARAM_STR);
    $stmt->execute();

    $nomAcc = $stmt->fetchColumn();

    if (isset($_POST['titre'])){
        $titre = htmlentities($_POST['titre']);
    }
    

    if (!isset($_POST['refus'])) {
        accepterProp($file_db, $titre);
    }
    deleteProp($file_db, $titre, $nomAcc);


    $file_db = null;

    header("Location:../../index.php");
} catch (PDOException $ex) {
    echo $ex->getMessage();
    header("Location:../error.html");
}
