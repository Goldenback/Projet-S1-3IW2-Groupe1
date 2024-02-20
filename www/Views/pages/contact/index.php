<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Contact</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../Front-end/Workspace/dist/css/main.css"/>
</head>

<body>
<?php include("Views/_partials/navbar.php") ?>

<section class="project-header">
    <div class="Content">
        <div class="Heading">Amazing Art Project</div>
        <div class="Text">Experience the beauty of art through this captivating project.</div>
    </div>
</section>

<section class="contact-us" id="contact-us">
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
                <input type="text" id="first-name" name="first-name" placeholder="Placeholder" required>
            </div>
            <div class="input">
                <label for="last-name">Last name</label>
                <input type="text" id="last-name" name="last-name" placeholder="Placeholder" required>
            </div>
        </div>

        <div class="inputs">
            <div class="input">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Placeholder" required>
            </div>
            <div class="input">
                <label for="phone">Phone number</label>
                <input type="tel" id="phone" name="phone" placeholder="Placeholder" required>
            </div>
        </div>

        <div class="message-container">
            <div class="message-title">Message</div>
            <div class="text-area">
                <label for="messageArea"></label>
                <textarea class="type-your-message" id="messageArea" name="messageArea" placeholder="Type your message..." required></textarea>
            </div>
        </div>
        <button class="Button Primary" type="submit">Send</button>
    </form>
</section>

<?php include("Views/Templates/Frontend/layout/footer.php") ?>
</body>
</html>
