<?php
/**
 * @package doculab
 */
?>
<?php global $gridz_options; ?>
<?php if(is_active_sidebar('sidebar-1')): ?>
<div id="primary" class="widget-area widget-area-<?php echo $gridz_options['sidebar_layout']; ?>" role="complementary">
    <?php if(!dynamic_sidebar('sidebar-1')): ?>
    <?php endif; ?>
</div>
<?php endif; ?>
