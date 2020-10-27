<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
date_default_timezone_set('Europe/Paris');
require_once("./php/tri/triFunction.php");
require_once("./php/components/format.php");
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KXStreaming</title>
    <link href="https://fonts.googleapis.com/css2?family=Cardo:ital,wght@0,400;0,700;1,400&family=Montserrat:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/footer.css">
    <link rel="stylesheet" href="./assets/nav.css">
    <link rel="stylesheet" href="./assets/style.css">
    <link rel="stylesheet" href="./assets/generate.css">
    <link rel="stylesheet" href="./assets/form.css">
    <link rel="stylesheet" href="./assets/responsive-index.css">
    <link rel="stylesheet" href="./assets/responsive-footer.css">
    <link rel="stylesheet" href="./assets/responsive-topbar.css">
    <link rel="shortcut icon" href="./assets/favicon.jpg" type="image/x-icon">
</head>

<body>
    
    <?php
        require_once("./php/components/header.php");
        getHeader($_SERVER['PHP_SELF'],"./php/proposition.php","./php/gestion.php", "./php/tri/searchFilm.php", "./php/login/login.php");
    ?>

    <div class="banniere"></div>

    <section>
        <?php
        if (!isset($_GET['film'])){ 
            require_once("./php/components/allFilms.php");
            getAllFilms();
        } else {
            require_once("./php/components/eachFilms.php");
            echo "<div class='generate'>";
            getEachFilm();
            echo "</div>";
        }
        ?>

    </section>
    
    <?php require_once("./php/components/tri.php"); ?>

    <?php 
        require_once("./php/components/footer.php"); 
        getFooter($_SERVER['PHP_SELF'],"./php/proposition.php","./php/gestion.php");
    ?>


</body>

</html>