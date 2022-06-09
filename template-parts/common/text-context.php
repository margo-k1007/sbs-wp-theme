<?php
$title = get_sub_field('title');
?>
<div class="text-context section">
    <div class="text-context__container container container--sm">

        <h2 class="text-context__title heading wow slideFromLeft">
            <?= $title; ?>
        </h2>

        <?php if( have_rows('text_blocks') ): ?>
            <div class="text-context__row">
                <?php while( have_rows('text_blocks') ): the_row();
                    $title = get_sub_field('title');
                    $text = get_sub_field('text');
                    $index = get_row_index();
                    ?>
                    <div class="text-context__item text-block wow slideFromBottom" data-wow-delay="0.<?= $index; ?>s">
                        <h3 class="text-block__title">
                            <?= $title; ?>
                        </h3>
                        <div class="text-block__text">
                            <?= $text; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>

    </div><!-- /.text-context__container -->
</div><!-- /.text-context -->
