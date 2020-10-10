<?php
    session_start();
    date_default_timezone_set('Europe/Paris');
    ?>
    <!DOCTYPE html>
    <html lang='fr'>
    
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>LaGuerredesEtoiles</title>
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
                if (isset($_SESSION['nom'])) {
                    echo "<a href='../login/login.php'>
                        <Button>
                            Déconnexion
                        </Button></a>";
                } else {
                    echo "<a href='../login/login.php'>
                        <Button>
                            Connexion
                        </Button></a>";
                }
                ?>
            </div>
        </header>
    
        <div class='banniere'></div>'

        <section class='generate'><h1>La Guerre des Etoiles</h1>
        <div>
            <div>
                <div class='img_film_generate'>
                    <img src='https://fr.web.img6.acsta.net/medias/nmedia/18/35/41/59/18422600.jpg' alt='affiche de La Guerre des Etoiles'>
                </div>
                <div class='details_container'>
                    <p>Réalisateur : George Lucas</p>
                    <p>Date de sortie : 25/05/1977</p>
                    <p>Genre : Science-fiction</p>
                    <p>Durée :  2h01</p>
                </div>
            </div>
            <div>
                <h4>Synopsis</h4>
                <p>Dans une galaxie lointaine, l'univers est dominé par l'Empire galactique avec à sa tête le sombre et impitoyable Dark Vador. Mais la révolte gronde, l'Alliance rebelle menée par la princesse Leia, s'empare des plans de l'Etoile Noire, la base secrète de l'Empire. Avant d'être capturée par les forces impériales, la jeune princesse dissimule les plans de l'Etoile Noire à son droïde R2-D2 avec pour mission de les remettre au Jedi Obi-Wan Kenobi. Accompagné de son fidèle compagnon, le droïde de protocole C-3PO, les deux robots s'échouent sur la planète Tatooine et terminent leur quête chez le jeune Luke Skywalker. Rêvant de devenir pilote, ce dernier se lance à la recherche de ce mystérieux Obi-Wan Kenobi, devenu ermite au coeur des montagnes désertiques de Tatooine...</p>
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
    
    </html>