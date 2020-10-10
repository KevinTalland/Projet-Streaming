<?php
    session_start();
    date_default_timezone_set('Europe/Paris');
    ?>
    <!DOCTYPE html>
    <html lang='fr'>
    
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Lempirecontreattaque</title>
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
                <a href='../profil.php'>Mon profil</a>
            </nav>
            <div class='social'>
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

        <section class='generate'><h1>L'empire contre-attaque</h1>
        <div>
            <div>
                <div class='img_film_generate'>
                    <img src='https://fr.web.img4.acsta.net/medias/nmedia/00/02/44/28/empire.jpg' alt='affiche L'empire contre-attaque'>
                </div>
                <div class='details_container'>
                    <p>Réalisateur : Irvin Kershner</p>
                    <p>Date de sortie : 21/05/1980</p>
                    <p>Genre : Science-fiction</p>
                    <p>Durée :  2h04</p>
                </div>
            </div>
            <div>
                <h4>Synopsis</h4>
                <p>Malgré la destruction de l'Etoile noire, l'Empire règne toujours sur la galaxie. Un groupe de l'Alliance rebelle, mené par la princesse Leia se réfugie sur la planète glacée de Hoth. Après avoir subi un assaut des troupes impériales, Leia, Han Solo, Chewbacca et C-3P0 parviennent à s'échapper et se dirigent vers Bespin, la cité des nuages gouvernée par Lando Calrissian, ancien compagnon de Han. De son côté, Luke s'envole pour Dagobah afin d'apprendre l'art des Jedi avec le maître Yoda.</p>
            </div>
        </section>

        <footer class='footer-distributed footer'>

        <div class='footer-left'>

            <h3>KX<span>Streaming</span></h3>

            <p class='footer-links'>
                <a href='../../index.php' class='link-1'>Accueil</a>

                <a href='#'>Lien 1</a>

                <a href='#'>Lien 2</a>

                <a href='../profil.php'>Mon profil</a>
            </p>

            <p class='footer-company-name'>Talland Kevin - Lemaire Xavier © 2020</p>
        </div>

        <div class='footer-center'>

            <div>
                <i></i>
                <p><span>16 rue d'Issoudun</span> 45160, Olivet, France</p>
            </div>

            <div>
                <i></i>
                <p>06 77 16 87 63</p>
            </div>

            <div>
                <i></i>
                <p><a href='mailto:support@company.com'>kevin.talland@etu.univ-orleans.fr</a></p>
                <p><a href='mailto:support@company.com'>xavier.lemaire@etu.univ-orleans.fr</a></p>
            </div>

        </div>

        <div class='footer-right'>

            <p class='footer-company-about'>
                <span>A propos de nous</span>
                Lorem ipsum dolor sit amet, consectateur adispicing elit. Fusce euismod convallis velit, eu auctor lacus vehicula sit amet.
            </p>

        </div>

    </footer>


</body>

</html>