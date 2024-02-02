<div class="footer">
    <div class="content">
        <div class="column logo-column">
            <div class="logo">
                <div class="logo"> <?= $logo ?? 'Logo' ?></div>
            </div>
            <div class="content-info">
                <div class="address-block">
                    <div class="address">Address:</div>
                    <div class="address-detail"><?= $adresse ?? 'Your adresse here, 12345 country' ?></div>
                </div>
                <div class="contact-block">
                    <div class="contact">Contact:</div>
                    <div class="contact-info">
                        <div class="phone"><?= $phone ?? '01 02 03 04 05' ?></div>
                        <div class="email"><?= $email ?? 'your@mail.com' ?> </div>
                    </div>
                </div>
                <div class="social-links">
                    <a href="<?= $facebook ?? 'error'?>" class=" icon icon-facebook"> &#128231; </a>
                    <a href="<?= $instagram ?? 'error'?>" class=" icon icon-Instagram"> &#128231; </a>
                    <a href="<?= $twitter ?? 'error'?>" class="icon icon-facebook"> &#128231; </a>
                    <a href="<?= $linkedin ?? 'error'?>" class="icon icon-facebook"> &#128231; </a>
                    <a href="<?= $youtube ?? 'error'?>" class="icon icon-facebook"> &#128231; </a>
                </div>
            </div>
        </div>
        <div class="column links-column">
            <div class="link-list">
                <a href="<?= $lien1 ?? '/error'?>" class="link">Link one</a>
                <a href="<?= $lien2 ?? '/error'?>" class="link">Link two</a>
                <a href="<?= $lien3 ?? '/error'?>" class="link">Link three</a>
                <a href="<?= $lien4 ?? '/error'?>" class="link">Link four</a>
                <a href="<?= $lien5 ?? '/error'?>" class="link">Link five</a>
            </div>
        </div>
    </div>


    <div class="credits">
        <div class="divider"></div>
        <div class="row">
            <div class="copyright">© 2023 All rights reserved.</div>
            <div class="footer-links">
                <div class="footer-link">Privacy Policy</div>
                <div class="footer-link">Terms of Service</div>
                <div class="footer-link">Cookies Settings</div>
            </div>
        </div>
    </div>
</div>
