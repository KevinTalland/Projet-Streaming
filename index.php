<?php
session_start();
date_default_timezone_set('Europe/Paris');
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
</head>

<body>
    <header class="topbar">
        <nav>
            <a href="#">Accueil</a>
            <a href="#">Lien 1</a>
            <a href="#">Lien 2</a>
            <a href="./php/profil.php">Mon profil</a>
        </nav>
        <div class="social">
            <?php
            if (isset($_SESSION['nom'])) {
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

            $result = $file_db->query('SELECT * from films');
            foreach ($result as $r) {
              echo
                "<div class='article'>
                <img class='affiche' src='" . $r["afficheFilm"] . "' alt='affiche de" . $r["titreFilm"] . "'/> "
                 . $r["titreFilm"] .
              "</div>";
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
            <a href="#">
                <li>Date</li>
            </a>
            <a href="#">
                <li>Nom (A-Z)</li>
            </a>
            <a href="#">
                <li>Nom (Z-A)</li>
            </a>
            <a href="#">
                <li>Genre</li>
            </a>
        </ul>
        <hr>
    </aside>

    <footer class="footer-distributed footer">

        <div class="footer-left">

            <h3>Bl<span>og</span></h3>

            <p class="footer-links">
                <a href="#" class="link-1">Accueil</a>

                <a href="#">Lien 1</a>

                <a href="#">Lien 2</a>

                <a href="./php/profil.php">Mon profil</a>
            </p>

            <p class="footer-company-name">Talland Kevin - Lemaire Xavier © 2020</p>
        </div>

        <div class="footer-center">

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
                <p><a href="mailto:support@company.com">kevin.talland@etu.univ-orleans.fr</a></p>
                <p><a href="mailto:support@company.com">xavier.lemaire@etu.univ-orleans.fr</a></p>
            </div>

        </div>

        <div class="footer-right">

            <p class="footer-company-about">
                <span>A propos de nous</span>
                Lorem ipsum dolor sit amet, consectateur adispicing elit. Fusce euismod convallis velit, eu auctor lacus vehicula sit amet.
            </p>

        </div>

    </footer>


</body>

</html>