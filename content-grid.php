<?php
/**
 * @package gridz
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class("grid"); ?>>
    <header class="entry-header">
        <?php gridz_featured_image("gridz-slider"); ?>
        <?php
            if(is_single() || is_page()): the_title('<h1 class="entry-title">', '</h1>');
            else: the_title('<h1 class="entry-title"><a href="'.esc_url(get_permalink()).'" rel="bookmark">', '</a></h1>');
            endif;
        ?>
        <div class="entry-meta">Dernière modification : <?php the_modified_date(); ?></div>
    </header>
        <div class="entry-content"><?php the_excerpt(); ?></div>
</article>