<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
</head>
<body>

<form action="/register" method="post">
    <label for="firstname">Prénom:</label>
    <input type="text" id="firstname" name="firstname" required>

    <label for="lastname">Nom:</label>
    <input type="text" id="lastname" name="lastname" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="password">Mot de passe:</label>
    <input type="password" id="password" name="password" required>

    <button type="submit">S'inscrire</button>
</form>

</body>
</html>
