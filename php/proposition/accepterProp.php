<?php
date_default_timezone_set('Europe/Paris');

function accepterProp($db, $titre)
{
    $insert = "UPDATE films SET proposition=0 WHERE titreFilm=:titreFilm";
    
    $stmt = $db->prepare($insert);

    $stmt->bindParam(':titreFilm', $titre, PDO::PARAM_STR);
    $stmt->execute();
}
