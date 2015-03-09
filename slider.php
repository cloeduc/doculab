<?php 
if($slides): ?>
    <div id="max-height-contener">
    <div id="home-slider" class="flexslider">
        <ul class="slides">
    <?php

     foreach ($slides as $slide):
    	if($slide['acf_fc_layout'] == 'slide_interne'):
    		$post =  $slide['ressource_liee'][0];
    		$title = $post->post_title;
    		$description = wp_trim_words ( strip_shortcodes( $post->post_content, 55 ) );
    		$url = get_permalink($post->ID);
    	elseif($slide['acf_fc_layout'] == 'slide_manuel') :
    		$title = $slide['titre'];
    		$description = $slide['courte_description'];
    		$url = (isset($slide['lien']['lien_interne'])) ? $slide['lien']['lien_interne'] : $slide['lien']['lien_externe'];
    	endif;
    ?>
		<li id="slide-<?php the_ID(); ?>" <?php post_class("slide"); ?>>
		    <article>
		        <img src="<?php echo $slide['illustration']['url']; ?>" width="<?php echo $slide['illustration']['width']; ?>" height="<?php echo $slide['illustration']['height']; ?>">
		        <a href="<?php echo $url; ?>"><h1 class="slider-title"><?php echo $title; ?></h1></a>
		        <div class="slider-description">
		            <?php echo $description ?>
		            <a class="more-link last" href="<?php echo $url; ?>">Lire la suite…</a>
		        </div>
		    </article>
		</li>
    <?php endforeach; ?>
        </ul>
    </div>
    </div>
<?php endif; ?>