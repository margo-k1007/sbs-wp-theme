<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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

get_template_part('template-parts/flexible-content');

?>

<?php
get_footer();
