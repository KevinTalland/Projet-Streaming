<?php
    session_start();
    session_destroy();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login to KXStreaming</title>
    <link rel="stylesheet" href="../../assets/login.css">
    <link rel="stylesheet" href="../../assets/responsive-login.css">
</head>
<body>
    <section>
        <form action="./verifLogin.php" method="post">
            <div>
                <div>
                    <label for="loginNom">Nom : </label>
                    <input type="text" name='loginNom' required>
                </div>
                <div>
                    <label for="loginPassword">Mot de Passe : </label>
                    <input type="password" name="loginPassword" required>
                </div>
            </div>
            <p><a href='./signup.php'>Pas encore inscrit ? Inscrivez-vous ici !</a></p>
            <div>
                <input type="submit" value="Se connecter">
            </div>
        </form>
    </section>
</body>
</html>