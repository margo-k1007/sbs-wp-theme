<div class="infographics section-sm">
    <div class="infographics__container container">

        <?php if( have_rows('infographics_list') ): ?>
            <div class="infographics__row">
                <?php while( have_rows('infographics_list') ): the_row();
                    $num = get_sub_field('num');
                    $label = get_sub_field('label');
                    $index = get_row_index();
                    ?>
                    <div class="infographics__item infographic wow slideFromBottom" data-wow-delay="0.<?= $index; ?>s">
                        <div class="infographic__num">
                            <?= $num; ?>
                        </div>
                        <div class="infographic__label">
                            <?= $label; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>

    </div><!-- /.infographics__container -->
</div><!-- /.infographics -->
