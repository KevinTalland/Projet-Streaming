<?php
session_start();
date_default_timezone_set('Europe/Paris');
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KX Proposition</title>
    <link rel="stylesheet" href="../assets/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Cardo:ital,wght@0,400;0,700;1,400&family=Montserrat:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/footer.css">
    <link rel="stylesheet" href="../assets/nav.css">
    <link rel="stylesheet" href="../assets/proposition.css">
    <link rel="stylesheet" href="../assets/form.css">
    <link rel="stylesheet" href="../assets/responsive-footer.css">
    <link rel="stylesheet" href="../assets/responsive-topbar.css">
    <link rel="stylesheet" href="../assets/responsive-prop.css">
    <link rel="shortcut icon" href="../assets/favicon.jpg" type="image/x-icon">
</head>

<body>

    <?php require_once("./components/header.php");
        getHeader("../index.php",$_SERVER['PHP_SELF'],"./gestion.php","./tri/searchFilm.php","./login/login.php");
    ?>

    <div class="banniere"></div>

    <main class="main">


        <?php
            if (isset($_SESSION['nom'])) {
                if (isset($_SESSION['admin'])){
                    require_once('./components/allProposition.php');
                    getProps();
                }
                else {
                    require_once('./components/ajoutFilm.php');
                    getAjoutFilm("Quel film voudriez-vous voir sur notre site ?","./proposition/proposer.php");

                }
            } else {
                echo "<p>Vous avez besoin d'être connecté pour proposer un film !</p>";
            } ?>
    </main>

    <?php require_once("./components/footer.php");
        getFooter("../index.php",$_SERVER['PHP_SELF'],"./gestion.php");
    ?>

</body>

</html>