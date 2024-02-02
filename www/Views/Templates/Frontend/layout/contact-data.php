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
