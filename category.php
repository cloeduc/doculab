<?php
/**
 * @package doculab
 */
?>
<?php global $gridz_options; 
get_header();
?>

<?php if($gridz_options['sidebar_layout'] == "left"): ?>
    <?php get_sidebar(); ?>
<?php endif; 
  //  query_posts(array('post_type' => array( 'post', 'projets', 'tutoriaux', 'outils' )));

?>
<div id="container">
<h1>Archives</h1>
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
    <?php get_sidebar(); ?>
<?php endif; ?>
<?php get_footer(); ?>