<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign up to KXStreaming</title>
    <link rel="stylesheet" href="../../assets/login.css">
</head>
<body>
    <section>
        <form action="./verifLogin.php" method="post">
            <div>
                <label for="signupNom">Nom : </label>
                <input type="text" name="signupNom" required>
            </div>
            <div>
                <label for="signupPassword">Mot de Passe : </label>
                <input type="password" name="signupPassword" required>
            </div>
            <div>
                <label for="signupPassword2">Confirmation : </label>
                <input type="password" name="confirmationPassword" required>
            </div>
            <p><a href='./login.php'>Déjà inscrit ? Connectez-vous ici !</a></p>
            <div>
                <input type="submit" value="S'insrire">
            </div>
        </form>
    </section>
</body>
</html>