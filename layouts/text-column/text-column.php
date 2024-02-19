<?php
$layout_name = basename( __FILE__, '.php' );
$prefix      = $layout_name . '_';
$content     = get_sub_field( $prefix . 'content' );
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
