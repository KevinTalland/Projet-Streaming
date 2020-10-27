<?php
require("./films.php");
require_once("../php/components/format.php");
date_default_timezone_set('Europe/Paris');
try {
  $file_db = new PDO('sqlite:../tmp/films.sqlite');
  $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
  $file_db->exec("drop table proposition");
  $file_db->exec("CREATE TABLE proposition
  ( 
  titreFilm TEXT,
  nomAcc TEXT,
  FOREIGN KEY(titreFilm) REFERENCES films(titreFilm),
  FOREIGN KEY(nomAcc) REFERENCES account(nomAcc)
  )");

  $file_db = null;

  header("Location:../index.php");
} catch (PDOException $ex) {
  echo $ex->getMessage();
  header("Location:../php/error.html");
}