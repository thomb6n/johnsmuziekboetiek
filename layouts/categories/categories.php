<?php
$layout_name = basename( __FILE__, '.php' );
$prefix      = $layout_name . '_';
$title       = get_sub_field( $prefix . 'title' );
$categories  = get_sub_field( $prefix . 'categories' );
?>
<section class="categories">
	<div class="container">
		<div class="content">
			<?php
			if ( $title ) {
				?>
				<h1 class="title"><?php echo $title; ?></h1>
				<?php
			}

			if ( $categories ) {
				?>
				<div class="categories-wrapper">
				<?php
				foreach ( $categories as $cat ) {
					$cat_title        = get_term_field( 'name', $cat );
					$cat_count        = get_term_field( 'count', $cat );
					$cat_thumbnail_id = get_term_meta( $cat, 'thumbnail_id', true );
					if ( $cat_thumbnail_id ) {
						$cat_image = wp_get_attachment_url( $cat_thumbnail_id );
					}
					$cat_url = get_term_link( $cat );
					?>
					<div class="category-card" <?php echo $cat_image ? 'style="background-image: url(' . $cat_image . ')"' : ''; ?>>
						<div class="card-content">
							<h3 class="category-title"><?php echo $cat_title; ?></h3>
							<p class="product-count"><?php echo $cat_count . ' ' . __( 'products', 'toms' ); ?></p>
						</div>
						<a href="<?php echo $cat_url; ?>" class="overlay-link"></a>
					</div>
					<?php
				}
				?>
				<div class="categories-wrapper">
				<?php
			}
			?>
		</div>
	</div>
</section>
