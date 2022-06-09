<?php
$post_id = get_the_ID();
$title = get_the_title();
$bg_image = get_field('single_bg_image', 'options');
$terms = get_the_terms( $post_id, 'case-studies-service' );

?>

<header class="heading-section bg-cover" style="background-image: url(<?= $bg_image; ?>);">
    <div class="heading-section__container container">

        <div class="heading-section__row">
            <div class="heading-section__content">
                <h1 class="heading-section__title heading dark-context wow slideFromLeft">
                    <?php if (is_singular('case-studies')): ?>
                        <?= __('Case Study', 'sbs') . ' &#8211; </br>' . $title . ' '; ?>
                        <?php if (!empty($terms)): ?>
                            <?= $terms[0]->name; ?>
                        <?php endif; ?>
                    <?php else: ?>
                        <?= $title; ?>
                    <?php endif; ?>
                </h1>
            </div>
        </div>

    </div><!-- /.heading-section__container -->
</header><!-- /.heading-section -->