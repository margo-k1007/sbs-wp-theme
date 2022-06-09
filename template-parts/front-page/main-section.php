<?php

$title = get_sub_field('title');
$subtitle = get_sub_field('subtitle');
$text = get_sub_field('text');
$link = get_sub_field('link');
$image = get_sub_field('image');

?>

<header class="main-section">
    <div class="main-section__container container">

        <div class="main-section__row">
            <div class="main-section__content">
                <h1 class="main-section__title main-title wow slideFromLeft">
                    <?= $title; ?>
                </h1>

                <?php if ($subtitle): ?>
                    <h2 class="main-section__subtitle main-subtitle dark-context wow slideFromLeft" data-wow-delay="0.1s">
                        <?= $subtitle; ?>
                    </h2>
                <?php endif; ?>

                <div class="wow slideFromLeft" data-wow-delay="0.2s"">
                    <div class="main-section__text dark-context">
                        <?= $text; ?>
                    </div>

                    <?php if ($link): ?>
                    <div class="main-section__actions">
                        <?php
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>

                        <a class="main-section__button btn btn--gradient"
                           href="<?= esc_url($link_url); ?>"
                           target="<?= esc_attr($link_target); ?>">
                            <?= esc_html($link_title); ?>
                        </a>

                    </div>
                <?php endif; ?>
                </div>
            </div>

            <div class="main-section__image wow slideFromRight">
                <img src="<?= esc_url($image['url']); ?>" alt="<?= esc_attr($image['alt']); ?>">
            </div>
        </div>

    </div><!-- /.main-section__container -->
</header><!-- /.main-section -->