<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sbs
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php
$header_link = get_field('header_link', 'options');
?>

<div class="modal-overlay"></div>

<div id="page" class="site">
    <div class="page-overlay"></div>
	<header id="masthead" class="site-header header">

        <div class="header__container container">
            <div class="header__row">
                <div class="header__logo">
                    <?php the_custom_logo(); ?>
                </div>

                <button class="header__burger btn btn--link js-burger">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>

                <div class="header__menu-wrapper">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location'  => 'menu-1',
                            'menu_id'         => 'header-menu',
                            'container'       => 'nav',
                            'container_class' => 'header__navigation',
                            'container_id'    => 'header-navigation',
                            'menu_class'      => 'header__menu list-unstyled',
                            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        )
                    );
                    ?>
                </div>

                <?php  if ($header_link): ?>
                    <div class="header__actions">
                        <?php
                        $link_url = $header_link['url'];
                        $link_title = $header_link['title'];
                        $link_target = $header_link['target'] ? $header_link['target'] : '_self';
                        ?>

                        <a class="header__button btn btn--primary"
                           href="<?= esc_url($link_url); ?>"
                           target="<?= esc_attr($link_target); ?>">
                            <?= esc_html($link_title); ?>
                        </a>

                    </div>
                <?php endif; ?>
            </div>
        </div>

	</header><!-- #masthead -->

    <div id="primary" class="site-content">
        <main id="main" class="site-main">
