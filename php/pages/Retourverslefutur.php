<?php
    session_start();
    date_default_timezone_set('Europe/Paris');
    ?>
    <!DOCTYPE html>
    <html lang='fr'>
    
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Retourverslefutur</title>
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

        <section class='generate'><h1>Retour vers le futur</h1>
        <div>
            <div>
                <div class='img_film_generate'>
                    <img src='https://fr.web.img2.acsta.net/medias/nmedia/18/35/91/26/18686482.jpg' alt='affiche de Retour vers le futur'>
                </div>
                <div class='details_container'>
                    <p>Réalisateur : Zemeckis Robert</p>
                    <p>Date de sortie : 03/07/1985</p>
                    <p>Genre : Science-fiction</p>
                    <p>Durée :  1h56</p>
                </div>
            </div>
            <div>
                <h4>Synopsis</h4>
                <p>En 1985, Marty, un adolescent comme les autres, mène une existence qu'il juge morne et ennuyeuse. Heureusement, il est épris de la jolie Jennifer et entretient une profonde amitié avec Doc, un savant fou qui prétend avoir inventé une machine à explorer le temps. Un jour, Doc invite Marty à l'essayer. Mais ils sont surpris par des terroristes. Doc est abattu tandis que Marty met l'engin en marche et se retrouve en 1955.</p>
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