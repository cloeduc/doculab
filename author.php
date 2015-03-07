<?php
/**
 * @package doculab
 */
?>
<?php global $gridz_options; 
$oldquery = $wp_query->query_vars;
$oldquery['post_type'] = array( 'post', 'projets', 'tutoriaux', 'outils' );

get_header(); query_posts($oldquery);
?>
<?php if($gridz_options['sidebar_layout'] == "left"): ?>
    <?php get_sidebar('author'); ?>
<?php endif; 
?>
<div id="container">
    <div id="filters">
        <?php echo  do_shortcode('[ULWPQSF id=373]');?>
    </div>
    <div id="grid-container">

        <?php if(have_posts()): ?>

            <?php while(have_posts()): the_post(); ?>
                <?php get_template_part('content', 'grid'); ?>
            <?php endwhile; ?>        
        <?php else : ?>
            <?php get_template_part('content', 'none'); ?>
        <?php endif; ?>
    </div>
    <?php gridz_pagination(); ?>
</div>
<?php if($gridz_options['sidebar_layout'] == "right"): ?>
    <?php get_sidebar('author'); ?>
<?php endif; ?>
<?php get_footer(); ?>