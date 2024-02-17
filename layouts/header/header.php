<?php
$layout_name = basename( __FILE__, '.php' );
$prefix      = $layout_name . '_';
$title       = get_sub_field( $prefix . 'title' );
$pretitle    = get_sub_field( $prefix . 'pretitle' );
?>
<section class="header">
	<div class="container">
		<div class="content">
			<?php
			if ( $pretitle ) {
				?>
				<p class="pretitle"><?php echo $pretitle; ?></p>
				<?php
			}

			if ( $title ) {
				?>
				<h1 class="title"><?php echo $title; ?></h1>
				<?php
			}
			?>
		</div>
	</div>
</section>
