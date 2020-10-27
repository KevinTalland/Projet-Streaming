<?php
date_default_timezone_set('Europe/Paris');
try {
    $file_db = new PDO('sqlite:../tmp/films.sqlite');
    $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

    $file_db->exec("drop table account");
    $file_db->exec("CREATE TABLE account ( 
    idAcc INTEGER PRIMARY KEY,
    nomAcc TEXT,
    passwordAcc TEXT,
    administrateur BOOLEAN,
    timeAcc INTEGER)");

    $insert = "INSERT INTO account (nomAcc, passwordAcc, administrateur, timeAcc)
    VALUES (:nom, :password , 1, :time)";
    $stmt = $file_db->prepare($insert);

    $logAdmin = "root";
    $time = strtotime(date("Y-m-d H:i:s"));

    $stmt->bindParam(':nom', $logAdmin);
    $stmt->bindParam(':password', md5($logAdmin));
    $stmt->bindParam(':time', $time);
    $stmt->execute();

    $file_db = null;
} catch (PDOException $ex) {
    echo $ex->getMessage();
    header("Location:../php/error.html");
}

header("Location: ../index.php");
