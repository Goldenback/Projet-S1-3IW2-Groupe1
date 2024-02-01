<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="../../../Front-end/Workspace/dist/css/backoffice.css">
</head>
<body>

<section class="login-container">
    <form class="login-form" action="/login" method="post">
        <h2 class="login-title">Connexion</h2>

        <div class="error-message <?php echo isset($_SESSION["error_message"]) ? '' : 'hidden'; ?>">
            <?php
            if (isset($_SESSION['error_message'])) {
                echo $_SESSION['error_message'];
                unset($_SESSION['error_message']);
            }
            ?>
            <br>
        </div>

        <div class="success-message <?php echo isset($_SESSION["success_message"]) ? '' : 'hidden'; ?>">
            <?php
            if (isset($_SESSION['success_message'])) {
                echo $_SESSION['success_message'];
                unset($_SESSION['success_message']);
            }
            ?>
            <br>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="login-input" required>
        </div>

        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" class="login-input" required>
        </div>

        <button type="submit" class="login-button">Se connecter</button>

        <div class="login-links">
            <a href="/register" class="login-link">Pas de compte ? S'inscrire</a>
            <a href="/forgot-password" class="login-link">Mot de passe oublié ?</a>
        </div>
    </form>
</section>

</body>
</html>
