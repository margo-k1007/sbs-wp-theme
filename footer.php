<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sbs
 */

?>
</main><!-- #main -->
</div><!-- #primary -->

<?php
$footer_title = get_field('footer_title', 'options');
$footer_subtitle = get_field('footer_subtitle', 'options');
$footer_links_title = get_field('footer_links_title', 'options');
$footer_contact_title = get_field('footer_contact_title', 'options');
$footer_contact_text = get_field('footer_contact_text', 'options');
$logo_image_1 = get_field('logo_image_1', 'options');
$logo_link_1 = get_field('logo_link_1', 'options');
$logo_image_2 = get_field('logo_image_2', 'options');
$logo_link_2 = get_field('logo_link_2', 'options');
$footer_copy = get_field('footer_copy', 'options');
$footer_developed = get_field('footer_developed', 'options');
?>

<footer id="site-footer" class="site-footer footer">
    <div class="footer__container container">
        <div class="footer__top">
            <div class="footer__col wow fadeIn">
                <h3 class="footer__title caption">
                    <?= $footer_title; ?>
                </h3>

                <?php if ($footer_subtitle): ?>
                    <h4 class="footer__subtitle caption">
                        <?= $footer_subtitle; ?>
                    </h4>
                <?php endif; ?>
            </div>

            <div class="footer__col wow fadeIn">
                <h5 class="footer__widgettitle widgettitle">
                    <?= $footer_links_title; ?>
                </h5>
                <?php
                wp_nav_menu(
                    array(
                        'theme_location'  => 'menu-2',
                        'menu_id'         => 'footer-menu',
                        'container'       => 'nav',
                        'container_class' => 'footer__navigation',
                        'container_id'    => 'footer-navigation',
                        'menu_class'      => 'footer__menu list-unstyled',
                        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    )
                );
                ?>
            </div>

            <div class="footer__col wow fadeIn">
                <h5 class="footer__widgettitle widgettitle">
                    <?= $footer_contact_title; ?>
                </h5>

                <div class="footer__text">
                    <?= $footer_contact_text; ?>
                </div>
            </div>

            <?php if ($logo_image_1 && $logo_image_2): ?>

                <div class="footer__col wow fadeIn">

                    <div class="footer__partners">
                        <?php if ($logo_image_1): ?>

                            <?php if ($logo_link_1): ?>
                                <a href="<?= $logo_link_1; ?>" target="_blank">
                            <?php endif; ?>

                                <img src="<?= $logo_image_1; ?>" alt="">

                            <?php if ($logo_link_1): ?>
                                </a>
                            <?php endif; ?>

                        <?php endif; ?>

                        <?php if ($logo_image_2): ?>

                            <?php if ($logo_link_2): ?>
                                <a href="<?= $logo_link_2; ?>" target="_blank">
                            <?php endif; ?>

                                <img src="<?= $logo_image_2; ?>" alt="">

                            <?php if ($logo_link_2): ?>
                                </a>
                            <?php endif; ?>

                        <?php endif; ?>
                    </div>

                </div>

            <?php endif; ?>
        </div>
        <div class="footer__bottom wow fadeIn">
            <div class="footer__logo">
                <?php the_custom_logo(); ?>
            </div>
            <div class="footer__copy">
                &copy; <?= date("Y") . ' ' . $footer_copy; ?>
            </div>
            <?php if ($footer_developed): ?>
                <div class="footer__developed">
                    <?= $footer_developed; ?>
                </div>
            <?php endif; ?>
        </div>
    </div><!-- /.container -->
</footer><!-- /#colophon -->

<button class="scroll-up-button btn btn-primary js-scroll-up fadeInHalf">
    <svg width="27" height="14" viewBox="0 0 27 14" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g clip-path="url(#bottom-btn)">
            <mask id="mask-bottom-btn" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="-1" y="0" width="29" height="29">
                <path d="M0.136074 15.1361L12.864 27.864C13.2545 28.2545 13.8877 28.2545 14.2782 27.864L27.0061 15.1361C27.3967 14.7455 27.3967 14.1124 27.0061 13.7219L14.2782 0.993938C13.8877 0.603414 13.2545 0.603414 12.864 0.993938L0.136074 13.7219C-0.254451 14.1124 -0.25445 14.7455 0.136074 15.1361Z" fill="white"/>
            </mask>
            <g mask="url(#mask-bottom-btn)">
                <path d="M0.136072 15.1361L12.864 27.864C13.2545 28.2545 13.8877 28.2545 14.2782 27.864L27.0061 15.1361C27.3967 14.7455 27.3967 14.1124 27.0061 13.7219L14.2782 0.993938C13.8877 0.603414 13.2545 0.603414 12.864 0.993938L0.136072 13.7219C-0.254453 14.1124 -0.254452 14.7455 0.136072 15.1361Z" stroke="black" stroke-width="4"/>
            </g>
        </g>
        <defs>
            <clipPath id="bottom-btn">
                <rect width="13" height="26" fill="white" transform="translate(0.5 13.5) rotate(-90)"/>
            </clipPath>
        </defs>
    </svg>
</button>

</div><!-- /#page -->

<?php wp_footer(); ?>

</body>
</html>
