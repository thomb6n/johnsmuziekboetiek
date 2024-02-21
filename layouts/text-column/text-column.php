<?php
$layout_name = basename( __FILE__, '.php' );
$prefix      = $layout_name . '_';
$content     = ! empty( $args['content'] ) ? $args['content'] : get_sub_field( $prefix . 'content' );
if ( empty( $content ) ) {
	return;
}
?>
<section class="text-column has-background">
	<div class="container">
		<div class="content">
			<?php
			if ( $content ) {
				echo $content;
			}
			?>
		</div>
	</div>
</section>
