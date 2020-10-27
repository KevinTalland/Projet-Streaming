<?php
session_start();
date_default_timezone_set('Europe/Paris');
require_once('./format.php');

if (isset($_POST['titreFilm'])) {
    try {
        $file_db = new PDO('sqlite:../tmp/films.sqlite');
        $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

        $nom = $_SESSION['nom'];

        $req = "select idAcc from account where nomAcc=:nom";
        $stmt = $file_db->prepare($req);
        $stmt->bindParam(":nom", $nom, PDO::PARAM_STR);
        $stmt->execute();
        $id = $stmt->fetchColumn();

        $insert = "INSERT INTO proposition (idAcc, titreFilm, titreFilmURL, nomCreateur, anneeFilm, genreFilm, descriptionFilm, afficheFilm, dureeFilm)
        VALUES (:idAcc, :titreFilm, :titreFilmURL, :nomCreateur , :anneeFilm, :genreFilm, :descriptionFilm, :afficheFilm, :dureeFilm)";

        $stmt = $file_db->prepare($insert);
        $stmt->bindParam(':idAcc', $id, PDO::PARAM_INT);
        $stmt->bindParam(':titreFilm', $titre, PDO::PARAM_STR);
        $stmt->bindParam(':titreFilmURL', $titreURL, PDO::PARAM_STR);
        $stmt->bindParam(':nomCreateur', $createur,PDO::PARAM_STR);
        $stmt->bindParam(':anneeFilm', $annee,PDO::PARAM_INT);
        $stmt->bindParam(':genreFilm', $genre,PDO::PARAM_STR);
        $stmt->bindParam(':descriptionFilm', $description,PDO::PARAM_STR);
        $stmt->bindParam(':afficheFilm', $affiche,PDO::PARAM_STR);
        $stmt->bindParam(":dureeFilm", $duree,PDO::PARAM_INT);

            $titre = htmlentities($_POST['titreFilm']);
            $titreURL = getTitleFormat($titre);
            $createur = htmlentities($_POST['nomCreateur']);
            $annee = strtotime(htmlentities($_POST['anneeFilm']));
            $genre = htmlentities($_POST['genreFilm']);
            $description = htmlentities($_POST['descriptionFilm']);
            $affiche = htmlentities($_POST['afficheFilm']);
            $duree = htmlentities($_POST['dureeFilm']);
        
        
        $stmt->execute();

        $file_db = null;

        header("Location:../index.php");

    } catch (PDOException $ex) {
        echo $ex->getMessage();
        header("Location:./error.html");
    }
}