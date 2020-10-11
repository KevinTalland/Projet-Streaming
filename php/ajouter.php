<?php
date_default_timezone_set('Europe/Paris');
try {
    $file_db = new PDO('sqlite:../tmp/films.sqlite');
    $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

    $insert = "INSERT INTO films (titreFilm, nomCreateur, anneeFilm, genreFilm, descriptionFilm, afficheFilm, dureeFilm)
    VALUES (:titreFilm, :nomCreateur , :anneeFilm, :genreFilm, :descriptionFilm, :afficheFilm, :dureeFilm)";
    $stmt = $file_db->prepare($insert);
    $stmt->bindParam(':titreFilm', $titre, PDO::PARAM_STR);
    $stmt->bindParam(':nomCreateur', $createur,PDO::PARAM_STR);
    $stmt->bindParam(':anneeFilm', $annee,PDO::PARAM_INT);
    $stmt->bindParam(':genreFilm', $genre,PDO::PARAM_STR);
    $stmt->bindParam(':descriptionFilm', $description,PDO::PARAM_STR);
    $stmt->bindParam(':afficheFilm', $affiche,PDO::PARAM_STR);
    $stmt->bindParam(":dureeFilm", $duree,PDO::PARAM_INT);

    $titre = $_POST['titreFilm'];
    $createur = $_POST['nomCreateur'];
    $annee = strtotime($_POST['anneeFilm']);
    $genre = $_POST['genreFilm'];
    $description = $_POST['descriptionFilm'];
    $affiche = $_POST['afficheFilm'];
    $duree = $_POST['dureeFilm'];
    $stmt->execute();

    $file_db = null;
} catch (PDOException $ex) {
    echo $ex->getMessage();
}

header("Location:../index.php");
