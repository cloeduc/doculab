<?php
/**
 * @package doculab
 */
?>
<?php if(has_post_thumbnail()) : ?>
<li id="slide-<?php the_ID(); ?>" <?php post_class("slide"); ?>>
    <article>
        <?php the_post_thumbnail('large-slider'); ?>
        <a href="<?php the_permalink(); ?>"><h1 class="slider-title"><?php the_title() ?></h1></a>
        <div class="slider-description">
            <?php the_excerpt(); ?>
        </div>
        
    </article>
</li>
<?php endif; ?>