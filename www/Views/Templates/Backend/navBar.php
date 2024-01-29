<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../../Front-end/Workspace/dist/css/main.css">
</head>
<body id="body-pd">

<nav class="l-navbar">
    <div class="menu-section">
        <a>Menu</a>
    </div>
    <div class="navbar_toggle"><span class="menu-icon">&#9776;</span></div>

    <br>

    <div>
        <a href="/Config" class="nav_logo">Dashboard &#128200;</a>
    </div>

    <a href="/Config" class="nav_logo">Templating &#9881;</a>

    <a href="/Config" class="nav_logo">Commentaire &#9998;</a>

    <a href="/usermanagement" class="nav_logo">Mes Informations &#128101;</a>

    <a href="/usermanagement" class="nav_logo">Pages &#128196;</a>

    <div class="logout-section">
        <a href="/logout">Se déconnecter</a>
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