<?php
    session_start();
    date_default_timezone_set('Europe/Paris');
    ?>
    <!DOCTYPE html>
    <html lang='fr'>
    
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Matrix</title>
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

        <section class='generate'><h1>Matrix</h1>
        <div>
            <div>
                <div class='img_film_generate'>
                    <img src='https://fr.web.img6.acsta.net/medias/04/34/49/043449_af.jpg' alt='affiche Matrix'>
                </div>
                <div class='details_container'>
                    <p>Réalisateur : Lilly Wachowski</p>
                    <p>Date de sortie : 01/01/1970</p>
                    <p>Genre : Science-fiction</p>
                    <p>Durée :  2h16</p>
                </div>
            </div>
            <div>
                <h4>Synopsis</h4>
                <p>Neo, un des pirates les plus recherchés du cyber-espace, reçoit de mystérieux messages cryptés d'un certain Morpheus. Celui-ci l'exhorte à aller au-delà des apparences et à trouver la réponse à la question qui hante constamment ses pensées : qu'est-ce que la Matrice ?</p>
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