<?php
session_start();
date_default_timezone_set('Europe/Paris');
if (!isset($_SESSION['admin'])){
    header("Location:".$_SERVER['HTTP_REFERER']);
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KX Gestion</title>
    <link rel="stylesheet" href="../assets/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Cardo:ital,wght@0,400;0,700;1,400&family=Montserrat:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/footer.css">
    <link rel="stylesheet" href="../assets/nav.css">
    <link rel="stylesheet" href="../assets/form.css">
    <link rel="shortcut icon" href="../assets/favicon.jpg" type="image/x-icon">
</head>

<body>

    <?php require_once("./components/header.php");
        getHeader("../index.php","./proposition.php",$_SERVER['PHP_SELF'],"./tri/searchFilm.php","./login/login.php");
    ?>

    <div class="banniere"></div>

    <main class="main">


        <?php
        if (isset($_SESSION['nom'])) {
            echo "<h3>Vous êtes connectés en tant que " . $_SESSION['nom'] . "</h3>";

            if (isset($_SESSION['admin'])) {
        ?>
                <b>Vous disposez de droits administrateurs</b>
                <div class='admin-buttons'>
                    <div><a href='../init/initdbfilm.php'><button>Remettre les films de base</button></a></div>
                    <div><a href='../init/initdbaccount.php'><button>Effacer tous les comptes enregistrés</button></a></div>
                    <div><a href='../init/initdbprop.php'><button>Effacer les propositions</button></a></div>
                </div>
                
                
            <?php
                require_once('./components/ajoutFilm.php');
                getAjoutFilm("Formulaire d'ajout de film","./ajouter.php");
                
            }
            echo "<p><i>Dernière connexion le " . date("d-m-Y à H:i", $_SESSION['time']) . "</i></p>";
        }
        ?>

    </main>

    <?php require_once("./components/footer.php");
        getFooter("../index.php","./proposition.php",$_SERVER['PHP_SELF']);
    ?>

</body>

</html>