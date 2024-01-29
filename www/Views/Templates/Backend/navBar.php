<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Back-Office</title>
    <link rel="stylesheet" href="../../../Front-end/Workspace/dist/css/main.css">
</head>

<body id="body">

<nav class="l-navbar">
    <div id="menu-toggle" class="navbar_toggle">
        <span class="menu-icon">&#9776;</span>
    </div>

    <div class="nav-item">
        <a href="/Config" class="nav-link">
            <span class="nav-icon">&#128200;</span>
            <span class="nav-text">Dashboard</span>
        </a>
    </div>

    <div class="nav-item">
        <a href="templates" class="nav-link">
            <span class="nav-icon">&#128194;</span>
            <span class="nav-text">Templating</span>
        </a>
    </div>

    <div class="nav-item">
        <a href="/comments" class="nav-link">
            <span class="nav-icon">&#128203;</span>
            <span class="nav-text">Commentaire</span>
        </a>
    </div>

    <div class="nav-item">
        <a href="/usermanagement" class="nav-link">
            <span class="nav-icon">&#128209;</span>
            <span class="nav-text">Mes Informations</span>
        </a>
    </div>

    <div class="nav-item">
        <a href="/mypage" target="blank" class="nav-link">
            <span class="nav-icon">&#128221;</span>
            <span class="nav-text">Pages</span>
        </a>
    </div>

    <div class="logout-section nav-item">
        <hr>
        <a href="/logout" class="nav-link">
            <span class="nav-icon">&#128244;</span>
            <span class="nav-text">Se déconnecter</span>
        </a>
    </div>
</nav>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        var navbarToggle = document.querySelector('.navbar_toggle');
        var navbar = document.querySelector('.l-navbar');

        navbarToggle.addEventListener('click', function () {
            navbar.classList.toggle('active');
        });
    });
</script>

</body>
</html>