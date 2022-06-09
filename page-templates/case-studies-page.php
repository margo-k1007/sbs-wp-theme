<?php
/**
 * The template for displaying case studies page
 *
 * Template Name: Case Studies Page
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

get_template_part('template-parts/case-studies-page/flexible-content');

?>

<?php
get_footer();
