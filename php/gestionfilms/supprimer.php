<?php
session_start();
date_default_timezone_set('Europe/Paris');

if (isset($_POST['titre'])){
    $titre = htmlentities($_POST['titre']);
    unset($_SESSION['modif']);
    try {
        $file_db = new PDO('sqlite:../../tmp/films.sqlite');
        $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    
        $req = "DELETE from films where titreFilmURL=:nom";
        $stmt = $file_db->prepare($req);
    
        $stmt->bindParam(":nom",$titre,PDO::PARAM_STR);
        $stmt->execute();
    
        $file_db = null;

        header("Location:../../index.php");
    }
    catch (PDOException $ex) {
        echo $ex->getMessage();
        header("Location:../error.html");
    }
}

?>