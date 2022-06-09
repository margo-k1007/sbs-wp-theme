<?php
$post_id =  get_the_ID();
$terms = get_the_terms( $post_id, 'case-studies-service' );
$image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'full' )[0];
?>

<a href="<?php the_permalink(); ?>" class="projects__item project wow slideFromBottom">
    <div class="project__image">
        <img src=" <?= $image_url; ?>" alt="<?php the_title(); ?>">
    </div>

    <div class="project__content">
        <div class="project__category">
            <?php if (!empty($terms)): ?>
                <?= $terms[0]->name; ?>
            <?php endif; ?>
        </div>

        <h3 class="project__title">
            <?php the_title(); ?>
        </h3>
    </div>
</a>
