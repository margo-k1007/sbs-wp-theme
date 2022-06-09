<?php
/**
 * The template for displaying contact page
 *
 * Template Name: Contact Page
 * Template Post Type: page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sbs
 */

get_header();
?>

<?php if( have_rows('heading_section') ):
    while( have_rows('heading_section') ): the_row();

        get_template_part('template-parts/page/heading-section');

    endwhile;
endif;

$form = get_field('form');
?>

<div id="contact" class="contact section">
    <div class="contact__container container">

        <div class="contact__row">

            <?php if( have_rows('text_content') ): ?>
                <div class="contact__content">
                    <?php while( have_rows('text_content') ): the_row();
                        $title = get_sub_field('title');
                        $text = get_sub_field('text');
                        $index = get_row_index();
                        ?>
                        <div class="contact__info wow slideFromLeft" data-wow-delay="0.<?= $index; ?>s">
                            <h3 class="contact__title">
                                <?= $title; ?>
                            </h3>
                            <div class="contact__text">
                                <?= $text; ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>

            <?php if( have_rows('form') ): ?>
                <div class="contact__form-wrapper wow slideFromRight">
                    <?php while( have_rows('form') ): the_row();
                        $title = get_sub_field('title');
                        $form_code = get_sub_field('form_code');
                        ?>
                        <h3 class="contact__title">
                            <?= $title; ?>
                        </h3>
                        <div id="contact-form" class="contact__form">
                            <?= $form_code; ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>

    </div><!-- /.contact__container -->
</div><!-- /.contact -->

<?php
get_footer();
