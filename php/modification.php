<?php
date_default_timezone_set('Europe/Paris');
session_start();
require_once('./function.php');

if (isset($_POST['annuler'])) {
    unset($_SESSION['modif']);
    header("Location:../index.php");
}

try {
    $file_db = new PDO('sqlite:../tmp/films.sqlite');
    $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

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

    $titreReq = 'SELECT titreFilm FROM films WHERE titreFilm="'.$_SESSION['titreFilm'].'"';
    $titre1 = $file_db->query($titreReq);
    $titreAvant = $titre1->fetchColumn();

    $stmt = $file_db->exec($update);

    //titreApres est recherché en fonction de l'ancien titre pour voir si il a changé
    $titreReq = 'SELECT titreFilm FROM films WHERE titreFilm="'.$titreAvant.'"';
    $titre2 = $file_db->query($titreReq);
    $titreApres = $titre2->fetchColumn();

    //si le titre a changé, on efface l'ancien fichier php
    if ($titreAvant != $titreApres){
        $nom = getTitleFormat($titreAvant);
        $titrePage = $nom.".php";
        $path="./pages/";
        unlink($path.$titrePage);
    }

    $file_db = null;
} catch (PDOException $ex) {
    echo $ex->getMessage();
}

unset($_SESSION['titreFilm']);
unset($_SESSION['modif']);
header("Location:../index.php");
