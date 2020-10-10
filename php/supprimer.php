<?php
session_start();
date_default_timezone_set('Europe/Paris');
try {
    $file_db = new PDO('sqlite:../tmp/films.sqlite');
    $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

    $req = "DELETE from films where titreFilm=:nom";
    $stmt = $file_db->prepare($req);
    $nom = $_POST['suppr'];

    $stmt->bindParam(":nom",$nom,PDO::PARAM_STR);
    $stmt->execute();

    $file_db = null;
    header("Location:../index.php");
}
catch (PDOException $ex) {
    echo $ex->getMessage();
    header("Location:./error.html");
}
?>