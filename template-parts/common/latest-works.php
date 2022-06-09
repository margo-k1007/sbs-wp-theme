<?php
$title = get_sub_field('title');
$link = get_sub_field('link');
$quantity = get_sub_field('quantity');
?>
<div class="latest-works section">

    <div class="latest-works__container container">

        <div class="latest-works__header">
            <h2 class="latest-works__title heading wow slideFromLeft">
                <?= $title; ?>
            </h2>

            <?php if ($link): ?>
                <?php
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>

                <a class="latest-works__link btn btn--link wow fadeIn"
                   href="<?= esc_url($link_url); ?>"
                   target="<?= esc_attr($link_target); ?>">
                    <?= esc_html($link_title); ?>
                </a>
            <?php endif; ?>

            <div class="latest-works__actions wow fadeIn"></div>
        </div>

        <div class="latest-works__cases js-latest-works">

            <?php

            $args = array(
                'posts_per_page' => $quantity,
                'post_type' => 'case-studies',
                'post_status' => 'publish',
                'orderby' => 'date',

            );

            $query = new WP_Query( $args );
            $index = 0;

            if ( $query->have_posts() ) :
                while ( $query->have_posts() ) :
                    $query->the_post();
                    $post_id =  get_the_ID();
                    $terms = get_the_terms( $post_id, 'case-studies-service' );
                    $image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'full' )[0];
                    $index++;
                    ?>

                    <a href="<?php the_permalink(); ?>" class="latest-works__case last-work wow slideFromBottom" data-wow-delay="0.<?= $index; ?>s">
                        <div class="last-work__image">
                            <img src=" <?= $image_url; ?>" alt="<?php the_title(); ?>">
                        </div>

                        <div class="last-work__content">
                            <div class="last-work__category">
                                <?php if (!empty($terms)): ?>
                                    <?= $terms[0]->name; ?>
                                <?php endif; ?>
                            </div>

                            <h3 class="last-work__title">
                                <?php the_title(); ?>
                            </h3>
                        </div>
                    </a>

                <?php
                endwhile;
            endif;

            wp_reset_postdata();

            ?>

        </div>

    </div><!-- /.latest-works__container -->
</div><!-- /.latest-works -->
