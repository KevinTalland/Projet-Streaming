<?php
date_default_timezone_set('Europe/Paris');

function accepterProp($db, $titre, $id)
{
    $insert = "INSERT INTO films (titreFilm, titreFilmURL, nomCreateur, anneeFilm, genreFilm, descriptionFilm, afficheFilm, dureeFilm)
        SELECT titreFilm, titreFilmURL, nomCreateur , anneeFilm, genreFilm, descriptionFilm, afficheFilm, dureeFilm FROM proposition
        WHERE idAcc=:id and titreFilm=:titreFilm";

    $stmt = $db->prepare($insert);

    $stmt->bindParam(':titreFilm', $titre, PDO::PARAM_STR);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();
}
