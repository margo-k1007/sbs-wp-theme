<?php
$title = get_field('newsletter_title', 'options');
$text = get_field('newsletter_text', 'options');
$form = get_field('newsletter_form', 'options');
?>

<div class="newsletter section">
    <div class="newsletter__container container">

        <div class="newsletter__row">
            <div class="newsletter__content wow slideFromLeft">
                <h2 class="newsletter__title heading">
                    <?= $title; ?>
                </h2>

                <?php if ($text): ?>
                    <p class="newsletter__text">
                        <?= $text; ?>
                    </p>
                <?php endif; ?>
            </div>

            <div class="newsletter__form wow slideFromRight">
                <?= $form; ?>
            </div>
        </div>

    </div><!-- /.newsletter__container -->
</div><!-- /.newsletter -->