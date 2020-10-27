<?php
require_once("./php/components/modifications.php");
require_once("./php/components/detailsFilm.php");

function getEachFilm(){
    $eachFilm = "";
    try {
        $file_db = new PDO('sqlite:./tmp/films.sqlite');
        $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

        $req = "SELECT * FROM films WHERE titreFilmURL=:titreFilm";
        $stmt = $file_db->prepare($req);
            
        $t = $_GET['film'];
        $stmt->bindParam(':titreFilm', $t, PDO::PARAM_STR);
                
        $stmt->execute();
        $result = $stmt->fetchAll();

        foreach ($result as $r) {
            $mins = $r['dureeFilm']%60;
            $hours = floor($r['dureeFilm'])/60;

            $titre = $r['titreFilm'];
            $createur = $r['nomCreateur'];
            $annee = date('d/m/Y', $r['anneeFilm']);
            $genre = $r['genreFilm'];
            $description = $r['descriptionFilm'];
            $affiche = $r['afficheFilm'];
            $duree = sprintf('%2dh%02d',$hours,$mins);
        }

    } catch (PDOException $ex) {
        echo $ex->getMessage();
        header("Location:../error.html");
    }

    if (isset($_SESSION['modif'])) {
        $_SESSION['titreFilm'] = $titre;
    }

    if (isset($_SESSION['admin']) and !isset($_SESSION['modif'])) {

    $eachFilm .= "
    <a href='./php/modifCall.php'>
        <button>Modifier</button>
    </a> ";

    } elseif (isset($_SESSION['admin']) and isset($_SESSION['modif'])) {
        $eachFilm .= getSupprButton();
    } 

    $eachFilm .= getDetailsFilm($titre,$createur,$annee,$genre,$description,$affiche,$duree);

    echo $eachFilm;
}
