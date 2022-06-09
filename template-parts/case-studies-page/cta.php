<?php
$text = get_sub_field('text');
$link = get_sub_field('link');
?>

<div class="cta">
    <div class="cta__container container">

        <div class="cta__row wow slideFromBottom">
            <p class="cta__text">
                <?= $text; ?>
            </p>
            <?php
            if( $link ):
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                <div class="cta__actions">
                    <a class="cta__link" href="<?= esc_url( $link_url ); ?>" target="<?= esc_attr( $link_target ); ?>">
                        <span><?= esc_html($link_title); ?></span>
                        <svg width="72" height="72" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g fill="#000">
                                <g>
                                    <path d="m22.4505-.12814.0081 4.49999c.002 1.06506.867 1.92695 1.9321 1.92515H60.5L21.5 45.5c-.7517.7545-1.3315 1.5798-.577 2.3316l3.1877 3.1762c.7544.7518 1.6375.2467 2.3893-.5078l39.1326-40v36.8908c.0019 1.065.8669 1.9269 1.9321 1.9251l4.4999-.0082c1.065-.0019 1.9269-.8669 1.9251-1.9321L73.9041-.22082c-.0019-1.06506-.8669-1.92695-1.9321-1.92515l-47.5964.08563c-1.0651.00191-1.927.86692-1.9251 1.9322Z"/>
                                    <path d="M21.3096-1.70016h23v8h-23zM65.6102 49.5V26h8v23.5zM70.3096-1.70016h3v5h-3z"/>
                                </g>
                                <path d="m22 45 5.04734 4.8497L5.76436 72.00001l-5.04734-4.8497z"/>
                            </g>
                        </svg>
                    </a>
                </div>
            <?php endif; ?>
        </div>



    </div><!-- /.cta__container -->
</div><!-- /.cta -->