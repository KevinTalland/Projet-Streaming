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
 afficheFilm TEXT)");

  $insert = "INSERT INTO films (titreFilm, nomCreateur, anneeFilm, genreFilm, descriptionFilm, afficheFilm)
    VALUES (:titreFilm, :nomCreateur , :anneeFilm, :genreFilm, :descriptionFilm, :afficheFilm)";
  $stmt = $file_db->prepare($insert);
  $stmt->bindParam(':titreFilm', $titre);
  $stmt->bindParam(':nomCreateur', $createur);
  $stmt->bindParam(':anneeFilm', $annee);
  $stmt->bindParam(':genreFilm', $genre);
  $stmt->bindParam(':descriptionFilm', $description);
  $stmt->bindParam(':afficheFilm', $affiche);

  foreach ($films as $f) {
    $titre = $f['titreFilm'];
    $createur = $f['nomCreateur'];
    $annee = $f['anneeFilm'];
    $genre = $f['genreFilm'];
    $description = $f['descriptionFilm'];
    $affiche = $f['afficheFilm'];
    $stmt->execute();
  }

  echo "Insertion en base reussie !";

  // $result = $file_db->query('SELECT * from films');
  // foreach ($result as $r) {
  //   echo
  //     "<table>
  //   <thead><th>Affiche</th><th>Titre</th><th>Réalisateur</th><th>Date de sortie</th><th>Genre</th><th>Description</th></thead>
  //   <tbody>
  //     <tr><td><img src='" . $r["afficheFilm"] . "' alt='affiche de" . $r["titreFilm"] . "'></td><td>" . $r["titreFilm"] . "</td><td>" .
  //       $r["nomCreateur"] . "</td><td>" . date('d-m-Y', $r["anneeFilm"]) . "</td><td>" . $r["genreFilm"] . "</td><td>" . $r["descriptionFilm"] . "</td></tr>
  //   </tbody>
  //   </table>";
  // }

  $file_db = null;
} catch (PDOException $ex) {
  echo $ex->getMessage();
}

header("Location:../index.php");