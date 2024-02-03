<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../Front-end/Workspace/dist/css/main.css" />
</head>

<body>

<section class="header-contact">
    <div class="container">
        <div class="section-title">
            <div class="tagline">Connect</div>
            <div class="content">
                <div class="short-heading">Get in Touch</div>
                <div class="description">Have any questions or want to collaborate ? We'd love to hear from you!</div>
            </div>
        </div>
        <div class="actions">
            <div class="btn-primary">
                <a href="#contact-us" class="btn">Contact</a>
            </div>
            <div class="btn-secondary">
                <a href="/about" class="btn">Learn more</a>
            </div>
        </div>
    </div>
</section>

<?php include("layout/contact-data.php") ?>

<section class="contact-location">
    <div class="section-title">
        <div class="subheading">Explore</div>
        <div class="content">
            <div class="heading">Locations</div>
            <div class="text">Discover our various locations around the world.</div>
        </div>
    </div>
    <div class="row">
        <div class="column">
            <img class="placeholder-image" src="https://via.placeholder.com/624x384">
            <div class="location-content">
                <div class="heading"><?= $country ?? 'Country' ?></div>
                <div class="text"><?= $adress1 ?? 'Your first adresse here' ?></div>
                <div class="btn">See map</div>
            </div>
        </div>
        <div class="column">
            <img class="placeholder-image" src="https://via.placeholder.com/624x384">
            <div class="location-content">
                <div class="heading"><?= $country ?? 'Country' ?></div>
                <div class="text"><?= $adress1 ?? 'Your first adresse here' ?></div>
                <div class="btn">See map</div>
            </div>
        </div>
    </div>
</section>

<?php include("layout/contact-us.php")?>

<section class="newsletter-signup">
    <div class="newsletter-signup__container">
        <div class="newsletter-signup__content">
            <h2 class="newsletter-signup__heading">Stay Updated with Our Newsletter</h2>
            <p class="newsletter-signup__text">Subscribe to our newsletter for news and event updates</p>
        </div>
        <div class="newsletter-signup__actions">
            <form class="newsletter-signup__form" action="/newsletter-mail">
                <input type="email" placeholder="Your email address" name="newslettermail" class="newsletter-signup__input" required/>
                <button type="submit" class="newsletter-signup__submit">Subscribe</button>
            </form>
            <p class="newsletter-signup__disclaimer">By clicking Sign Up, you confirm your agreement to our Terms and Conditions</p>
        </div>
    </div>
</section>

<?php include("layout/FAQ.php")?>

<br><br>

<?php include("layout/footer.php")?>



</body>
</html>
