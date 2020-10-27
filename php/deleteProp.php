<?php
date_default_timezone_set('Europe/Paris');

function deleteProp($db, $titre, $id)
{
    $suppr = "DELETE from proposition where titreFilm=:nom AND idAcc=:id";
    $stmt = $db->prepare($suppr);
    $stmt->bindParam(':nom', $titre, PDO::PARAM_STR);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();
}
