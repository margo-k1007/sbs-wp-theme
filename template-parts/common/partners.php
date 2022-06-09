<?php
$title = get_sub_field('title');
?>
<div class="partners section">
    <div class="partners__container container">

        <h2 class="partners__title heading wow slideFromLeft">
            <?= $title; ?>
        </h2>

        <?php if( have_rows('partners_list') ): ?>
            <div class="partners__row js-partners">
                <?php while( have_rows('partners_list') ): the_row();
                    $logo = get_sub_field('logo');
                    $link = get_sub_field('link');
                    $index = get_row_index();
                    ?>
                    <a href="<?= $link; ?>"
                       target="_blank"
                       class="partners__item wow slideFromBottom"
                       data-wow-delay="0.<?= $index; ?>s"
                    >
                        <img src="<?= esc_url($logo['url']); ?>" alt="<?= esc_attr($logo['alt']); ?>">
                    </a>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>

    </div><!-- /.partners__container -->
</div><!-- /.partners -->
