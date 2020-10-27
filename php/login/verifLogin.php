<?php
    session_start();
    date_default_timezone_set('Europe/Paris');
    require_once("./reqLogin.php");
    
    //Si les informations du formulaire ont correctement été récupérées on tente la connexion à la BD
    if (isset($_POST['loginNom'])){
        $nom = htmlentities($_POST['loginNom']);
        $password = md5(htmlentities($_POST['loginPassword']));
        $time = strtotime(date("Y-m-d H:i:s"));
    }
    else if (isset($_POST['signupNom'])){
        $nom = htmlentities($_POST['signupNom']);
        $password = md5(htmlentities($_POST['signupPassword']));
        $password2 = md5(htmlentities($_POST['confirmationPassword']));
        $time = strtotime(date("Y-m-d H:i:s"));
    }

    var_dump($_POST);
       
    //On tente de se connecter à la BD
    if (isset($_POST['loginNom']) || isset($_POST['signupNom'])){
        try {
            $file_db = new PDO('sqlite:../../tmp/films.sqlite');
            $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    
            $listeUsers = getUsers($file_db);
    
            //Si le nom n'est pas répertorié dans la BD, on l'y insère
            if (isset($_POST['signupNom'])){
                if (!in_array($nom, $listeUsers)){
                    inscription($file_db,$nom,$password,$password2,$time);
                } else {
                    header("Location:".$_SERVER['HTTP_REFERER']);
                }
            } 
            //Sinon on connecte l'utilisateur
            else {
                connexion($file_db, $nom, $password, $time);
            }
            
            $file_db=null;
            
        } catch(PDOException $e){
            $e->getMessage();
            //Si la connexion à la BD échoue on le redirige vers une page d'erreur
            header("Location:../error.html");
        }
    
    }
    