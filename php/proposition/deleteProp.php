<?php
date_default_timezone_set('Europe/Paris');

function deleteProp($db, $titre, $nom)
{
    $suppr = "DELETE from proposition where titreFilm=:nom AND nomAcc=:nomAcc";
    $stmt = $db->prepare($suppr);
    $stmt->bindParam(':nom', $titre, PDO::PARAM_STR);
    $stmt->bindParam(":nomAcc", $nom, PDO::PARAM_STR);
    $stmt->execute();

    $suppr = "DELETE from films where titreFilm=:nom AND proposition=1";
    $stmt = $db->prepare($suppr);
    $stmt->bindParam(':nom', $titre, PDO::PARAM_STR);
    $stmt->execute();
}
