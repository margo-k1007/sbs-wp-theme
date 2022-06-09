<?php
if (have_rows('content_area_case_studies')):

    while (have_rows('content_area_case_studies')) : the_row();

        if (get_row_layout() == 'projects_section'):
            get_template_part('template-parts/case-studies-page/service-filter');

            ?>
            <div class="container container">
                <div class="divider divider--grey"></div>
            </div>
            <?php

            get_template_part('template-parts/case-studies-page/projects');
        endif;

        if (get_row_layout() == 'cta_section'):
            get_template_part('template-parts/case-studies-page/cta');
        endif;

    endwhile;

endif;