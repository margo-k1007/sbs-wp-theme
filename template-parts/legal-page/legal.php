<?php

$title = get_sub_field('title');

?>

<div class="legal section-sm">
    <div class="legal__container container">

    <div class="legal__row">
        <h2 class="legal__title subtitle wow slideFromLeft">
            <?= $title; ?>
        </h2>

        <?php if( have_rows('description_list') ): ?>
            <dl class="legal__description description">
                <?php while( have_rows('description_list') ): the_row();
                    $term = get_sub_field('term');
                    $definition = get_sub_field('definition');
                    $index = get_row_index();
                    ?>
                    <dt class="description__term wow slideFromLeft" data-wow-delay="0.<?= $index; ?>s">
                        <?= $term; ?>
                    </dt>
                    <dd class="description__definition wow slideFromLeft" data-wow-delay="0.<?= $index; ?>s">
                        <?= $definition; ?>
                    </dd>
                <?php endwhile; ?>
            </dl>
        <?php endif; ?>
    </div>

    </div><!-- /.legal__container -->
</div><!-- /.legal -->