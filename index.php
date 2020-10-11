<?php
session_start();
date_default_timezone_set('Europe/Paris');
require_once("./php/generate.php");
require_once("./php/tri/triFunction.php");
require_once("./php/function.php");
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Cardo:ital,wght@0,400;0,700;1,400&family=Montserrat:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/footer.css">
    <link rel="stylesheet" href="assets/nav.css">
</head>

<body>
    
    <header class="topbar">
        <nav>
            <a href="#">Accueil</a>
            <a href="#">Lien 1</a>
            <a href="#">Lien 2</a>
        </nav>
        <div class='searchBar'>
            <form action="../php/tri/searchFilm.php" method='post'>
                <input type="search" name='search' placeholder='Rechercher un film'>
                <button type="submit">Search</button>
            </form>
        </div>
        
        <div class="social">
            
            <?php
            
            if (isset($_SESSION['nom'])) {
                echo "<a href='./php/profil.php'>Profil</a>";
                echo "<a href='./php/login/login.php'>
                    <Button>
                        Déconnexion
                    </Button></a>";
            } else {
                echo "<a href='./php/login/login.php'>
                    <Button>
                        Connexion
                    </Button></a>";
            }
            ?>
        </div>
    </header>

    <div class="banniere"></div>

    <section>

        <?php
        try {
            $file_db = new PDO('sqlite:./tmp/films.sqlite');
            $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

            $result = tri($file_db);
            
            foreach ($result as $r) {
                $format = getTitleFormat($r['titreFilm']);
              echo
                "<div class='article'>
                <a href='./php/pages/" . $format . ".php'>
                <img class='affiche' src='" . $r["afficheFilm"] . "' alt='affiche de " . $r["titreFilm"] . "'/><span> "
                 . $r["titreFilm"] .
              "</span></a></div>";
              createPage($format, $r);
            }

            $file_db = null;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        ?>

    </section>
    <aside class="aside">
        <h4 class="sidebar-title">Trier par :</h4>
        <ul>
            <a href="./php/tri/tridate.php">
                <li>Date</li>
            </a>
            <a href="./php/tri/triAZ.php">
                <li>Nom (A-Z)</li>
            </a>
            <a href="./php/tri/triZA.php">
                <li>Nom (Z-A)</li>
            </a>
            <a href="./php/tri/triGenre.php">
                <li>Genre</li>
            </a>
        </ul>
        <hr>
    </aside>

    <footer class='footer'>

        <div class='footer-left'>

            <h3>KX<span>Streaming</span></h3>

            <p class='footer-links'>
                <a href="#" class="link-1">Accueil</a>

                <a href="#">Lien 1</a>

                <a href="#">Lien 2</a>

                <a href="./php/profil.php">Profil</a>
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

            <div class="footer-contact">
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