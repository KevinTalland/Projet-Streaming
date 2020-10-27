<?php 

function getUsers($db){
    //On récolte les noms utilisateurs
    $verif = 'SELECT nomAcc FROM account';
    $res = $db->query($verif);
    $listeUsers = array();
    foreach ($res as $n){
        array_push($listeUsers, $n['nomAcc']);
    }
    return $listeUsers;
}

function inscription($db, $nom, $password,$password2, $time){
    if ($password === $password2){
        $insert = 'INSERT INTO account (nomAcc, passwordAcc, timeAcc, administrateur) VALUES (:nom, :password, :time, 0)';
        $stmt = $db->prepare($insert);

        $stmt->bindParam(":nom",$nom,PDO::PARAM_STR);
        $stmt->bindParam(":password",$password);
        $stmt->bindParam(":time",$time,PDO::PARAM_INT);
        $stmt->execute();
        
        header("Location:./login.php");
    }
    else {
        header("Location:".$_SERVER['PHP_REFERER']);
    }
}

function connexion($db, $nom, $password, $time)
{
    $mdp = 'select passwordAcc from account where nomAcc=:nom';
    $stmt = $db->prepare($mdp);
    $stmt->bindParam(":nom", $nom, PDO::PARAM_STR);
    $stmt->execute();
    $res = $stmt->fetchColumn();

    //Si le mdp saisi est correct, on autorise la connexion
    if ($res == $password) {
        $update = 'UPDATE account SET timeAcc=:time where nomAcc=:nom';
        $stmt = $db->prepare($update);
        $stmt->bindParam(":nom", $nom, PDO::PARAM_STR);
        $stmt->bindParam(":time", $time, PDO::PARAM_INT);
        $stmt->execute();

        $admin = "SELECT administrateur from account where nomAcc=:nom";
        $stmt = $db->prepare($admin);
        $stmt->bindParam(":nom", $nom, PDO::PARAM_STR);
        $stmt->execute();
        $res = $stmt->fetchColumn();

        //Si la personne est administrateur
        if ($res == 1) {
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