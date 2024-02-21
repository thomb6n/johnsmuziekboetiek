<?php

use function PHPSTORM_META\type;

$layout_name = basename( __FILE__, '.php' );
$prefix      = $layout_name . '_';
$title       = ! empty( $args['title'] ) ? $args['title'] : get_sub_field( $prefix . 'title' );
$subtitle    = ! empty( $args['subtitle'] ) ? $args['subtitle'] : get_sub_field( $prefix . 'subtitle' );
$query       = ! empty( $args['query'] ) ? $args['query'] : get_sub_field( $prefix . 'query' );

if ( 'handpicked' === $query ) {
	$products = ! empty( $args['products'] ) ? $args['products'] : get_sub_field( $prefix . 'choice' );
} elseif ( 'category' === $query ) {
	$category = get_sub_field( $prefix . 'category' );
	$products = wc_get_products(
		array(
			'product_category_id' => array( $category ),
			'limit'               => 6,
		)
	);
} elseif ( 'latest' === $query ) {
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
					get_template_part( 'template-parts/grid-card', 'product', array( 'product' => $product ) );
				}
				?>
			</div>
		</div>
	</div>
</section>
