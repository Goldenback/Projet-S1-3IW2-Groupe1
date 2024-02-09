<nav class="navbar">
    <div class="container">
        <div class="logo-container">
          <a href="/">
            <img class="logo" src="../../../Front-end/Workspace/assets/img/logo/simplify.png">
          </a>
        </div>
        <ul class="navbar-links">
            <li>
                <a href="/about">About Us</a>
            </li>
            <li>
                <a href="/portfolio">Portfolio</a>
            </li>
            <li>
                <a href="/service">Services</a>
            </li>
            <li class="more">More
                <ul class="dropdown-content">
                    <li><a href="/project">Projects</a></li>
                    <li><a href="/register">Sign Up</a></li>
                </ul>
            </li>
        </ul>
        <a href="/contact" class="btn">Contact</a>
    </div>
    <div class="line"></div>
</nav>
<script>
  document.addEventListener('DOMContentLoaded', () => {
  const moreButton = document.querySelector('.navbar-links .more');
  moreButton.addEventListener('click', function() {
    this.querySelector('.dropdown-content').classList.toggle('show');
  });
});

</script>