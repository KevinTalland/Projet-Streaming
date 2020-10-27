<?php
require("./films.php");
require_once("../php/components/format.php");
date_default_timezone_set('Europe/Paris');
try {
  $file_db = new PDO('sqlite:../tmp/films.sqlite');
  $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
  $file_db->exec("drop table films");
  $file_db->exec("CREATE TABLE films ( 
 titreFilm TEXT PRIMARY KEY,
 titreFilmURL TEXT,
 nomCreateur TEXT,
 anneeFilm INTEGER,
 genreFilm TEXT,
 descriptionFilm TEXT,
 afficheFilm TEXT,
 dureeFilm INTEGER,
 proposition BOOLEAN)");

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

  foreach ($films as $f) {
    $titre = $f['titreFilm'];
    $titreURL = getTitleFormat($titre);
    $createur = $f['nomCreateur'];
    $annee = $f['anneeFilm'];
    $genre = $f['genreFilm'];
    $description = $f['descriptionFilm'];
    $affiche = $f['afficheFilm'];
    $duree = $f['dureeFilm'];
    $proposition = $f['proposition'];
    $stmt->execute();
  }

  $file_db = null;

  header("Location:../index.php");

} catch (PDOException $ex) {
  echo $ex->getMessage();
  header("Location:../php/error.html");
}