<?php 
    function tri($file_db){
        $result = $file_db->query('SELECT * from films');
        if (isset($_SESSION["tridate"])){
            $result = $file_db->query('SELECT * from films order by anneeFilm');
            unset($_SESSION["tridate"]);
        } elseif (isset($_SESSION["triAZ"])){
            $result = $file_db->query('SELECT * from films order by titreFilm');
            unset($_SESSION["triAZ"]);
        } elseif (isset($_SESSION["triZA"])) {
            $result = $file_db->query('SELECT * from films order by titreFilm desc');
            unset($_SESSION["triZA"]);
        } elseif (isset($_SESSION["triGenre"])) {
            $result = $file_db->query('SELECT * from films order by genreFilm');
            unset($_SESSION["triGenre"]);
        }
        return $result;
    }