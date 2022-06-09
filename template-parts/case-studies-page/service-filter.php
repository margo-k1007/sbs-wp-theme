<?php
$default_service = get_sub_field('default_service');
$service = $_GET['service'] ? $_GET['service'] : $default_service;
?>

<div class="service-filter section">
    <?php
    $service_title = get_sub_field('service_title');
    ?>
    <div class="service-filter__container container">

        <div class="service-filter__row">
            <h3 class="service-filter__title wow slideFromLeft">
                <?= $service_title; ?>
            </h3>

            <?php if( have_rows('services_list') ): ?>
                <ul class="service-filter__list list-unstyled wow slideFromLeft">
                <?php while( have_rows('services_list') ): the_row(); ?>
                    <?php
                        $label = get_sub_field('label');
                        $service_id = get_sub_field('service');
                        $args = array(
                            'post_type' => 'case-studies',
                            'post_status' => 'publish',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'case-studies-service',
                                    'field'    => 'id',
                                    'terms'    => $service_id
                                )
                            )
                        );
                        $query = new WP_Query( $args );
                        $count = $query->found_posts;
                    ?>

                    <?php if ( $count ): ?>
                        <li class="service-filter__item">
                            <button data-id="<?= $service_id; ?>" class="service-filter__button btn btn--link js-service-button <?= $service_id == $service ? 'active' : ''; ?>">
                                <span><?= $label; ?></span>&nbsp;<sup><?= $count; ?></sup>
                            </button>
                            <span>&nbsp;&#47;&nbsp;</span>
                        </li>
                    <?php endif; ?>

                <?php endwhile; ?>
                </ul>
            <?php endif; ?>

        </div>
    </div><!-- /.service-filter__container -->
</div><!-- /.service-filter -->