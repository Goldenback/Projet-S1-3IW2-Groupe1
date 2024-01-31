<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="../../../Front-end/Workspace/dist/css/backoffice.css"/>
</head>
<body>

<section class="register-container">
    <form class="register-form" action="/register" method="post" id="registerForm">
        <h2 class="register-title">Inscription</h2>

        <div id="error-message" class="error-message"></div>

        <div class="form-group">
            <label for="firstname" class="form-label">Prénom :</label>
            <input type="text" id="firstname" name="firstname" class="register-input" required>
        </div>

        <div class="form-group">
            <label for="lastname" class="form-label">Nom :</label>
            <input type="text" name="lastname" id="lastname" class="register-input" required>
        </div>

        <div class="form-group">
            <label for="email" class="form-label">Email :</label>
            <input type="email" id = "email" name = "email" class="register-input" required>
        </div>

        <div class="form-group">
            <label for="password" class="form-label">Mot de passe :</label>
            <input type="password" id="password" name="password" class="register-input" required>
        </div>

        <div class="form-group">
            <button type="submit" class="register-button"> S'inscrire </button>
        </div>

        <div class="register-links">
            <a href="/login" class="login-link">Se connecter</a>
        </div>

    </form>
</section>

<script>
    document.getElementById('registerForm').addEventListener('submit', function(event) {
        event.preventDefault();

        let hasError = false;
        const errorMessage = document.getElementById('error-message');
        errorMessage.classList.add('hidden');
        errorMessage.innerHTML = '';

        const firstname = document.getElementById('firstname').value;
        const lastname = document.getElementById('lastname').value;
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;

        if (!firstname || !lastname || !email || !password) {
            errorMessage.innerHTML += 'un ou plusieurs champs sont manquant.<br>';
            hasError = true;
        }

        // Basic email validation
        if (email && !email.includes('@')) {
            errorMessage.innerHTML += 'Adresse email invalide.<br>';
            hasError = true;
        }

        // Password length validation
        if (password && password.length < 8) {
            errorMessage.innerHTML += 'Mot de passe nécessite 8 caractères minimum. <br>';
            hasError = true;
        }

        if (!hasError) {
            this.submit();
        } else {
            errorMessage.classList.remove('hidden');
        }
    });
</script>

</body>
</html>
