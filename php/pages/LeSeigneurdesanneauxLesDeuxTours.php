<?php
    session_start();
    date_default_timezone_set('Europe/Paris');
    ?>
    <!DOCTYPE html>
    <html lang='fr'>
    
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>LeSeigneurdesanneauxLesDeuxTours</title>
        <link rel='stylesheet' href='../../assets/style.css'>
        <link href='https://fonts.googleapis.com/css2?family=Cardo:ital,wght@0,400;0,700;1,400&family=Montserrat:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap' rel='stylesheet'>
        <link rel='stylesheet' href='../../assets/footer.css'>
        <link rel='stylesheet' href='../../assets/generate.css'>
        <link rel='stylesheet' href='../../assets/nav.css'>
    </head>
    
    <body>
        <header class='topbar'>
            <nav>
                <a href='../../index.php'>Accueil</a>
                <a href='#'>Lien 1</a>
                <a href='#'>Lien 2</a>
            </nav>
            <div class='searchBar'>
            <form action='./tri/searchFilm.php' method='post'>
                <input type='search' name='search' placeholder='Rechercher un film'>
                <button type='submit'>Search</button>
            </form>
            </div>
            <div class='social'>
            
                <?php
                if (isset($_SESSION['nom'])) {
                    echo "<a href='../profil.php'>Profil</a>";
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

        <section class='generate'>

                <?php 
                    if ($_SESSION['admin']==1 and !isset($_SESSION['modif'])){ 
                ?>
            <a href='../modifCall.php'>
                <button>Modifier</button>
            </a>
                <?php } ?>
            <h1>Le Seigneur des anneaux : Les Deux Tours</h1>
            <?php if (isset($_SESSION['modif'])){

                $_SESSION['titreFilm'] = "Le Seigneur des anneaux : Les Deux Tours";

                echo "<form action='../modification.php' method='post'><div><input type='text' name='titreFilm' placeholder='Modifier le titre'></div>";
            }?>
        <div>
            <div>
                <div class='img_film_generate'>
                    <img src='https://fr.web.img6.acsta.net/medias/nmedia/00/02/54/95/affiche2.jpg' alt='affiche de Le Seigneur des anneaux : Les Deux Tours'>
                    <?php if (isset($_SESSION['modif'])){ echo "<div><textarea type='text' rows='2' cols='50' name='afficheFilm' 
                        placeholder='Pour modifier cette affiche veuillez rentrer un lien valide vers un fichier image'></textarea></div>"; }?>
                </div>
                <div class='details_container'>
                    <p>Réalisateur : Peter Jackson</p>
                    <?php if (isset($_SESSION['modif'])){ echo "<div><input type='text' name='nomCreateur' placeholder='Modifier le réalisateur'></div>"; }?>
                    <p>Date de sortie : 18/12/2002</p>
                    <?php if (isset($_SESSION['modif'])){ echo "<div><input type='date' name='anneeFilm'></div>"; }?>
                    <p>Genre : Fantasy</p>
                    <?php if (isset($_SESSION['modif'])){ echo "<div><input type='text' name='genreFilm' placeholder='Modifier le genre'></div>"; }?>
                    <p>Durée :  2h58</p>
                    <?php if (isset($_SESSION['modif'])){ echo "<div><input type='number' name='dureeFilm' placeholder='Modifier la durée (minutes)'></div>"; }?>
                </div>
            </div>
            <div>
                <h4>Synopsis</h4>
                <p>Frodon et Sam continuent leur voyage vers Mordor pour détruire l'anneau de Sauron. Aragorn, Gimli et Legolas partent pour sauver leurs amis hobbits.</p>
                <?php if (isset($_SESSION['modif'])){ echo "<div><textarea type='text' rows='4' cols='100' name='descriptionFilm' placeholder='Modifier le synopsis'></textarea></div>"; }?>
            </div>
            <?php if (isset($_SESSION['modif'])){ ?>
                <div class='submit-modif'>
                    <input type='submit' value='Valider'>
                    <input type='submit' value='Annuler' name='annuler'>
                </div>
                </form>
            <?php } ?>
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
    
        </footer>
    
    
    </body>
    
    </html>