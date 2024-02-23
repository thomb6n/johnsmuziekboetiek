<?php
$layout_name = basename( __FILE__, '.php' );
$prefix      = $layout_name . '_';
$title       = get_sub_field( $prefix . 'title' );
$text        = get_sub_field( $prefix . 'text' );
$form        = get_sub_field( $prefix . 'form' );
?>
<section class="form">
	<div class="container">
		<div class="content">
			<?php
			if ( $title ) {
				?>
				<h2 class="title"><?php echo $title; ?></h2>
				<?php
			}

			if ( $text ) {
				?>
				<p class="description"><?php echo $text; ?></p>
				<?php
			}

			if ( $form ) {
				?>
				<div class="form">
					<?php
					echo do_shortcode( '[gravityform id="' . $form . '" title="false" description="false" ajax="true"]' );
					?>
				</div>
				<?php
			}
			?>
		</div>
	</div>
</section>
