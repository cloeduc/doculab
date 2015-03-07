<?php
/**
 * @package doculab
 */
?>
<?php global $gridz_options; ?>
<?php if(is_active_sidebar('sidebar-1')): ?>
<div id="primary" class="widget-area widget-area-<?php echo $gridz_options['sidebar_layout']; ?>" role="complementary"> PLOPPPP
    <?php if(!dynamic_sidebar('sidebar-1')): ?>
    <?php endif; ?>
    <?php
    $args=array( 'orderby'=>'rand', 'posts_per_page'=>'1');
    $testimonials=new WP_Query($args);
    while ($testimonials->have_posts()) : $testimonials->the_post(); ?>
        <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
        <?php the_post_thumbnail(); ?>
        <p><?php the_excerpt(); // or the_content(); ?></p>
    <?php
    endwhile;
    wp_reset_postdata(); ?>
</div>
<?php endif; ?>