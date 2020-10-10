<?php

function createPage($titrePage, $data)
{
    $mins =$data['dureeFilm']%60;
    $hours = floor($data['dureeFilm'])/60;

    $html = "<?php
    session_start();
    date_default_timezone_set('Europe/Paris');
    ?>
    <!DOCTYPE html>
    <html lang='fr'>
    
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>" . $titrePage . "</title>
        <link rel='stylesheet' href='../../assets/style.css'>
        <link href='https://fonts.googleapis.com/css2?family=Cardo:ital,wght@0,400;0,700;1,400&family=Montserrat:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap' rel='stylesheet'>
        <link rel='stylesheet' href='../../assets/footer.css'>
    </head>
    
    <body>
        <header class='topbar'>
            <nav>
                <a href='../../index.php'>Accueil</a>
                <a href='#'>Lien 1</a>
                <a href='#'>Lien 2</a>
                
            </nav>
            <div class='social'>
            <a href='../profil.php'>Profil</a>
                <?php
                if (isset($" . "_SESSION[" . "'nom'" . "])) {
                    echo \"<a href='../login/login.php'>
                        <Button>
                            Déconnexion
                        </Button></a>\";
                } else {
                    echo \"<a href='../login/login.php'>
                        <Button>
                            Connexion
                        </Button></a>\";
                }
                ?>
            </div>
        </header>
    
        <div class='banniere'></div>'

        <section class='generate'>" .

            "<h1>" . $data['titreFilm'] . "</h1>
        <div>
            <div>
                <div class='img_film_generate'>
                    <img src='" . $data['afficheFilm'] . "' alt='affiche de " . $data['titreFilm'] . "'>
                </div>
                <div class='details_container'>
                    <p>Réalisateur : " . $data['nomCreateur'] . "</p>
                    <p>Date de sortie : " . date('d/m/Y', $data['anneeFilm']) . "</p>
                    <p>Genre : " . $data['genreFilm'] . "</p>
                    <p>Durée : " . sprintf('%2dh%02d',$hours,$mins)."</p>
                </div>
            </div>
            <div>
                <h4>Synopsis</h4>
                <p>" . $data['descriptionFilm'] . "</p>
            </div>
        </section>

        <footer class='footer'>

        <div class='footer-left'>

            <h3>KX<span>Streaming</span></h3>

            <p class='footer-links'>
                <a href='../../index.php' class='link-1'>Accueil</a>

                <a href='#'>Lien 1</a>

                <a href='#'>Lien 2</a>

                <a href='../profil.php'>Profil</a>
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
    
                <div>
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
    
        </footer>
    
    
    </body>
    
    </html>";

$titrePage .=".php";
$path="./php/pages/";
unlink($path.$titrePage);
$page = fopen($path.$titrePage, "w");
fwrite($page, $html);
fclose($page);
}
