<section class="Faq">
    <div class="Container">
        <div class="title">
            <h2 class="heading heading-centered">FAQs</h2>
            <p class="text">Find answers to common questions and concerns about our platform.</p>
        </div>
        <div class="Accordion">
            <div class="faq-item">
                <button class="faq-question">How do I sign up?</button>
                <div class="faq-answer" style="display: none;">You can sign up by clicking the "Sign Up" button on our homepage and filling out your details.</div>
            </div>
            <div class="faq-item">
                <button class="faq-question">Can I cancel my subscription at any time?</button>
                <div class="faq-answer" style="display: none;">Yes, you can cancel your subscription at any time through your account settings.</div>
            </div>
            <div class="faq-item">
                <button class="faq-question">Do you offer customer support?</button>
                <div class="faq-answer" style="display: none;">Yes, we offer 24/7 customer support through email, live chat, and phone.</div>
            </div>
            <div class="faq-item">
                <button class="faq-question">What payment methods do you accept?</button>
                <div class="faq-answer" style="display: none;">We accept all major credit cards, PayPal, and various other payment methods.</div>
            </div>
            <div class="faq-item">
                <button class="faq-question">Is there a free trial available?</button>
                <div class="faq-answer" style="display: none;">Yes, we offer a 7-day free trial for new users to explore our platform.</div>
            </div>
        </div>
        <div class="Content">
            <h2 class="heading heading-centered">Still have questions?</h2>
            <p class="text text-centered">Contact our support team for assistance.</p>
            <a href="/contact#contact-us" class="btn btn-transparent">Contact Us</a>
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
