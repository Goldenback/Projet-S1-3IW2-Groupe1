<section class="contact-us" id="contact-us">

    <div class="title">
        <div class="content">
            <div class="heading heading-centered">Contact us</div>
            <div class="tagline">Get in touch</div>
            <div class="text">Have a question or need assistance ? Fill out the form below.</div>
        </div>
    </div>

    <form class="form" action="/send-message" method="post">

        <div class="inputs">
            <div class="input">
                <label for="first-name">First name</label>
                <input type="text" id="first-name" name="first-name" placeholder="Firstname" required>
            </div>
            <div class="input">
                <label for="last-name">Last name</label>
                <input type="text" id="last-name" name="last-name" placeholder="Lastname" required>
            </div>
        </div>

        <div class="inputs">
            <div class="input">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="input">
                <label for="phone">Phone number</label>
                <input type="tel" id="phone" name="phone" placeholder="Phone number" required>
            </div>
        </div>

        <div class="inputs">
            <div class="input">
                <label for="topic">Choose a topic</label>
                <select id="topic" name="topic" class="input-large" required>
                    <option value="other">Other</option>
                    <option value="bugs">Report a Bug</option>
                    <option value="features">Suggest a Feature</option>
                    <option value="account">Account Issues</option>
                    <option value="feedback">Provide Feedback</option>
                </select>
            </div>
        </div>


        <div class="radios">
            <div class="radios-title">Which best describes you?</div>
            <div class="radios-content">
                <div class="radios-column">
                    <label class="radios-option">
                        <input type="checkbox" name="option" value="Student">
                        <span class="radios-label">Student</span>
                    </label>
                    <label class="radios-option">
                        <input type="checkbox" name="option" value="Professional">
                        <span class="radios-label">Professional</span>
                    </label>
                    <label class="radios-option">
                        <input type="checkbox" name="option" value="Entrepreneur">
                        <span class="radios-label">Entrepreneur</span>
                    </label>
                </div>
                <div class="radios-column">
                    <label class="radios-option">
                        <input type="checkbox" name="option" value="Developper">
                        <span class="radios-label">Developper</span>
                    </label>
                    <label class="radios-option">
                        <input type="checkbox" name="option" value="Designer">
                        <span class="radios-label">Designer</span>
                    </label>
                    <label class="radios-option">
                        <input type="checkbox" name="option" value="Other">
                        <span class="radios-label">Other</span>
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

