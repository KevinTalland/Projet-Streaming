<?php
session_start();
date_default_timezone_set('Europe/Paris');
require_once('../components/format.php');

if (isset($_POST['titreFilm'])) {
    try {
               
        $titre = htmlentities($_POST['titreFilm']);

        $file_db = new PDO('sqlite:../../tmp/films.sqlite');
        $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

        $nom = $_SESSION['nom'];

        $insert = "INSERT INTO proposition (nomAcc, titreFilm) VALUES (:nomAcc, :titreFilm)";

        $stmt = $file_db->prepare($insert);
        $stmt->bindParam(':nomAcc', $nom, PDO::PARAM_STR);
        $stmt->bindParam(':titreFilm', $titre, PDO::PARAM_STR);        
        
        $stmt->execute();


        //ajout dans la table films
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
        $stmt->bindParam(":proposition", $proposition, PDO::PARAM_BOOL);     

        $titreURL = getTitleFormat($titre);
        $createur = htmlentities($_POST['nomCreateur']);
        $annee = strtotime(htmlentities($_POST['anneeFilm']));
        $genre = htmlentities($_POST['genreFilm']);
        $description = htmlentities($_POST['descriptionFilm']);
        $affiche = htmlentities($_POST['afficheFilm']);
        $duree = htmlentities($_POST['dureeFilm']);
        $proposition = 1;
        
        $stmt->execute();

        $file_db = null;

        header("Location:../../index.php");

    } catch (PDOException $ex) {
        echo $ex->getMessage();
        header("Location:../error.html");
    }
}