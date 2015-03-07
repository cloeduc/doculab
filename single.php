<?php
/**
 * @package docum
 */
?>
<?php get_header(); ?>
<?php if($gridz_options['sidebar_layout'] == "left"): ?>
    <?php get_sidebar(); ?>
<?php endif; ?>
    <?php if(have_posts()): ?>
        <?php while(have_posts()): the_post(); ?>
            <?php get_template_part('content', 'step-by-step'); ?>
        <?php endwhile; ?>        
    <?php else : ?>
    	<div id="container">   
        	<?php get_template_part('content', 'none'); ?>
        </div>
    <?php endif; ?>

<?php if($gridz_options['sidebar_layout'] == "right"): ?>
    <?php get_sidebar(); ?>
<?php endif; ?>
<?php get_footer(); ?>