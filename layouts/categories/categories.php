<?php
$layout_name = basename( __FILE__, '.php' );
$prefix      = $layout_name . '_';
$title       = ! empty( $args['title'] ) ? $args['title'] : get_sub_field( $prefix . 'title' );
$categories  = ! empty( $args['categories'] ) ? $args['categories'] : get_sub_field( $prefix . 'categories' );
?>
<section class="categories">
	<div class="container">
		<div class="content">
			<?php
			if ( $title ) {
				?>
				<h2 class="title"><?php echo $title; ?></h2>
				<?php
			}

			if ( $categories ) {
				?>
				<div class="categories-wrapper">
				<?php
				foreach ( $categories as $cat ) {
					if ( ! is_int( $cat ) ) {
						$cat = $cat->term_id;
					}

					$terms = get_terms(
						array(
							'taxonomy'   => 'product_cat',
							'hide_empty' => false,
							'include'    => array( $cat ),
						)
					);

					$cat_title        = get_term_field( 'name', $cat );
					$cat_count        = $terms[0]->count;
					$cat_thumbnail_id = get_term_meta( $cat, 'thumbnail_id', true );
					$cat_image        = false;
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
						<a href="<?php echo $cat_url; ?>" class="overlay-link">
							<span class="screen-reader-text"><?php echo __( 'Go to', 'toms' ) . ' ' . $cat_title; ?></span>
						</a>
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
