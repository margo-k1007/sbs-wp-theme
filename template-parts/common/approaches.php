<?php
$title = get_sub_field('title');
$bg_color_1 = get_sub_field('bg_color_1');
$bg_color_2 = get_sub_field('bg_color_2');
?>
<div class="approaches section-bg" style="background: <?= $bg_color_1 . ' linear-gradient(140deg, ' . $bg_color_1 . ' 0%, ' . $bg_color_2 . ' 100%)' ?>;">
    <div class="approaches__container container">

        <h2 class="approaches__title heading wow slideFromLeft">
            <?= $title; ?>
        </h2>

        <?php if( have_rows('approaches_list') ): ?>
            <div class="approaches__row">
                <?php while( have_rows('approaches_list') ): the_row();
                    $subtitle = get_sub_field('subtitle');
                    $title = get_sub_field('title');
                    $text = get_sub_field('text');
                    $index = get_row_index();
                    ?>
                    <div class="approaches__item approach wow slideFromBottom" data-wow-delay="0.<?= $index; ?>s">
                        <div class="approach__subtitle">
                            <?= $subtitle; ?>
                        </div>
                        <h3 class="approach__title title dark-context">
                            <?= $title; ?>
                        </h3>
                        <p class="approach__text">
                            <?= $text; ?>
                        </p>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>

    </div><!-- /.approaches__container -->
</div><!-- /.approaches -->
