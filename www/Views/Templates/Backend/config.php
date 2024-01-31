<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Configuration des Pages</title>
    <link rel="stylesheet" href="path/to/your/style.css">
</head>
<body>

<section class="config-container">

    <h1>Configuration des Pages</h1>
    <a href="/home" target="_blank" class="button-page">Voir mon site</a><br>

    <div class="tabs">
        <button class="tab-button" onclick="openTab('home')">Accueil</button>
        <button class="tab-button" onclick="openTab('about')">À Propos</button>
        <button class="tab-button" onclick="openTab('projects')">Projets</button>
        <button class="tab-button" onclick="openTab('contact')">Contact</button>

    </div>

    <div id="home" class="tab-content">
        <h3>Configuration de la Page d'Accueil</h3>
        <form class="config-form" action="/SaveHome">


            <div class="form-group">
                <label for="titleAbout">Titre principal :</label>
                <input type="text" id="titleAbout" name="titleAbout">
            </div>

            <div class="form-group">
                <label for="aboutDescription">Description principale:</label>
                <input type="text" id="aboutDescription" name="aboutDescription">
            </div>

            <div class="form-group">
                <label for="aboutImgUrl">Image principale:</label>
                <input type="text" id="aboutImgUrl" name="aboutImgUrl">
            </div>

            <br>

            <h3>Image + description</h3>
            <div class="form-group">
                <label for="titleDesc">Titre :</label>
                <input type="text" id="titleDesc" name="titleDesc">
            </div>
            <div class="form-group">
                <label for="textDesc">Description :</label>
                <input type="text" id="textDesc" name="textDesc">
            </div>
            <div class="form-group">
                <label for="imageDescUrl">URL image :</label>
                <input type="text" id="imageDescUrl" name="imageDescUrl">
            </div>


            <button class="submit-button" type="submit">Enregistrer</button>
        </form>
    </div>

    <div id="about" class="tab-content">
        <h3>Configuration de la Page À Propos</h3>
        <form class="config-form" action="/SaveAbout">

            <div class="form-group">
                <label for="titleAbout">Titre principal :</label>
                <input type="text" id="titleAbout" name="titleAbout">
            </div>

            <div class="form-group">
                <label for="aboutDescription">Description principale:</label>
                <input type="text" id="aboutDescription" name="aboutDescription">
            </div>

            <br>

            <h3>Image + description</h3>
            <div class="form-group">
                <label for="titleDesc">Titre :</label>
                <input type="text" id="titleDesc" name="titleDesc">
            </div>
            <div class="form-group">
                <label for="textDesc">Description :</label>
                <input type="text" id="textDesc" name="textDesc">
            </div>
            <div class="form-group">
                <label for="imageDesc">URL image :</label>
                <input type="text" id="imageDesc" name="imageDesc">
            </div>

            <button class="submit-button" type="submit">Enregistrer</button>
        </form>
    </div>

    <div id="projects" class="tab-content">
        <h3>Configuration de la Page Projets</h3>
        <form class="config-form">

            <h3>Project 1</h3>

            <div class="form-group">
                <label for="projectTitle">Titre :</label>
                <input type="text" id="projectTitle" name="projectTitle">
            </div>
            <div class="form-group">
                <label for="projectDesc">Description :</label>
                <input type="text" id="projectDesc" name="projectDesc">
            </div>
            <div class="form-group">
                <label for="projectImageUrl">URL image :</label>
                <input type="text" id="projectImageUrl" name="projectImageUrl">
            </div>


            <h3>Project Gallery</h3>
            <div class="form-group">
                <label for="projectGalleryImageUrl">URL image :</label>
                <input type="text" id="projectGalleryImageUrl" name="projectGalleryImageUrl">
            </div>

            <h3>Project 2</h3>

            <div class="form-group">
                <label for="projectTitle2">Titre :</label>
                <input type="text" id="projectTitle2" name="projectTitle2">
            </div>
            <div class="form-group">
                <label for="projectDesc2">Description :</label>
                <input type="text" id="projectDesc2" name="projectDesc2">
            </div>
            <div class="form-group">
                <label for="projectImage2">URL image :</label>
                <input type="text" id="projectImage2" name="projectImage2">
            </div>

            <button class="submit-button" type="submit">Enregistrer</button>
        </form>
    </div>

    <div id="contact" class="tab-content">
        <h3>Configuration de la Page Contact</h3>
        <form class="config-form" action="/SaveContact">

            <div class="form-group">
                <label for="email">Email &#128231;:</label>
                <input type="text" id="email" name="email">
            </div>

            <div class="form-group">
                <label for="phone">Téléphone &#128222;:</label>
                <input type="text" id="phone" name="phone">
            </div>

            <div class="form-group">
                <label for="office">Office &#128188;:</label>
                <input type="text" id="office" name="office">
            </div>

            <button class="submit-button" type="submit">Enregistrer</button>
        </form>
    </div>


</section>

<script>
    function openTab(tabName) {
        var i;
        var x = document.getElementsByClassName("tab-content");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        document.getElementById(tabName).style.display = "block";
    }
</script>
</body>
</html>
