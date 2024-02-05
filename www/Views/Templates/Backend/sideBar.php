<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Back-Office</title>
    <link rel="stylesheet" href="../../../Front-end/Workspace/dist/css/backoffice.css">
</head>

<body id="body" class="sidebar">

<nav class="l-sidebar">
    <div id="menu-toggle" class="sidebar_toggle">
        <span class="menu-icon">&#9776;</span>
    </div>

    <div class="side-item">
        <a href="/config" class="side-link">
            <span class="side-icon">&#128221;</span>
            <span class="side-text">Configuration</span>
        </a>
    </div>

    <div class="side-item">
        <a href="/templates" class="side-link">
            <span class="side-icon">&#128194;</span>
            <span class="side-text">Template</span>
        </a>
    </div>

    <div class="side-item">
        <a href="/comments" class="side-link">
            <span class="side-icon">&#128203;</span>
            <span class="side-text">Commentaire</span>
        </a>
    </div>

    <div class="side-item">
        <a href="/user_management" class="side-link">
            <span class="side-icon">&#128209;</span>
            <span class="side-text">Mes Informations</span>
        </a>
    </div>

    <div class="logout-section side-item">
        <hr>
        <a href="/logout" class="side-link">
            <span class="side-icon">&#128244;</span>
            <span class="side-text">Se déconnecter</span>
        </a>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var sidebarToggle = document.querySelector('.sidebar_toggle');
        var body = document.querySelector('body');

        sidebarToggle.addEventListener('click', function () {
            document.querySelector('.l-sidebar').classList.toggle('active');
            body.classList.toggle('sidebar-active');
        });
    });
</script>

</body>
</html>
