<?php 
$steps = get_field('_etapes');
$dificulty = get_field('_difficulte');
$sources = get_field('_telecharger_les_sources');
$licence = get_field('licence_projet');
$statut = get_field('_statut');
$ressources = get_field('ressources_en_ligne');
$duree = get_field('_duree');
$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'gridz-slider' );
?>
<div id="secondary" class="stepbystep widget-area widget-area-right">
	<?php if($steps):?>
		<aside class="widget">
			<h1 class="entry-title single-title"><?php the_title(); ?></h1>
			<h2> Step by step : </h2>
			<ol class="widget_nav_menu">
			<?php foreach($steps as $key => $step): ?>
				<li>  <a href="#step<?php echo $key; ?>" class="scroll-to"> <?php echo $step['_titre_de_letape']; ?></a></li>
			<?php endforeach; ?>
			</ol>
		</aside>
	<?php endif; ?>
	
	<aside class="widget">
	<h1>Sujets liés à ce projet : </h1>
		<ul class="widget_nav_menu widget_nav_tags ">
			<li>
				<?php the_category('</li><li>'); ?>
			</li>
		</ul>
		<div class="clear"></div>
		<?php if($ressources):?>
			<a href="#ressources" class="sub-nav-button scroll-to">Ressources externes</a>
		<?php endif; ?>
	</aside>
	<?php if($sources):?>
		<aside class="widget">
		<h1> Sources à télécharger :</h1>
			<ol class="widget_nav_menu">
			<?php foreach($sources as $key => $source): ?>
				<?php if($source['_ajouter_un_fichier']) : $source = $source['_ajouter_un_fichier'];?>
					<li>
						<a href="<?php echo $source['url']; ?>" target="_blank" class=""> 
							<img class="application-icon" src="<?php echo get_theme_root_uri(); ?>/doculab/img/<?php echo str_replace(array('application/', '.'), array('', ''), $source['mime_type']); ?>.png"/>  
							> <?php echo $source['title']; ?>
							</a>
					</li>
				<?php endif ?>
			<?php endforeach; ?>
			</ol>
		</aside>
	<?php endif; ?>

</div>
<div id="container" class="three-column">
	<article class="top-article" style="background-image:url('<?php echo $large_image_url[0] ?>')<?php if($large_image_url[1] < 300): echo ';background-size:contain;'; endif?>">
	    <header class="entry-header" >
	        <?php the_title('<h1 class="entry-title single-title">', '</h1>'); ?>
	        <div class="clear"></div>
	        <div class="project-description">
	        <?php if($dificulty) : ?>
	        <img title="<?php get_sentence($dificulty); ?>" src="<?php echo get_theme_root_uri(); ?>/doculab/img/<?php echo $dificulty; ?>.png"/>
	        <?php
		        endif;
		        if($statut) : ?>
	        	<img title="<?php get_sentence($statut); ?>" class="statut" src="<?php echo get_theme_root_uri(); ?>/doculab/img/<?php echo $statut ?>.png"/>
	    	<?php endif ?>
	        <?php if($duree) : ?>
	        	<img title="<?php get_sentence($duree); ?>" class="duree" src="<?php echo get_theme_root_uri(); ?>/doculab/img/<?php echo $duree ?>.png"/>
	    	<?php endif ?>
	    	</div>
	    </header>
	    
	</article>
	<article id="post-<?php the_ID(); ?>" <?php post_class('page'); ?>>
	    <div class="entry-content">
	        <?php the_content(__('Read more', 'gridz')); ?>
			<?php if($steps): foreach($steps as $key => $step): ?>
				<hr/>
				    <h2><a name="step<?php echo $key ?>" ></a> <?php echo $key+1; ?> - <?php echo $step['_titre_de_letape']; ?></h1>
				    <?php echo $step['_description_de_letape'];?>
			<?php endforeach; endif; ?>
	            <?php wp_link_pages(array('before' => '<div class="page-link">', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>')); ?>
	    
	    </div>
	    <hr />
	    <footer>
	<h1><?php the_title();?></h1>
	<p> Réalisé par <strong><?php coauthors_posts_links(); ?></strong>, mise en ligne le <strong><?php the_date(); ?></strong> - Dernière modification : <?php the_modified_date(); ?></strong></p>
	   		<?php if($licence) : ?>
	   			Ce projet a été réalisé sous licence <?php echo $licence ?>

		<?php endif ?>
	    </footer>
	</article>
	<?php if($ressources) : ?>
	<article <?php post_class('page'); ?>>
	<a name="ressources"></a>
	   	<h1> Ressources externes référencées : </h1>
	   	<ul>
	   	<?php foreach($ressources as $ressource): ?>
		   	<li>
		   		<a href="<?php echo $ressource['lien_vers_la_ressource']; ?>" target="_blank" class="sub-nav-button" >
		   		<h2><?php echo $ressource['titre_de_la_ressource']; ?></h2>
		   		<p><?php echo $ressource['description_de_la_ressource']; ?></p>
		   		</a>
		   	</li>
	   <?php endforeach ?>
	   </ul>
	</article>
	<?php endif; ?>
	<?php if(is_single()): ?>
	    <?php gridz_post_nav(); ?>
	<?php endif; ?>
</div>