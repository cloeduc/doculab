<?php
/**
 * @package doculab
 */
?>
<?php global $gridz_options;
$curauth = $wp_query->get_queried_object();?>
<?php if(is_active_sidebar('sidebar-1')): ?>
<div id="primary" class="widget-area widget-area-<?php echo $gridz_options['sidebar_layout']; ?>" role="complementary">
	<aside id="author-id" class="widget author-card">
		<h1>Les documentations de <?php echo $curauth->display_name; ?></h1>
		<div class="avatar">
		<?php echo get_avatar($curauth->ID) ?>
		<h2><?php echo $curauth->display_name; ?></h2>
		<p><?php echo $curauth->user_description; ?></p>
		<?php if($curauth->user_url != null):?>
			<p><strong>Site web :</strong> <a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a></p>
		<?php endif; ?>
		</div>

    </aside>
    <?php if(!dynamic_sidebar('sidebar-1')): ?>
    <?php endif; ?>
</div>
<?php endif; ?>
