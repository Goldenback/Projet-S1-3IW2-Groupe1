<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Simplify</title>
    <link rel="stylesheet" href="../../../Front-end/Workspace/dist/css/backoffice.css">
</head>
<body>
    
<?php include("Views/_partials/sidebar.php") ?>

<section class="comments-management-container">
    <h2>Gestion des Commentaires</h2>
    <div class="comments-list">


        <!-- Faire une boucle for pour afficher tous les commentaires -->

        <!-- Structure du commentaire -->
        <div class="comment-item">
            <div class="comment-content">
                <!-- Mettre variable php pour les textes -->
                <p class="comment-text"> <?= $comment = "Votre site est incroyable";  ?></p>
                <div class="comment-info">
                    <span class="comment-author">Auteur: <?= $author = "CHANG Toma"; ?></span>
                    <span class="comment-date">Date: <?= $date = "2024-01-31"; ?></span>
                </div>
            </div>
            <div class="comment-actions">
                <button class="btn approve-comment">Approuver</button>
                <button class="btn delete-comment">Supprimer</button>
            </div>
        </div>


    </div>
</section>

</body>
</html>
