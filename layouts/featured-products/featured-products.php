<?php

use function PHPSTORM_META\type;

$layout_name = basename( __FILE__, '.php' );
$prefix      = $layout_name . '_';
$title       = get_sub_field( $prefix . 'title' );
$subtitle    = get_sub_field( $prefix . 'subtitle' );
$query       = get_sub_field( $prefix . 'query' );

if ( 'handpicked' === $query ) {
	$products = get_sub_field( $prefix . 'choice' );
} elseif ( 'category' === $query ) {
	$category = get_sub_field( $prefix . 'category' );
	$products = wc_get_products(
		array(
			'category' => $category,
		)
	);
} else {
	$products = wc_get_products(
		array(
			'limit' => 6,
		)
	);
}
?>
<section class="featured-products">
	<div class="container">
		<div class="content">
			<?php
			if ( $title ) {
				?>
				<h2 class="title"><?php echo $title; ?></h2>
				<?php
			}

			if ( $subtitle ) {
				?>
				<p class="subtitle"><?php echo $subtitle; ?></p>
				<?php
			}
			?>

			<div class="products">
				<?php
				foreach ( $products as $product ) {
					if ( ! $product instanceof WC_Product ) {
						$product = wc_get_product( $product );
					}

					$image = $product->get_image_id();
					$image = wp_get_attachment_image_url( $image, 'small' );
					$url   = $product->get_permalink();
					?>
					<div class="product">
						<img src="<?php echo $image; ?>" alt="">
						<h3 class="title"><?php echo $product->get_title(); ?></h3>
						<p class="price"><?php echo $product->get_price_html(); ?></p>
						<a href="<?php echo $url; ?>" class="overlay-link"></a>
					</div>
					<?php
				}
				?>
			</div>
		</div>
	</div>
</section>
