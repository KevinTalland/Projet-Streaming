<?php
require("./films.php");
date_default_timezone_set('Europe/Paris');
try {
  $file_db = new PDO('sqlite:../tmp/films.sqlite');
  $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
  $file_db->exec("drop table films");
  $file_db->exec("CREATE TABLE films ( 
 idFilm INTEGER PRIMARY KEY,
 titreFilm TEXT,
 nomCreateur TEXT,
 anneeFilm INTEGER,
 genreFilm TEXT,
 descriptionFilm TEXT,
 afficheFilm TEXT,
 dureeFilm INTEGER)");

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

  foreach ($films as $f) {
    $titre = $f['titreFilm'];
    $createur = $f['nomCreateur'];
    $annee = $f['anneeFilm'];
    $genre = $f['genreFilm'];
    $description = $f['descriptionFilm'];
    $affiche = $f['afficheFilm'];
    $duree = $f['dureeFilm'];
    $stmt->execute();
  }

  echo "Insertion en base reussie !";

  $file_db = null;
} catch (PDOException $ex) {
  echo $ex->getMessage();
}

header("Location:../index.php");