<div class="services section">
    <?php
    $title = get_sub_field('title');
    $text = get_sub_field('text');
    $services = get_sub_field('services_list');
    ?>
    <div class="services__container container">

        <div class="services__row">
            <div class="services__content">
                <h2 class="services__title heading wow slideFromLeft">
                    <?= $title; ?>
                </h2>

                <div class="services__text wow fadeIn">
                    <?= $text; ?>
                </div>
            </div>

            <?php  if( $services ):
                $index = 0;
            ?>
                <div class="services__list">
                    <?php foreach( $services as $term ):

                        $term_id = $term->term_id;
                        $term_title = get_term_meta($term_id, 'plural_name', true) ? get_term_meta($term_id, 'plural_name', true) : $term->name;
                        $term_description = esc_html($term->description);
                        $image_id = get_term_meta($term_id, 'featured_image', true);
                        $term_image = wp_get_attachment_image_url($image_id, 'single-post-thumbnail');
                        $index++;
                        ?>
                        <a href="/case-studies/?service=<?= $term_id; ?>" class="services__item service wow slideFromRight" data-wow-delay="0.<?= $index; ?>s">

                            <div class="service__image">
                                <img src="<?= $term_image; ?>" alt="<?= $term_title; ?>">
                            </div>

                            <h3 class="service__title" >
                                <?= $term_title; ?>
                            </h3>

                            <div class="service__text">
                                <?= $term_description; ?>
                            </div>

                            <div class="service__actions"></div>

                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

        </div>

    </div><!-- /.services__container -->
</div><!-- /.services -->
