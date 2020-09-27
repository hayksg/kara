    <footer>
        <div class="footer-top">
            <div class="container">
                <div class="footer-top-in">
                    <div class="footer-top-in-first">
                        <div class="footer-logo-box">
                            <a href="<?php echo site_url() ?>" class="footer-logo">
                                <img src="<?php echo get_theme_file_uri('/site/images/logo.png')?>" alt="logo image">
                            </a>
                        </div>
                    </div>
                    <div class="footer-top-in-second">
                        <div class="footer-links">
                            <div class="footer-top-links-box">
                            <?php
                                wp_nav_menu(array(
                                    'theme_location' => 'footerMenu1Location',
                                    'menu_class'     => 'footer-menu',
                                ));
                            ?>
                            </div>
                        </div>
                    </div>
                    <div class="footer-top-in-third">
                        <div class="footer-links">
                            <div class="footer-top-links-box">
                            <?php
                                wp_nav_menu(array(
                                    'theme_location' => 'footerMenu2Location',
                                    'menu_class'     => 'footer-menu',
                                ));
                            ?>
                            </div>
                        </div>
                    </div>
                    <div class="footer-top-in-fourth">
                        <div class="connect-with-us">
                            <h4>Connect with Us</h4>
                            <div class="connect-box">
                                <div class="connect-box-in"><span>Mon-Thurs</span>: 8-12 and 1-4</div>
                                <div class="connect-box-in"><span>Friday</span>: 8-12</div>
                            </div>
                            <div class="connect-box">
                                <div class="connect-box-in"><span>Phone</span>: <a href="tel:5414745221">541-474-5221</a></div>
                                <div class="connect-box-in"><span>Fax</span>: <a href="fax:111.222.3333">111.222.3333</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="copyright">Copyright © 2020 TripaholicMe &nbsp;|&nbsp;  Some address</div>
                    </div>
                    <div class="col-md-5">
                        <div id="footer-right-block">
                            Some text here
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <button id="back-to-top">
        <i class="fa fa-arrow-up" aria-hidden="true"></i>
    </button><!-- /#back-to-top -->
    
    <?php wp_footer(); ?>
    </body>
</html>