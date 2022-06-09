<?php
$title = get_sub_field('title');
$images = get_sub_field('gallery');
?>
<div class="gallery section">

    <div class="gallery__container container <?= is_single() ? 'container--sm' : ''; ?>">
        <div class="gallery__header">
            <h2 class="gallery__title subtitle wow slideFromLeft">
                <?= $title; ?>
            </h2>

            <div class="gallery__actions wow fadeIn"></div>
        </div>
    </div>

    <div class="gallery__container container">

        <?php
        $index = 0;
        if( $images ): ?>
        <div class="gallery__images js-gallery">
            <?php foreach( $images as $image ):
                $index ++;
            ?>
                <div class="gallery__item wow slideFromBottom" data-wow-delay="0.<?= $index; ?>s">
                    <div class="gallery__image">
                        <img src="<?= esc_url($image['url']); ?>" alt="<?= esc_attr($image['alt']); ?>" />
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

    </div><!-- /.gallery__container -->
</div><!-- /.gallery -->
