<?php
$bg_image = get_sub_field('bg_image');
$testimonials = get_sub_field('testimonials_list');
?>
<div class="testimonials bg-cover dark-context" style="background-image: url(<?= $bg_image; ?>);">

    <div class="testimonials__container container container--sm">

        <?php  if( $testimonials ): ?>
            <div class="testimonials__row js-testimonials wow fadeIn">
                <?php foreach( $testimonials as $post ):

                    setup_postdata($post);
                    ?>
                    <div class="testimonials__item testimonial">
                        <blockquote class="testimonial__content">
                            <div class="testimonial__text dark-context">
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

    </div><!-- /.testimonials__container -->

    <span class="testimonials__caption wow bounceInLeft" data-wow-duration="2s">
        <?= __('Testimonials', 'sbs') ?>
    </span>

</div><!-- /.testimonials -->
