<?php
$layout_name = basename( __FILE__, '.php' );
$prefix      = $layout_name . '_';
$title       = get_sub_field( $prefix . 'title' );
$background  = get_sub_field( $prefix . 'background' );
?>
<section class="header <?php echo $background ? 'has-background' : ''; ?>" <?php echo $background ? 'style="background-image: url(' . $background['sizes']['large'] . ')"' : ''; ?>>
	<div class="container">
		<div class="content">
			<?php
			if ( $title ) {
				?>
				<h1 class="title"><?php echo $title; ?></h1>
				<?php
			}

			if ( is_front_page() ) {
				?>
				<form action="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>" method="get" id="header-search">
					<input type="text" name="_product_search" placeholder="<?php _e( 'What are you looking for?', 'toms' ); ?>">
				</form>
				<?php
			}
			?>
		</div>
	</div>
</section>
