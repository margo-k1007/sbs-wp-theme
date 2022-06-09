<?php
$title = get_sub_field('title');
$bg_color_1 = get_sub_field('bg_color_1');
$bg_color_2 = get_sub_field('bg_color_2');
?>
<div class="expertises section-bg" style="background: <?= $bg_color_1 . ' linear-gradient(140deg, ' . $bg_color_1 . ' 0%, ' . $bg_color_2 . ' 100%)' ?>;">
    <div class="expertises__container container container--sm">

        <h2 class="expertises__title heading wow slideFromLeft">
            <?= $title; ?>
        </h2>

        <?php if( have_rows('expertise_list') ): ?>
            <div class="expertises__row">
                <?php while( have_rows('expertise_list') ): the_row();
                    $title = get_sub_field('title');
                    $image = get_sub_field('image');
                    $index = get_row_index();
                    ?>
                    <div class="expertises__item expertise wow slideFromBottom" data-wow-delay="0.<?= $index; ?>s">
                        <div class="expertise__image">
                            <img src="<?= esc_url($image['url']); ?>" alt="<?= esc_attr($image['alt']); ?>">
                        </div>
                        <h3 class="expertise__title">
                            <?= $title; ?>
                        </h3>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>

    </div><!-- /.expertise__container -->
</div><!-- /.expertise -->
