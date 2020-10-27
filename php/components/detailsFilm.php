<?php
require_once("./php/components/eachFilms.php");

function getDetailsFilm($titre, $createur, $annee, $genre, $description, $affiche, $duree)
{
    $details = getTitle($titre);
    $details .= getAffiche($affiche, $titre);
    $details .="</div>
                <div class='details_container'>";
    $details .= getCreateur($createur);
    $details .= getAnnee($annee);
    $details .= getGenre($genre);
    $details .= getDuree($duree);
    $details .= getSynopsis($description);
    $details .= getModifSubmit();
    return $details;
}

function getTitle($titre){
    return "<h1>" . $titre . "</h1>" 
            . getModifTitle();
}

function getAffiche($affiche, $titre)
{
    return "<div>
            <div>
            <div class='img_film_generate'>
            <img src='" . $affiche . "' alt=\"affiche de " . $titre . "\">"
            . getModifAffiche();
}

function getCreateur($createur){
    return "<p>Réalisateur : " . $createur . "</p>"
            . getModifCreateur();
}

function getAnnee($annee){
    return "<p>Date de sortie : " . $annee . "</p>"
            . getModifAnnee();
}

function getGenre($genre){
    return "<p>Genre : " . $genre . "</p>"
            . getModifGenre();
}

function getDuree($duree){
    return "<p>Durée :  " . $duree . "</p>"
            . getModifDuree();
}

function getSynopsis($description)
{
    return "</div>
            </div>
            <div>
            <h4>Synopsis</h4>
            <p> " . $description . "</p>"
            . getModifSynopsis() . "</div>";
}