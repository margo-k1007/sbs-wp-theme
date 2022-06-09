<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package sbs
 */

get_header();
?>
<?php
$title = get_field('title_404', 'options');
$text = get_field('text_404', 'options');
?>

    <div id="error-404-section" class="error-404 not-found">

        <div class="error-404__container container">

            <div class="error-404__content text-center">
                <h1 class="error-404__heading">
                    <?= $title; ?>
                </h1>
                <div class="error-404__text caption">
                    <?= $text; ?>
                </div>

                <div class="error-404__actions">
                    <a class="error-404__button btn btn--gradient" href="/"><?= __('Home', 'sbs')?></a>
                </div>

            </div>

        </div><!-- /.error-404__container -->
    </div><!-- /.error-404 -->

<?php
get_footer();
