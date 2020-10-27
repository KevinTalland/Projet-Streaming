<?php
date_default_timezone_set('Europe/Paris');

function getProps()
{
    try {
        $file_db = new PDO('sqlite:../tmp/films.sqlite');
        $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

        $req = "SELECT * FROM proposition";
        $get = $file_db->query($req);

        $prop = '';
        foreach ($get as $g) {
            $query = "select nomAcc from account where idAcc=:id";
            $stmt = $file_db->prepare($query);
            $stmt->bindParam(":id", $nom, PDO::PARAM_STR);
            $nom = $g['idAcc'];
            $stmt->execute();
            $nom = $stmt->fetchColumn();

            $mins = $g['dureeFilm'] % 60;
            $hours = floor($g['dureeFilm']) / 60;

            $prop .= "
            <div class='proposition'>
                <div>
                    <div>
                        <h3>" . $nom . " a proposé :</h3>
                        <p>" . $g['titreFilm'] . "</p>
                    </div>
                    <div class='proposition-info'>
                        <img class='affiche' src='" . $g["afficheFilm"] . "' alt='affiche de " . $g["titreFilm"] . "'/>
                        <ul>
                            <li>" . $g['nomCreateur'] . "</li>
                            <li>" . $g['genreFilm'] . "</li>
                            <li>" . date('d/m/Y', $g['anneeFilm']) . "</li>
                            <li>" . sprintf('%2dh%02d', $hours, $mins) . "</li>
                        </ul>
                    </div>
                </div>
                <div>" . $g['descriptionFilm'] . "</div>
                <div>
                    <form action='./gererProp.php' method='post'>
                        <button type='submit'>Accepter</button>
                        <input type='hidden' name='titre' value='" . $g['titreFilm'] . "'>
                        <input type='hidden' name='nom' value='" . $nom . "'>
                        <button type='submit' name='refus'>Refuser</>
                    </form>          
                </div>
            </div>";
        }

        $file_db = null;
    } catch (PDOException $ex) {
        echo $ex->getMessage();
        header("Location:./error.html");
    }
    echo $prop;
}
