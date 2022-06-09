<?php

$small_container = get_sub_field('small_container');
$title_gradient = get_sub_field('title_gradient');
$title = get_sub_field('title');
$subtitle = get_sub_field('subtitle');
$text = get_sub_field('text');
$image = get_sub_field('image');
$image_position =  get_sub_field('image_position');
$image_position_class = ($image_position === 'left' ) ? ' image-context__row--reverse' : '';

?>

<div class="image-context section">
    <div class="image-context__container container <?= $small_container ? 'container--sm' : ''; ?>">

        <?php
        if( $title ): ?>
            <h2 class="image-context__title <?= $title_gradient ? 'image-context__title--gradient' : ''; ?> wow slideFromTop">
                <span><?= $title; ?></span>
                <svg width="72" height="72" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g fill="#000">
                        <g>
                            <path d="m22.4505-.12814.0081 4.49999c.002 1.06506.867 1.92695 1.9321 1.92515H60.5L21.5 45.5c-.7517.7545-1.3315 1.5798-.577 2.3316l3.1877 3.1762c.7544.7518 1.6375.2467 2.3893-.5078l39.1326-40v36.8908c.0019 1.065.8669 1.9269 1.9321 1.9251l4.4999-.0082c1.065-.0019 1.9269-.8669 1.9251-1.9321L73.9041-.22082c-.0019-1.06506-.8669-1.92695-1.9321-1.92515l-47.5964.08563c-1.0651.00191-1.927.86692-1.9251 1.9322Z"/>
                            <path d="M21.3096-1.70016h23v8h-23zM65.6102 49.5V26h8v23.5zM70.3096-1.70016h3v5h-3z"/>
                        </g>
                        <path d="m22 45 5.04734 4.8497L5.76436 72.00001l-5.04734-4.8497z"/>
                    </g>
                </svg>
            </h2>
        <?php endif; ?>

        <div class="image-context__row <?= $image_position_class; ?>">
            <div class="image-context__content wow fadeIn">
                <h3 class="image-context__subtitle subtitle"><?= $subtitle; ?></h3>
                <div class="image-context__text">
                    <?= $text; ?>
                </div>
            </div>

            <div class="image-context__image wow  <?= $image_position === 'left' ? 'slideFromLeft' : 'slideFromRight'; ?>">
                <img src="<?= esc_url($image['url']); ?>" alt="<?= esc_attr($image['alt']); ?>">
            </div>
        </div>

    </div><!-- /.image-context__container -->
</div><!-- /.image-context -->