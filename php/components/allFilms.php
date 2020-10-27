<?php
function getAllFilms()
{
    $allFilms = "<h3>Notre sélection de films</h3>";
    try {
        $file_db = new PDO('sqlite:./tmp/films.sqlite');
        $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

        $result = tri($file_db);

        if (isset($_SESSION["triGenre"])) {
            $allFilms .= $result;
            unset($_SESSION["triGenre"]);
        } else {
            foreach ($result as $r) {
                $format = getTitleFormat($r['titreFilm']);
                $allFilms .= "
                    <div class='article'>
                    <a href=\"" . $_SERVER['PHP_SELF'] . "?film=" . $format . "\">
                    <img class='affiche' src='" . $r["afficheFilm"] . "' alt='affiche de " . $r["titreFilm"] . "'/>
                    <span> " . $r["titreFilm"] . "</span></a></div>";
            }
        }


        $file_db = null;
    } catch (PDOException $ex) {
        echo $ex->getMessage();
        header("Location:../error.html");
    }
    echo $allFilms;
}
