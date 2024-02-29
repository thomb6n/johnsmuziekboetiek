<?php
$layout_name = basename( __FILE__, '.php' );
$prefix      = $layout_name . '_';
$content     = ! empty( $args['content'] ) ? $args['content'] : get_sub_field( $prefix . 'content' );
if ( empty( $content ) ) {
	return;
}
$background = ! empty( $args['background'] ) ? $args['background'] : get_sub_field( $prefix . 'background' );
?>
<section class="text-column <?php echo ! empty( $background ) && 'no-background' !== $background ? 'has-background ' . $background : 'no-background'; ?>">
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
