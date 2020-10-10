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

        </nav>
        <div class="social">
            <a href="#">Profil</a>
            <?php
            if (isset($_SESSION['nom'])) {
                echo "<a href='./login/login.php'>
                    <Button>
                        Déconnexion
                    </Button></a>";
            } else {
                echo "<a href='./login/login.php'>
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

            if ($_SESSION['admin'] == 1) {
        ?>
                <b>Vous disposez de droits administrateurs</b>
                <div><a href='../init/initdbfilm.php'><button>Actualiser la liste des films</button></a></div>
                <div><a href='../init/initdbaccount.php'><button>Réinitialiser la table account</button></a></div>
                <div>
                    <fieldset class="film_suppr">
                        <legend>Formulaire de suppression de film</legend>
                        <form action="supprimer.php" method="post">
                            <div>
                                <label for="suppr">Quel film souhaitez-vous supprimer ?</label>
                                <input type="text" name="suppr">
                            </div>
                            <div>
                                <input type="submit">
                            </div>
                        </form>
                    </fieldset>
                </div>
                <div>
                    <fieldset class="film_add">
                        <legend>Formulaire d'ajout de film</legend>
                        <form action="ajouter.php" method="post">
                            <div>
                                <label for="titreFilm">Quel film souhaitez-vous ajouter ?</label>
                                <input type="text" name="titreFilm" required>
                            </div>
                            <div>
                                <label for="nomCreateur">Qui est le réalisateur du film ?</label>
                                <input type="text" name="nomCreateur" required>
                            </div>
                            <div>
                                <label for="anneeFilm">Sélectionner la date de sortie du film :</label>
                                <input type="date" name="anneeFilm" required>
                            </div>
                            <div>
                                <label for="genreFilm">Quel genre de film est-ce ?</label>
                                <input type="text" name="genreFilm" required>
                            </div>
                            <div>
                                <label for="dureeFilm">Quelle est la durée en minutes du film ?</label>
                                <input type="number" name="dureeFilm" required>
                            </div>
                            <div>
                                <label for="descriptionFilm">Quel est le synopsis de ce film ?</label>
                                <textarea type="text" rows="2" cols="100" name="descriptionFilm" required></textarea>
                            </div>
                            <div>
                                <label for="afficheFilm">Quelle est l'affiche du film ? (rentrez l'url de l'image)</label>
                                <textarea type="text" rows="2" cols="100" name="afficheFilm" required></textarea>
                            </div>
                            <div>
                                <input type="submit">
                            </div>
                        </form>
                    </fieldset>
                </div>
        <?php
            }
            echo "<p><i>Dernière connexion le " . date("d-m-Y à H:i", $_SESSION['time']) . "</i></p>";
        }
        ?>

    </main>

    <footer class='footer'>

        <div class='footer-left'>

            <h3>KX<span>Streaming</span></h3>

            <p class='footer-links'>
                <a href="../index.php" class="link-1">Accueil</a>

                <a href="#">Lien 1</a>

                <a href="#">Lien 2</a>

                <a href="#">Profil</a>
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