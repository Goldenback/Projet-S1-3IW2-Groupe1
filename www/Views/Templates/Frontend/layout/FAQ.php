<section class="faq-section">
    <div class="faq-container">
        <h2 class="faq-heading">FAQs</h2>
        <p class="faq-description">Find answers to common questions and concerns about our platform and services.</p>
        <div class="faq-accordion">

            <?php //Faire une for pour afficher les questions réponses et supprimer ce qui est en dessous ?>

            <div class="faq-item">
                <button class="faq-question"><?= $question ?? 'Question here ...' ?></button>
                <div class="faq-answer"><?= $answear ?? 'Answer here' ?></div>
            </div>
            <div class="faq-item">
                <button class="faq-question"><?= $question ?? 'Question here ...' ?></button>
                <div class="faq-answer"><?= $answear ?? 'Answer here' ?></div>
            </div>
            <div class="faq-item">
                <button class="faq-question"><?= $question ?? 'Question here ...' ?></button>
                <div class="faq-answer"><?= $answear ?? 'Answer here' ?></div>
            </div>
            <div class="faq-item">
                <button class="faq-question"><?= $question ?? 'Question here ...' ?></button>
                <div class="faq-answer"><?= $answear ?? 'Answer here' ?></div>
            </div>
            <div class="faq-item">
                <button class="faq-question"><?= $question ?? 'Question here ...' ?></button>
                <div class="faq-answer"><?= $answear ?? 'Answer here' ?></div>
            </div>
        </div>
        <div class="faq-contact">
            <h3>Still have questions?</h3>
            <p>Contact us for further assistance.</p>
            <a href="#contact-us" class="contact-button">Contact Us</a>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const faqQuestions = document.querySelectorAll('.faq-question');

        faqQuestions.forEach(question => {
            question.addEventListener('click', function () {
                // Trouver l'élément frère direct (la réponse) de la question cliquée
                const answer = this.nextElementSibling;

                // Vérifier si la réponse est déjà ouverte
                if (answer.style.display === 'block') {
                    answer.style.display = 'none';
                    this.classList.remove('is-open');
                } else {
                    // Fermer toutes les réponses ouvertes avant d'ouvrir la nouvelle
                    const allAnswers = document.querySelectorAll('.faq-answer');
                    allAnswers.forEach(ans => ans.style.display = 'none');

                    // Enlever la classe 'is-open' de tous les boutons avant d'ajouter au courant
                    faqQuestions.forEach(btn => btn.classList.remove('is-open'));

                    // Ouvrir la réponse cliquée
                    answer.style.display = 'block';
                    this.classList.add('is-open');
                }
            });
        });
    });

</script>
