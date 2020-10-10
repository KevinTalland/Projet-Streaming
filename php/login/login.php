<?php
    session_start();
    session_destroy();
    session_start();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <section>
        <form action="./verifLogin.php" method="post">
            <label for="loginNom">Nom :</label>
            <input type="text" name='loginNom' required>
            <label for="loginPassword">Password :</label>
            <input type="password" name="loginPassword" required>
            <input type="submit">
        </form>
    </section>
</body>
</html>