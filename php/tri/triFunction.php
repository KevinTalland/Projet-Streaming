<?php

require("./php/format.php");

function triGenre($file_db)
{
    $result = '';
    $req = $file_db->query("SELECT DISTINCT genreFilm FROM films ORDER BY genreFilm");
    foreach ($req as $genre) {
        $result .= "<div class='trigenre'>
                    
                    <h2>" . $genre['genreFilm'] . "</h2>";

        $requete = "SELECT * FROM films WHERE genreFilm='" . $genre['genreFilm'] . "'";
        $listeFilms = $file_db->query($requete);

        foreach ($listeFilms as $film) {

            $format = getTitleFormat($film["titreFilm"]);
            $result .= "<div class='article'>
                        <a href=\"" . $_SERVER['PHP_SELF'] . "?film=" . $format . "\">
                        <img class='affiche' src='" . $film["afficheFilm"] . "' alt='affiche de " . $film["titreFilm"] . "'/>
                        <span> " . $film["titreFilm"] . "</span></a></div>";
        }
        $result .= "</div>";
    }
    return $result;
}

function tri($file_db)
{
    //tri par ordre alphabétique
    if (isset($_SESSION["triAZ"])) {
        $result = $file_db->query('SELECT * FROM films ORDER BY titreFilm');
        unset($_SESSION["triAZ"]);
    } 
    //tri par ordre alphabétique contraire
    elseif (isset($_SESSION["triZA"])) {
        $result = $file_db->query('SELECT * FROM films ORDER BY titreFilm DESC');
        unset($_SESSION["triZA"]);
    } 
    //tri par genre
    elseif (isset($_SESSION["triGenre"])) {
        $result = triGenre($file_db);
    } 
    //gestion de la search bar
    else if (isset($_SESSION['search'])) {
        $titre = $_SESSION['search'];
        $req = "SELECT * FROM films WHERE titreFilm LIKE '%" . $titre . "%'";
        $result = $file_db->query($req);
        unset($_SESSION['search']);
    } 
    //par défaut : tri par date
    else {
        $result = $file_db->query('SELECT * FROM films ORDER BY anneeFilm DESC');
        if (isset($_SESSION["tridate"])) {
            unset($_SESSION["tridate"]);
        }
    }
    return $result;
}
