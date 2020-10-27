<?php
date_default_timezone_set('Europe/Paris');
require_once("../components/format.php");
if (isset($_POST['titreFilm'])){
    try {
        $file_db = new PDO('sqlite:../../tmp/films.sqlite');
        $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    
        $insert = "INSERT INTO films (titreFilm, titreFilmURL, nomCreateur, anneeFilm, genreFilm, descriptionFilm, afficheFilm, dureeFilm, proposition)
        VALUES (:titreFilm, :titreFilmURL, :nomCreateur , :anneeFilm, :genreFilm, :descriptionFilm, :afficheFilm, :dureeFilm, :proposition)";
        $stmt = $file_db->prepare($insert);
        $stmt->bindParam(':titreFilm', $titre, PDO::PARAM_STR);
        $stmt->bindParam(':titreFilmURL', $titreURL, PDO::PARAM_STR);
        $stmt->bindParam(':nomCreateur', $createur,PDO::PARAM_STR);
        $stmt->bindParam(':anneeFilm', $annee,PDO::PARAM_INT);
        $stmt->bindParam(':genreFilm', $genre,PDO::PARAM_STR);
        $stmt->bindParam(':descriptionFilm', $description,PDO::PARAM_STR);
        $stmt->bindParam(':afficheFilm', $affiche,PDO::PARAM_STR);
        $stmt->bindParam(":dureeFilm", $duree,PDO::PARAM_INT);
        $stmt->bindParam(':proposition', $proposition, PDO::PARAM_BOOL);
    
        $titre = htmlentities($_POST['titreFilm']);
        $titreURL = getTitleFormat($titre);
        $createur = htmlentities($_POST['nomCreateur']);
        $annee = strtotime(htmlentities($_POST['anneeFilm']));
        $genre = ucwords(strtolower(htmlentities($_POST['genreFilm'])));
        $description = htmlentities($_POST['descriptionFilm']);
        $affiche = htmlentities($_POST['afficheFilm']);
        $duree = htmlentities($_POST['dureeFilm']);
        $proposition=0;
        $stmt->execute();
    
        $file_db = null;

        header("Location:../../index.php");
    } catch (PDOException $ex) {
        echo $ex->getMessage();
        header("Location:../error.html");
    } 
}
