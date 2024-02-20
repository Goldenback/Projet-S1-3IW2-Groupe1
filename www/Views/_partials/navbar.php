<nav class="navbar" style="background-color: <?= $backgroundColor ?? 'white' ?> ">
    <div class="container">
        <ul class="navbar-links">
            <li>
                <a href="/home">Accueil</a>
            </li>
            <li>
                <a href="/about">À propos</a>
            </li>
            <li>
                <a href="/projects">Les projets</a>
            </li>
            <li>
                <a href="/contact">Contact</a>
            </li>
            <li>
                <a href="/home/settings">Paramètres</a>
            </li>
        </ul>
        <a href="/login" class="btn btn-primary">Se connecter</a>
    </div>
    <hr>
</nav>