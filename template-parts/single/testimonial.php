<?php
$testimonials = get_sub_field('testimonials_list');
?>
<div class="testimonial-section section">

    <div class="testimonial__container container container--sm">

        <?php  if( $testimonials ): ?>
            <div class="testimonial-section__row">
                <?php foreach( $testimonials as $post ):

                    setup_postdata($post);
                    ?>
                    <div class="testimonial wow fadeIn">
                        <blockquote class="testimonial__content">
                            <div class="testimonial__text">
                                <?php the_content(); ?>
                            </div>
                            <div class="testimonial__author">
                                <?php the_title(); ?>
                            </div>
                        </blockquote>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php
            wp_reset_postdata(); ?>
        <?php endif; ?>

    </div>
</div>
