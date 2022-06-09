<?php
$title = get_sub_field('title');
?>
<div class="mission section">
    <div class="mission__container container container--sm">

        <h2 class="mission__title heading wow slideFromLeft">
            <?= $title; ?>
        </h2>

        <?php if( have_rows('mission_blocks') ): ?>
            <div class="mission__row">
                <?php while( have_rows('mission_blocks') ): the_row();
                    $title = get_sub_field('title');
                    $index = get_row_index();
                    ?>
                    <div class="mission__item card wow slideFromBottom" data-wow-delay="0.<?= $index; ?>s">
                        <h4 class="card__title">
                            <?= $title; ?>
                        </h4>

                        <?php if( have_rows('mission_list') ): ?>
                            <ul class="card__list list-unstyled">
                                <?php while( have_rows('mission_list') ): the_row();
                                    $text = get_sub_field('text');
                                    ?>
                                    <li class="card__item">
                                        <?= $text; ?>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>

                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>

    </div><!-- /.mission__container -->
</div><!-- /.mission -->
