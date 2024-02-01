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
                <a href="/contact" class="btn">Contact</a>
            </div>
            <div class="btn-secondary">
                <a href="/about" class="btn">Learn more</a>
            </div>
        </div>
    </div>
</section>

<section class="contact-menu">
    <div class="row">
        <div class="content">
            <div class="icon-envelope">
                <div class="icon">&#128231;</div>
            </div>
            <div class="contact-info">
                <div class="content">
                    <div class="heading">Email</div>
                    <div class="text"><?= $emailDesc ?? "your email description here" ?></div>
                </div>
                <div class="link"> <?= $email ?? 'exemple@mymail.com' ?> </div>
            </div>
        </div>
        <div class="content">
            <div class="icon-phone">
                <div class="icon">&#128222;</div>
            </div>
            <div class="contact-info">
                <div class="content">
                    <div class="heading">Phone</div>
                    <div class="text"><?= $phoneDesc ?? 'Your phone description here' ?></div>
                </div>
                <div class="link"><?= $phoneNumber ?? '+ 01 02 03 04 05' ?></div>
            </div>
        </div>
        <div class="content">
            <div class="icon-map">
                <div class="icon">&#128188;</div>
            </div>
            <div class="contact-info">
                <div class="content">
                    <div class="heading">Office</div>
                    <div class="text"><?= $officeDesc ?? "your adresse description here" ?></div>
                </div>
                <div class="link"><?= $officeAdresse ?? 'your adresse' ?></div>
            </div>
        </div>
    </div>
</section>

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

<section class="contact-us">
    <div class="section-title">
        <div class="content">
            <div class="heading">Contact us</div>
            <div class="tagline">Get in touch</div>
            <div class="text">Have a question or need assistance ? Fill out the form below.</div>
        </div>
    </div>

    <form class="form" action="/sendMessage">

        <div class="inputs">
            <div class="input">
                <label for="first-name">First name</label>
                <input type="text" id="first-name" placeholder="Placeholder">
            </div>
            <div class="input">
                <label for="last-name">Last name</label>
                <input type="text" id="last-name" placeholder="Placeholder">
            </div>
        </div>

        <div class="inputs">
            <div class="input">
                <label for="email">Email</label>
                <input type="email" id="email" placeholder="Placeholder">
            </div>
            <div class="input">
                <label for="phone">Phone number</label>
                <input type="tel" id="phone" placeholder="Placeholder">
            </div>
        </div>

        <button class="btn" type="submit">Envoyer</button>
    </form>
</section>




</body>
</html>