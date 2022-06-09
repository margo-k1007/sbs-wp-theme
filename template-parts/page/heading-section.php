<?php

$title = get_sub_field('title');
$bg_image = get_sub_field('bg_image') ? get_sub_field('bg_image') : '/wp-content/uploads/2021/10/servives-bg.jpg';

?>

<header class="heading-section bg-cover" style="background-image: url(<?= $bg_image; ?>);">
    <div class="heading-section__container container">

        <div class="heading-section__row">
            <div class="heading-section__content">
                <h1 class="heading-section__title heading dark-context wow slideFromLeft">
                    <?= $title; ?>
                </h1>
            </div>
        </div>

    </div><!-- /.heading-section__container -->
</header><!-- /.heading-section -->