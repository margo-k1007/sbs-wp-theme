<?php
/**
 * The template for displaying front page
 *
 * Template Name: Front Page
 * Template Post Type: page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sbs
 */

get_header();
?>

<?php if( have_rows('main_section') ):
    while( have_rows('main_section') ): the_row();

        get_template_part('template-parts/front-page/main-section');

    endwhile;
endif;

get_template_part('template-parts/flexible-content');

?>

<?php
get_footer();
