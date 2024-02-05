<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Simplify</title>
    <link rel="stylesheet" href="../../../Front-end/Workspace/dist/css/backoffice.css"/>
</head>

<body>

<section class="forgot-password-container">
    <form class="forgot-password-form" action="/forgot-password" method="post">
        <h2 class="forgot-password-title">Mot de passe oublié</h2>

        <div class="error-message <?php echo isset($_SESSION["error_message"]) ? '' : 'hidden'; ?>">
            <?php
            if (isset($_SESSION['error_message'])) {
                echo $_SESSION['error_message'];
                unset($_SESSION['error_message']);
            }
            ?>
        </div>

        <div class="form-group">
            <label for="email">Saisissez votre email :</label>
            <input type="email" id="email" name="email" class="forgot-password-input" required>
        </div>

        <button type="submit" class="forgot-password-button">Réinitialiser le mot de passe</button>

        <div class="login-links">
            <a href="/login" class="login-link">Se connecter</a>
        </div>
    </form>
</section>

</body>
</html>

