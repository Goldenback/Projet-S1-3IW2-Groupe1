<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>User management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../assets/dist/css/backoffice.css">
</head>
<body>

<?php include("Views/_partials/sidebar.php") ?>

<section class="container-flex">
    <div class="user-info-container">
        <h2>Gestion de Mes Informations</h2>
        <div class="user-info-form">
            <form action="/updateUserInfo" method="POST">
                <div class="form-group">
                    <label for="firstname">Prénom:</label>
                    <input type="text" id="firstname" name="firstname" value="<?= $firstname = "" ?>">
                </div>
                <div class="form-group">
                    <label for="lastname">Nom:</label>
                    <input type="text" id="lastname" name="lastname" value="<?= $lastname = "" ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?= $email = "" ?>">
                </div>
                <!-- Autres champs si nécessaire -->
                <button type="submit" class="btn-update">Mettre à jour</button>
            </form>
        </div>
    </div>

    <div class="password-update-container">
        <h2>Mettre à Jour le Mot de Passe</h2>
        <div class="password-update-form">
            <form action="/update-password" method="POST">

                <div class="error-message <?php echo isset($_SESSION["error_message"]) ? '' : 'hidden'; ?>">
                    <?php
                    if (isset($_SESSION['error_message'])) {
                        echo $_SESSION['error_message'];
                        unset($_SESSION['error_message']);
                    }
                    ?>
                </div>
                <div class="success-message <?php echo isset($_SESSION["success_message"]) ? '' : 'hidden'; ?>">
                    <?php
                    if (isset($_SESSION['success_message'])) {
                        echo $_SESSION['success_message'];
                        unset($_SESSION['success_message']);
                    }
                    ?>
                </div>

                <div class="form-group">
                    <label for="currentPassword">Mot de Passe Actuel:</label>
                    <input type="password" id="currentPassword" name="currentPassword" >
                </div>
                <div class="form-group">
                    <label for="newPassword">Nouveau Mot de Passe:</label>
                    <input type="password" id="newPassword" name="newPassword" >
                </div>
                <div class="form-group">
                    <label for="confirmPassword">Confirmer Nouveau Mot de Passe:</label>
                    <input type="password" id="confirmPassword" name="confirmPassword" >
                </div>
                <button type="submit" class="btn-update">Mettre à Jour</button>
            </form>
        </div>
    </div>
</section>

</body>
</html>
