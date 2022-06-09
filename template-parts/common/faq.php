<?php
$title = get_sub_field('title');
?>
<div class="faq section-sm">
    <div class="faq__container container container--sm">

        <h2 class="faq__title heading wow slideFromLeft">
            <span><?= $title; ?></span>
        </h2>

        <?php if( have_rows('item_list') ): ?>
            <div class="faq__list">
                <?php while( have_rows('item_list') ): the_row();
                    $title = get_sub_field('title');
                    $text = get_sub_field('text');
                    ?>
                    <div class="faq__item faq-item wow fadeIn">
                        <button class="faq-item__button btn btn--link js-accordion-title">
                            <h4 class="faq-item__title">
                                <?= $title; ?>
                            </h4>
                            <div class="faq-item__arrow js-accordion-arrow">
                                <svg viewBox="0 0 166 95" xmlns="http://www.w3.org/2000/svg" width="20px" height="12px">
                                    <defs>
                                        <linearGradient id="arrow_linear" x1="23.2446" y1="-14.5697" x2="23.2446" y2="5.43033" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#bbd51f"/>
                                            <stop offset="1" stop-color="#418327"/>
                                        </linearGradient>
                                    </defs>
                                    <path d="M164.207 9.222l-7.375-7.333a4.466 4.466 0 00-6.325 0L83.09 69.14 15.674 1.89a4.476 4.476 0 00-6.334 0L1.974 9.222a4.476 4.476 0 000 6.334l77.95 78a4.466 4.466 0 006.325 0l77.958-78a4.492 4.492 0 000-6.334z" fill="#000"></path>
                                </svg>
                            </div>
                        </button>

                        <p class="faq-item__text js-accordion-content">
                            <?= $text; ?>
                        </p>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>

    </div><!-- /.faq__container -->
</div><!-- /.faq -->
