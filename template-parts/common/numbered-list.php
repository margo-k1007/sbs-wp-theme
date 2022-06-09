<?php
$title = get_sub_field('title');
$text = get_sub_field('text');
?>
<div class="numbered-list section">
    <div class="numbered-list__container container container--sm">

        <div class="numbered-list__header">
            <h2 class="numbered-list__title heading wow slideFromLeft">
                <?= $title; ?>
            </h2>

            <div class="numbered-list__text wow fadeIn">
                <?= $text; ?>
            </div>
        </div>

        <?php if( have_rows('numbered_list') ): ?>
            <ol class="numbered-list__list list-unstyled">
                <?php while( have_rows('numbered_list') ): the_row();
                    $title = get_sub_field('title');
                    $text = get_sub_field('text');
                    $index = get_row_index();
                    ?>
                    <li class="numbered-list__item item wow slideFromLeft" data-wow-delay="0.<?= $index; ?>s">
                        <h3 class="item__title">
                            <?= $title; ?>
                        </h3>
                        <p class="item__text">
                            <?= $text; ?>
                        </p>
                    </li>
                <?php endwhile; ?>
            </ol>
        <?php endif; ?>

    </div><!-- /.numbered-list__container -->
</div><!-- /.numbered-list -->
