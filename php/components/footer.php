<?php
function getFooter($lienAccueil, $lienProp, $lienGestion)
{
    $footer = "
        <footer class='footer'>

        <div class='footer-left'>

        <h3>KX<span>Streaming</span></h3>

        <p class='footer-links'>
            <a href='". $lienAccueil . "' class='link-1'>Accueil</a>

            <a href='" . $lienProp . "'>Proposition</a>";

            if (isset($_SESSION['admin'])) { 
                $footer .= "<a href='" . $lienGestion . "'>Gestion</a>";
            }

        $footer .= "
        </p>

        <p class='footer-name'>Talland Kevin - Lemaire Xavier © 2020</p>
    </div>

    <div class='footer-center'>

        <div>
            <p><span>16 rue d'Issoudun</span> 45160, Olivet, France</p>
        </div>

        <div>
            <p>06 77 16 87 63</p>
        </div>

        <div class='footer-contact'>
            <p><a href='mailto:kevin.talland@etu.univ-orleans.fr'>kevin.talland@etu.univ-orleans.fr</a></p>
            <p><a href='mailto:xavier.lemaire@etu.univ-orleans.fr'>xavier.lemaire@etu.univ-orleans.fr</a></p>
        </div>

    </div>

    <div class='footer-right'>

        <p class='footer-about'>
            <span>A propos de nous</span>
            Nous sommes deux étudiants en IUT Informatique répondant à la demande d'un projet web visant à élaborer une plateforme de streaming en PHP.
        </p>

    </div>

</footer>";
    echo $footer;
}
