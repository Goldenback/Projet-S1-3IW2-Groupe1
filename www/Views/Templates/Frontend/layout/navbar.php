<nav class="navbar" style="background-color: <?= $backgroundColor ?? 'white' ?> ">
    <div class="container">
        <h2 class="navbar-title">
            <?= $urlLogo ?? 'Logo'?>
        </h2>
        <ul class="navbar-links">
            <li>
                <a href="/about">About Us</a>
            </li>
            <li>
                <a href="/portfolio">Portfolio</a>
            </li>
            <li>
                <a href="/project">Projects</a>
            </li>
            <li>
                <a href="/service">Services</a>
            </li>
        </ul>
        <a href="/contact" class="btn">Contact</a>
    </div>
    <hr>
</nav>

