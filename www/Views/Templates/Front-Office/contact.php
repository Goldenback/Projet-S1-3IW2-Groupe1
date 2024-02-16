<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../Front-end/Workspace/dist/css/main.css" />
</head>

<body>

<?php include("layout/navbar.php") ?>

<section class="contact-header">
    <div class="container">
        <div class="section-title">
            <p class="tagline">Connect</p>
            <h2 class="short-heading-here">Get in Touch</h2>
            <p class="text">Have any questions or want to collaborate? We'd love to hear from you!</p>
        </div>
        <div class="actions">
            <a href="#contact-us" class="Button Primary">Contact</a>
            <a href="/about" class="Button Secondary">Learn More</a>
        </div>
    </div>
</section>

<?php include("layout/contact-data.php") ?>

<section class="contact-map">
    <div class="section-title">
        <h2 class="subheading">Explore</h2>
        <h1 class="heading">Locations</h1>
        <p class="text">Discover our various locations around the world.</p>
    </div>
    <div class="row">
        <div class="column">
            <img class="img" src="../../../Front-end/Workspace/assets/img/page-contact/sydney.png" alt="Sydney">
            <div class="content">
                <h3 class="heading">Sydney</h3>
                <p class="text">123 Main St, Sydney NSW 2000, Australia</p>
                <a href="#" class="Button Primary">More Info</a>
            </div>
        </div>
        <div class="column">
            <img class="img" src="../../../Front-end/Workspace/assets/img/page-contact/NewYork.png" alt="New York">
            <div class="content">
                <h3 class="heading">New York</h3>
                <p class="text">123 Broadway, New York, NY 10000, USA</p>
                <a href="#" class="Button Primary">More Info</a>
            </div>
        </div>
    </div>
</section>

<?php include("layout/contact-us.php") ?>

<div class="contact-cta">
    <div class="container">
        <div class="content">
            <h2 class="heading">Stay Updated with Our Newsletter</h2>
            <p class="text">Subscribe to our newsletter for news and event updates</p>
        </div>
        <div class="actions">
            <form class="form" action="/newsletter" method="post">
                <label>
                    <input type="email" placeholder="Your email address" class="text-input" />
                </label>
                <button type="submit" class="subscribe-button">Subscribe</button>
            </form>
            <p class="terms">By clicking Subscribe, you confirm your agreement to our Terms and Conditions.</p>
        </div>
    </div>
</div>

<?php include("layout/FAQ.php") ?>

<?php include("layout/footer.php") ?>

</body>
</html>
