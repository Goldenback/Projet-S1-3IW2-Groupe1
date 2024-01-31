<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Informations Personnelles</title>
    <link rel="stylesheet" href="../../../Front-end/Workspace/dist/css/backoffice.css">
</head>
<body>

<section class="container-flex">
    <div class="user-info-container">
        <h2>Gestion de Mes Informations</h2>
        <div class="user-info-form">
            <form action="/updateUserInfo" method="POST">
                <div class="form-group">
                    <label for="firstname">Prénom:</label>
                    <input type="text" id="firstname" name="firstname" value="<?= $firstname = "Toma" ?>">
                </div>
                <div class="form-group">
                    <label for="lastname">Nom:</label>
                    <input type="text" id="lastname" name="lastname" value="<?= $lastname = "CHANG" ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?= $email = "email@gmail.com" ?>">
                </div>
                <!-- Autres champs si nécessaire -->
                <button type="submit" class="btn-update">Mettre à jour</button>
            </form>
        </div>
    </div>

    <div class="password-update-container">
        <h2>Mettre à Jour le Mot de Passe</h2>
        <div class="password-update-form">
            <form action="/updatePassword" method="POST">
                <div class="form-group">
                    <label for="currentPassword">Mot de Passe Actuel:</label>
                    <input type="password" id="currentPassword" name="currentPassword" required>
                </div>
                <div class="form-group">
                    <label for="newPassword">Nouveau Mot de Passe:</label>
                    <input type="password" id="newPassword" name="newPassword" required>
                </div>
                <div class="form-group">
                    <label for="confirmPassword">Confirmer Nouveau Mot de Passe:</label>
                    <input type="password" id="confirmPassword" name="confirmPassword" required>
                </div>
                <button type="submit" class="btn-update">Mettre à Jour</button>
            </form>
        </div>
    </div>
</section>

</body>
</html>
