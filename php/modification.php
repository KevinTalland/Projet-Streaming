<?php
date_default_timezone_set('Europe/Paris');
session_start();

if (isset($_POST['annuler'])) {
    unset($_SESSION['modif']);
    header("Location:../index.php");
}

try {
    $file_db = new PDO('sqlite:../tmp/films.sqlite');
    $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

    $modifications = array();
    $update = "UPDATE films SET "; //UPDATE films SET $cle='$valeur' where titreFilm = SESSION['titreFilm']

    foreach ($_POST as $cle => $valeur) {
        if ($valeur != "") {
            $update .= $cle . "=";
            if ($cle == 'anneeFilm') {
                var_dump($valeur);
                $valeur = strtotime($valeur);
                var_dump($valeur);
                $update .= $valeur . ",";
            } else if (is_string($valeur)) {
                $update .= '"' . $valeur . '",';
            } else if (is_int($valeur)) {
                $update .= $valeur . ",";
            }
        }
    }
    //On enlève la virgule de trop à la fin
    $update = substr($update, 0, -1);

    $update .= ' where titreFilm="' . $_SESSION['titreFilm'] . '"';

    var_dump($update);

    $stmt = $file_db->exec($update);

    $file_db = null;
} catch (PDOException $ex) {
    echo $ex->getMessage();
}

unset($_SESSION['titreFilm']);
unset($_SESSION['modif']);
header("Location:../index.php");
