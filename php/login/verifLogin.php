<?php
    session_start();
    date_default_timezone_set('Europe/Paris');
    
    //Si les informations du formulaire ont correctement été récupérées on tente la connexion à la BD
    if (isset($_POST['loginNom'])){
        $nom = htmlentities($_POST['loginNom']);
        $password = htmlentities($_POST['loginPassword']);
        $time = strtotime(date("Y-m-d H:i:s"));
    }
       
    //On tente de se connecter à la BD
    try {
        $file_db = new PDO('sqlite:../../tmp/films.sqlite');
        $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

        //On récolte les noms utilisateurs
        $verif = 'SELECT nomAcc FROM account';
        $res = $file_db->query($verif);
        $listeUsers = array();
        foreach ($res as $n){
            array_push($listeUsers, $n['nomAcc']);
        }

        if (isset($nom)){
            //Si le nom n'est pas répertorié dans la BD, on l'y insère
            if (!in_array($nom, $listeUsers)){
                $insert = 'INSERT INTO account (nomAcc, passwordAcc, timeAcc) VALUES (:nom, :password, :time)';
                $stmt = $file_db->prepare($insert);
                $stmt->error_log;
    
                $stmt->bindParam(":nom",$nom,PDO::PARAM_STR);
                $stmt->bindParam(":password",md5($password),PDO::PARAM_STR);
                $stmt->bindParam(":time",$time,PDO::PARAM_INT);
                $stmt->execute();
                header("Location:../../index.php");
            } 
            //Sinon on verifie que le mot de passe correspond au nom saisi
            else {
                $mdp = 'select passwordAcc from account where nomAcc=:nom';
                $stmt = $file_db->prepare($mdp);
                $stmt->bindParam(":nom",$nom, PDO::PARAM_STR);
                $stmt->execute();
                $res = $stmt->fetchColumn();

                //Si le mdp saisi est correct, on autorise la connexion
                if ($res == md5($password)){
                    $update = 'UPDATE account SET timeAcc=:time where nomAcc=:nom';
                    $stmt = $file_db->prepare($update);
                    $stmt->bindParam(":nom",$nom, PDO::PARAM_STR);
                    $stmt->bindParam(":time",$time, PDO::PARAM_INT);
                    $stmt->execute();

                    $admin = "SELECT administrateur from account where nomAcc=:nom";
                    $stmt = $file_db->prepare($admin);
                    $stmt->bindParam(":nom",$nom,PDO::PARAM_STR);
                    $stmt->execute();
                    $res = $stmt->fetchColumn();

                    //Si la personne est administrateur
                    if ($res == 1){
                        $_SESSION['admin'] = 1;
                    }
                    
                    $_SESSION['nom'] = $nom;
                    $_SESSION['time'] = $time;

                    header("Location:../../index.php");
                }
                //Sinon il doit recommencer
                else {
                    header("Location:./login.php");
                }
                
            }
        }
        

        $file_db=null;
    } catch(PDOException $e){
        $e->getMessage();
        //Si la connexion à la BD échoue on le redirige vers une page d'erreur
        header("Location:../error.html");
    }
