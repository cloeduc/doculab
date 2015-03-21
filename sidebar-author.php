<?php
/**
 * @package doculab
 */
 include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
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
    <?php if (is_user_logged_in() && is_plugin_active('private-messages-for-wordpress/pm4wp.php')): ?>
    <aside id="pm-id" class="widget">
    	<h1>Contacter <?php echo $curauth->display_name; ?></h1>
		<div class="hfeed content">
			<h2><?php the_title(); ?></h2>
			<?php require_once ('inc/custom-pm.php'); ?>
			<?php do_action( 'rwpm_before_form_send' ); ?>
			 <form method="post" action="#" id="send-form" enctype="multipart/form-data">
				    <input type="hidden" name="page" value="rwpm_send" />
				    <input type="hidden" id="recipient" name="recipient" value="<?php echo $curauth->display_name; ?>" />
		       		<label name="subject" ><?php _e( 'Subject', 'pm4wp' ); ?></label>
		        		<input type="text" name="subject" value="<?php echo (isset($subject))? $subject : ''; ?>" class="large-text" />
		        	
		        	<label name="content" >
			            <?php _e( 'Message', 'pm4wp' ); ?></label>
			            <textarea name="content" id="content"><?php echo (isset($content))? $content : ''; ?></textarea>
		            
				    <?php do_action( 'rwpm_form_send' ); ?>
				    <p class="submit"><input type="submit" value="Envoyer" class="button-primary" id="submit-mp" name="submit-mp"></p>
			</form>
    </aside>
<?php endif; ?>
    <?php if(!dynamic_sidebar('sidebar-1')): ?>
    <?php endif; ?>
</div>
<?php endif; ?>
