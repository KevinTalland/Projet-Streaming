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
    <link rel="stylesheet" href="../assets/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Cardo:ital,wght@0,400;0,700;1,400&family=Montserrat:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/footer.css">
</head>

<body>
    <header class="topbar">
        <nav>
            <a href="../index.php">Accueil</a>
            <a href="#">Lien 1</a>
            <a href="#">Lien 2</a>
            <a href="#">Mon profil</a>
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

    <main class="main">

        <?php
        if (isset($_SESSION['nom'])) {
            echo "<h3>Vous êtes connectés en tant que " . $_SESSION['nom'] . "</h3>";
            if (isset($_SESSION['admin'])) {
                echo "<b>Vous disposez de droits administrateurs</b>";
                echo "<p><a href='./init/initdbfilm.php'>Réinitialiser la table films</a></p>";
                echo "<p><a href='./init/initdbaccount.php'>Réinitialiser la table account</a></p>";
            }
            echo "<p>Heure de la dernière connexion : Le " . date("d-m-Y à H:i", $_SESSION['time']) . "</p>";
        }
        ?>

    </main>

    <footer class="footer-distributed footer">

        <div class="footer-left">

            <h3>Bl<span>og</span></h3>

            <p class="footer-links">
                <a href="../index.php" class="link-1">Accueil</a>

                <a href="#">Lien 1</a>

                <a href="#">Lien 2</a>

                <a href="#">Mon profil</a>
            </p>

            <p class="footer-company-name">Talland Kevin - Lemaire Xavier © 2020</p>
        </div>

        <div class="footer-center">

            <div>
                <i class="fa fa-map-marker"></i>
                <p><span>16 rue d'Issoudun</span> 45160, Olivet, France</p>
            </div>

            <div>
                <i class="fa fa-phone"></i>
                <p>06 77 16 87 63</p>
            </div>

            <div>
                <i class="fa fa-envelope"></i>
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