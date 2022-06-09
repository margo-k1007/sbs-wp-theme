<?php
$default_service = get_sub_field('default_service');
$service = $_GET['service'] ? $_GET['service'] : $default_service;
$category = $_GET['category'];
?>

<div class="projects section">

    <?php
    $title = get_sub_field('title');

    ?>
    <div class="services__container container">
        <header class="projects__header">
            <h2 class="projects__title title wow slideFromLeft">
                <?= $title; ?>
            </h2>

            <ul class="projects__categories list-unstyled wow slideFromRight">
                <li class="projects__category">
                    <button data-id="0" class="projects__category-button btn btn--link js-category-button <?= !$category ? 'active' : ''; ?>">
                        <?= __('ALL', 'sbs'); ?>
                    </button>
                </li>
                <?php
                $categories = get_terms([
                    'taxonomy' => 'case-studies-category',
                    'hide_empty' => true,
                ]);
                ?>
                <?php foreach( $categories as $term ):
                    $term_id = $term->term_id;
                    $term_title = $term->name;
                    ?>
                    <li class="projects__category">
                        <button data-id="<?= $term_id; ?>" class="projects__category-button btn btn--link js-category-button <?= $term_id == $category ? 'active' : ''; ?>">
                            <?= $term_title; ?>
                        </button>
                    </li>
                <?php endforeach; ?>
            </ul>
        </header>

        <div class="projects__list">

            <?php

            $args = array(
                'posts_per_page' => 6,
                'paged' => 1,
                'post_type' => 'case-studies',
                'post_status' => 'publish',
                'orderby' => 'date',
                'tax_query' => array(
                    'relation' => 'AND',
                )
            );

            if ($service) {
                $args['tax_query'][] = array(
                    'taxonomy' => 'case-studies-service',
                    'field' => 'id',
                    'terms' => $service,
                );
            }

            if ($category) {
                $args['tax_query'][] = array(
                    'taxonomy' => 'case-studies-category',
                    'field' => 'id',
                    'terms' => $category,
                );
            }

            $query = new WP_Query( $args );

            $max_num_pages = $query->max_num_pages;

            if ( $query->have_posts() ) :
                while ( $query->have_posts() ) :
                    $query->the_post();
                    get_template_part('template-parts/case-studies-page/project');
                endwhile;
            else:
                echo '<h6>' . __('Projects not found', 'sbs') . '</h6>';
            endif;

            wp_reset_postdata();

            ?>

        </div>

        <div class="projects__loader js-loader">
            <img src="/wp-content/themes/sbs/assets/images/spinner.svg" alt="spinner">
        </div>

        <div class="projects__actions wow fadeIn">
            <button class="projects__load-more btn btn--link js-load-more"  style="display:<?= ($max_num_pages > 1) ? 'inline-flex' : 'none' ?>;">
                <span><?= __('More projects', 'sbs'); ?></span>
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.85988 -0.0391559L6.86235 1.33584C6.86297 1.66128 7.12727 1.92463 7.45272 1.92408H18.4861L6.56945 13.9028C6.33976 14.1333 6.1626 14.3855 6.39314 14.6152L7.36716 15.5857C7.59767 15.8154 7.86751 15.6611 8.09723 15.4306L20.0544 3.20833V14.4805C20.055 14.8059 20.3193 15.0693 20.6448 15.0687L22.0197 15.0662C22.3452 15.0657 22.6085 14.8014 22.608 14.4759L22.5818 -0.0674748C22.5812 -0.39291 22.3169 -0.656265 21.9915 -0.655715L7.4481 -0.62955C7.12266 -0.628967 6.8593 -0.364658 6.85988 -0.0391559V-0.0391559Z" fill="black"/>
                    <path d="M6.51128 -0.519501H13.5391V1.92494H6.51128V-0.519501ZM20.0476 15.125V7.94444H22.492V15.125H20.0476ZM21.4835 -0.519501H22.4002V1.00828H21.4835V-0.519501Z" fill="black"/>
                    <path d="M6.72222 13.75L8.26446 15.2319L1.76133 22L0.219086 20.5181L6.72222 13.75Z" fill="black"/>
                </svg>
            </button>
        </div>

    </div><!-- /.projects__container -->
</div><!-- /.projects -->