<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package sbs
 */

get_header();
?>

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );
			?>

            <div class="section">
                <div class="container container--sm">
                    <?php

                    $prev_post = get_previous_post();
                    $next_post = get_next_post();
                    $term_prev = get_the_terms( $prev_post->ID, 'case-studies-service' )[0]->name;
                    $term_next = get_the_terms( $next_post->ID, 'case-studies-service' )[0]->name;

                    the_post_navigation(
                        array(
                            'prev_text' => '<span class="post-navigation__subtitle wow slideFromLeft">' . esc_html__( 'Previous Project:', 'sbs' ) . '</span> <span class="post-navigation__title wow slideFromLeft">%title ' . $term_prev .'</span>',
                            'next_text' => '<span class="post-navigation__subtitle wow slideFromRight">' . esc_html__( 'Next Project:', 'sbs' ) . '</span> <span class="post-navigation__title wow slideFromRight">%title ' . $term_next .'</span>',
                        )
                    );

                    ?>
                </div>
            </div>
			<?php
		endwhile; // End of the loop.
?>



<?php
get_footer();
