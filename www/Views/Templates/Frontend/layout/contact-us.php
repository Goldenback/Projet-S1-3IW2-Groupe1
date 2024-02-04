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

        <div class="inputs">
            <div class="input">
                <label for="topic">Choose a topic</label>
                <select id="topic" name="topic" class="input-large" required>
                    <option value="">Select one...</option>
                    <option value="option1">Option 1</option>
                    <option value="option2">Option 2</option>
                    <option value="option3">Option 3</option>
                </select>
            </div>
        </div>


        <div class="radios">
            <div class="radios-title">Which best describes you?</div>
            <div class="radios-content">
                <div class="radios-column">
                    <label class="radios-option">
                        <input type="checkbox" name="option" value="1">
                        <span class="radios-label">Option 1</span>
                    </label>
                    <label class="radios-option">
                        <input type="checkbox" name="option" value="1">
                        <span class="radios-label">Option 1</span>
                    </label>
                    <label class="radios-option">
                        <input type="checkbox" name="option" value="1">
                        <span class="radios-label">Option 1</span>
                    </label>
                </div>
                <div class="radios-column">
                    <label class="radios-option">
                        <input type="checkbox" name="option" value="1">
                        <span class="radios-label">Option 1</span>
                    </label>
                    <label class="radios-option">
                        <input type="checkbox" name="option" value="1">
                        <span class="radios-label">Option 1</span>
                    </label>
                    <label class="radios-option">
                        <input type="checkbox" name="option" value="1">
                        <span class="radios-label">Option 1</span>
                    </label>
                </div>
            </div>
        </div>

        <div class="message-container">
            <div class="message-title">Message</div>
            <div class="text-area">
                <textarea class="type-your-message" id="messageArea" name="messageArea" placeholder="Type your message..." required></textarea>
            </div>
        </div>
        <button class="Button Primary" type="submit">Send</button>
    </form>
</section>

