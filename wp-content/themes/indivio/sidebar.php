<?php
if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div id="sidebar" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->
