<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Configuration</title>
    <style></style>
</head>
<body>

<form action="/saveConfig" method="post">
    <label for="id_primary_font">Police Principale:</label>
    <select id="id_primary_font" name="id_primary_font">
        <?php foreach ($fonts as $font): ?>
            <option value="<?php echo htmlspecialchars($font['id_fonts']); ?>">
                <?php echo htmlspecialchars($font['name']); ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label for="id_secondary_font">Police Secondaire:</label>
    <select id="id_secondary_font" name="id_secondary_font">
        <?php foreach ($fonts as $font): ?>
            <option value="<?php echo htmlspecialchars($font['id_fonts']); ?>">
                <?php echo htmlspecialchars($font['name']); ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label for="primary_color">Couleur Principale:</label>
    <input type="text" id="primary_color" name="primary_color" required>

    <label for="secondary_color">Couleur Secondaire:</label>
    <input type="text" id="secondary_color" name="secondary_color" required>

    <button type="submit">Enregistrer la Configuration</button>
</form>

<div>
    <br>
    <a href="/mypage" target="_blank">Voir ma page</a>
    <br>
    <a href="/logout"> Se déconnecter</a>
</div>

</body>
</html>
