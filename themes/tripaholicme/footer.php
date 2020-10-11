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
                            <h4><?php echo esc_attr(get_option( 'footer_connect_title' )) ?></h4>
                            <div class="connect-box">
                                <div class="connect-box-in">
                                    <span><?php echo esc_attr(get_option( 'footer_business_days' )) ?></span>
                                    <?php echo esc_attr(get_option( 'footer_business_hours' )) ?>
                                </div>
                            </div>
                            <div class="connect-box">
                                <div class="connect-box-in"><span>Phone</span>: <a href="tel:<?php echo esc_attr(get_option( 'business_phone' )) ?>"><?php echo esc_attr(get_option( 'business_phone' )) ?></a></div>
                                <div class="connect-box-in"><span>Email</span>: <a href="mailto:<?php echo esc_attr(get_option( 'business_email' )) ?>"><?php echo esc_attr(get_option( 'business_email' )) ?></a></div>
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
                        <div class="copyright">© Copyright <?php echo date('Y') ?> <?php echo bloginfo('name') ?> &nbsp;|&nbsp; <?php echo esc_attr(get_option( 'footer_address' )) ?></div>
                    </div>
                    <div class="col-md-5">
                        <div id="footer-right-block"><?php echo esc_attr(get_option( 'footer_motto' )) ?></div>
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