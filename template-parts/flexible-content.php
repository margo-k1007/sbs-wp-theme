<?php
if (have_rows('content_area')):

    while (have_rows('content_area')) : the_row();

        if (get_row_layout() == 'approaches_section'):
            get_template_part('template-parts/common/approaches');
        endif;

        if (get_row_layout() == 'editor'):
            if (is_single()):
                ?>
                <div class="container container--sm">
                    <div class="divider divider--grey"></div>
                </div>
            <?php
            endif;
            get_template_part('template-parts/common/editor');
        endif;

        if (get_row_layout() == 'expertise_section'):
            get_template_part('template-parts/common/expertises');
        endif;

        if (get_row_layout() == 'faq_section'):
            get_template_part('template-parts/common/faq');
        endif;

        if (get_row_layout() == 'gallery_section'):
            get_template_part('template-parts/common/gallery');
        endif;

        if (get_row_layout() == 'image_context'):
            get_template_part('template-parts/common/image-context');
        endif;

        if (get_row_layout() == 'infographics_section'):

            if (is_front_page()): ?>

                <div class="container">
                    <div class="divider divider--top"></div>
                </div>

            <?php
            endif;
            get_template_part('template-parts/common/infographics');

            if (!is_front_page()): ?>

                <div class="container container--sm">
                    <div class="divider divider--top"></div>
                </div>

            <?php
            endif;
        endif;

        if (get_row_layout() == 'services_section'):
            get_template_part('template-parts/common/services');
        endif;

        if (get_row_layout() == 'latest_works_section'):
            get_template_part('template-parts/common/latest-works');
        endif;

        if (get_row_layout() == 'legal_section'):
            get_template_part('template-parts/legal-page/legal');

            ?>
            <div class="container container">
                <div class="divider divider--grey"></div>
            </div>
        <?php
        endif;

        if (get_row_layout() == 'newsletter_section'):
            get_template_part('template-parts/common/newsletter');
        endif;

        if (get_row_layout() == 'mission_section'):
            get_template_part('template-parts/common/mission');
        endif;

        if (get_row_layout() == 'numbered_list_section'):
            get_template_part('template-parts/common/numbered-list');
        endif;

        if (get_row_layout() == 'partners_section'):
            get_template_part('template-parts/common/partners');
        endif;

        if (get_row_layout() == 'testimonial_section'):

            ?>
            <div class="container container--sm">
                <div class="divider divider--grey"></div>
            </div>
            <?php

            get_template_part('template-parts/single/testimonial');
        endif;

        if (get_row_layout() == 'testimonials_section'):
            get_template_part('template-parts/common/testimonials');
        endif;

        if (get_row_layout() == 'text_context'):
            get_template_part('template-parts/common/text-context');
        endif;

    endwhile;

endif;