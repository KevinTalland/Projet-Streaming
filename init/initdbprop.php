<?php
date_default_timezone_set('Europe/Paris');
try {
  $file_db = new PDO('sqlite:../tmp/films.sqlite');
  $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
  $file_db->exec("drop table proposition");
  $file_db->exec("CREATE TABLE proposition ( 
 idAcc INTEGER,
 titreFilm TEXT,
 titreFilmURL TEXT,
 nomCreateur TEXT,
 anneeFilm INTEGER,
 genreFilm TEXT,
 descriptionFilm TEXT,
 afficheFilm TEXT,
 dureeFilm INTEGER,
 PRIMARY KEY(idAcc,titreFilm),
 FOREIGN KEY(idAcc) REFERENCES account(idAcc))");

  $file_db = null;
  
  header("Location:../index.php");
  
} catch (PDOException $ex) {
  echo $ex->getMessage();
  header("Location:../php/error.html");
}
