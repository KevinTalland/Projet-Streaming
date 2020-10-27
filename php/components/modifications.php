<?php
function getSupprButton()
{
    return "<form action='./php/gestionfilms/supprimer.php' method='post'>
            <input type='hidden' name='titre' value=\"" . $_GET['film'] . "\">
            <button type='submit' name='suppr'>Supprimer</button>
            </form>";
}

if (isset($_SESSION['modif'])) {
    function getModifTitle()
    {
        return "<form action='./php/gestionfilms/modification.php' method='post'>
            <div><input type='text' name='titreFilm' placeholder='Modifier le titre'></div>";
    }

    function getModifAffiche()
    {
        return "<div><textarea type='text' rows='2' cols='50' name='afficheFilm' 
                placeholder='Pour modifier cette affiche veuillez rentrer un lien valide vers un fichier image'></textarea></div>";
    }

    function getModifCreateur()
    {
        return "<div><input type='text' name='nomCreateur' placeholder='Modifier le réalisateur'></div>";
    }

    function getModifAnnee()
    {
        return "<div><input type='date' name='anneeFilm'></div>";
    }

    function getModifGenre()
    {
        return "<div><input type='text' name='genreFilm' placeholder='Modifier le genre'></div>";
    }

    function getModifDuree()
    {
        return "<div><input type='number' min='0' name='dureeFilm' placeholder='Modifier la durée (min)'></div>";
    }

    function getModifSynopsis()
    {
        return "<div><textarea type='text' rows='4' cols='100' name='descriptionFilm' placeholder='Modifier le synopsis'></textarea></div>";
    }

    function getModifSubmit()
    {
        return "<div class='submit-modif'>
        <input type='submit' value='Valider'>
        <input type='submit' value='Annuler' name='annuler'>
        </div>
        </form>";
    }
    
} else {
    function getModifTitle()
    {
        return "";
    }

    function getModifAffiche()
    {
        return "";
    }

    function getModifCreateur()
    {
        return "";
    }

    function getModifAnnee()
    {
        return "";
    }

    function getModifGenre()
    {
        return "";
    }

    function getModifDuree()
    {
        return "";
    }

    function getModifSynopsis()
    {
        return "";
    }

    function getModifSubmit()
    {
        return "";
    }
}
