<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Back Office</title>
    <link rel="stylesheet" href="../../../Front-end/Workspace/dist/css/main.css">
</head>
<body>

<section class="user-management-container">
    <h2>Gestion de l'Utilisateur</h2>
    <form class="user-info-form">
        <div class="form-group">
            <label for="username">Nom d'utilisateur:</label>
            <input type="text" id="username" name="username">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email">
        </div>
        <div class="form-group">
            <label for="password">Mot de passe:</label>
            <input type="password" id="password" name="password">
        </div>
        <div class="form-group">
            <label for="role">Rôle:</label>
            <select id="role" name="role">
                <option value="admin">Administrateur</option>
                <option value="editor">Éditeur</option>
                <option value="user">Utilisateur</option>
            </select>
        </div>
        <button type="submit">Mettre à jour</button>
    </form>
</section>
</body>
</html>
