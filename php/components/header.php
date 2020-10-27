<?php
function getHeader($lienAccueil, $lienProp, $lienGestion, $lienFormSearch, $lienLogin)
{
    $header = "
    <header class='topbar'>
    <nav>
        <a href='" . $lienAccueil . "'>Accueil</a>
        <a href='" . $lienProp . "'>Proposition</a>
    </nav>
    <div class='searchBar'>
        <form action='" . $lienFormSearch . "' method='post'>
            <input type='search' name='search' placeholder='Rechercher un film'>
            <button type='submit'>Search</button>
        </form>
    </div>

    <div class='social'>";

    if (isset($_SESSION['nom'])) {
        $header .= "<span>".$_SESSION['nom']."</span>";
        if (isset($_SESSION['admin'])) {
            $header.= "<a href='" . $lienGestion . "'>Gestion</a>";
        }

            $header.= "<a href='". $lienLogin . "'>
                    <Button>
                        Déconnexion
                    </Button></a>";
        } else {
            $header.= "<a href='" . $lienLogin . "'>
                    <Button>
                        Connexion
                    </Button></a>";
        }
    $header .= "
    </div>
    </header>";
    echo $header;
}
