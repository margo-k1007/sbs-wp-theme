<?php

$text = get_sub_field('text');

?>

<div class="editor section">
    <div class="editor__container container <?= is_single() ? 'container--sm' : ''; ?>">

        <div class="editor__text wow fadeIn">
            <?= $text; ?>
        </div>

    </div><!-- /.editor__container -->
</div><!-- /.editor -->