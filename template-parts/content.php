<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sbs
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php

    get_template_part('template-parts/single/heading-section');

    get_template_part('template-parts/flexible-content');

    ?>
</article><!-- #post-<?php the_ID(); ?> -->