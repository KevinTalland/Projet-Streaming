<?php 
function getAjoutFilm($legend,$lienForm)
{
    $ajoutFilm = "<div>
                    <fieldset class='film_add'>
                        <legend>". $legend ."</legend>
                        <form action='" . $lienForm ."' method='post'>
                        <div>
                            <div>
                                <div>
                                    <label for='titreFilm'>Quel est le titre du film ?</label>
                                    <p><input type='text' name='titreFilm' required></p>
                                </div>
                                <div>
                                    <label for='nomCreateur'>Qui est le réalisateur ?</label>
                                    <p><input type='text' name='nomCreateur' required></p>
                                </div>
                            </div>
                            <div>
                                <div>
                                    <label for='genreFilm'>Quel genre de film est-ce ?</label>
                                    <p><input type='text' name='genreFilm' required></p>
                                </div>
                                <div>
                                    <label for='dureeFilm'>Quelle est la durée en minutes du film ?</label>
                                    <p><input type='number' min='0' name='dureeFilm' required></p>
                                </div>
                            </div>
                        </div>
                            
                        <div>
                            <label for='anneeFilm'>Sélectionner la date de sortie du film :</label>
                            <p><input type='date' name='anneeFilm' required></p>
                        </div>
                        <div>
                            <div>
                                <label for='descriptionFilm'>Quel est le synopsis de ce film ?</label>
                                <p><textarea type='text' rows='3' cols='100' name='descriptionFilm' size='1000' required></textarea></p>
                            </div>
                            <div>
                                <label for='afficheFilm'>Quelle est l'affiche du film ? (rentrez l'url de l'image)</label>
                                <p><textarea type='text' rows='3' cols='100' name='afficheFilm' required></textarea></p>
                            </div>
                        </div>";
    if (!isset($_SESSION['admin'])) {
        $ajoutFilm .= "<p class='ajout-form-p'>Merci à vous ! Ces informations vont être traitées par un administrateur et votre film sera ajouté prochainement !</p>";
    }
    $ajoutFilm .= "
                            <div>
                                <button type='submit'>Valider</button>
                            </div>
                        </form>
                    </fieldset>
                </div>";
    echo $ajoutFilm;
}