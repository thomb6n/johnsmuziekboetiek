<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;
$product_title          = get_the_title();
$product_price          = $product->get_price_html();
$product_description    = get_the_content();
$image_id               = $product->get_image_id();
$product_image          = wp_get_attachment_image_url( $image_id, 'full' );
$product_gallery        = $product->get_gallery_image_ids();
$product_spotify_embed  = get_field( 'product-spotify-embed', $product->get_id() );
$product_youtube_videos = get_field( 'product-youtube-videos', $product->get_id() );
$related_products       = wc_get_related_products( $product->get_id(), 6 );

$in_cart = false;
if ( in_array( $product->get_id(), array_column( WC()->cart->get_cart(), 'product_id' ), true ) ) {
	$in_cart = true;
}

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
	<div class="container">
		<div class="product-content-wrapper">
			<div class="product-content">
				<div class="images-wrapper">
					<div class="image-wrapper">
						<a href="<?php echo $product_image; ?>" data-fancybox="product-gallery">
							<img src="<?php echo $product_image; ?>" alt="">
						</a>
					</div>
					<?php
					if ( count( $product_gallery ) ) {
						?>
						<div class="gallery">
							<?php
							foreach ( $product_gallery as $image_id ) {
								$image_url = wp_get_attachment_image_url( $image_id, 'large' );
								?>
								<div class="gallery-image">
									<a href="<?php echo $image_url; ?>" data-fancybox="product-gallery">
										<img src="<?php echo $image_url; ?>" alt="">
									</a>
								</div>
								<?php
							}
							?>
						</div>
						<?php
					}
					?>
				</div>
				<div class="product-information">
					<h1><?php echo $product_title; ?></h1>
					<div class="product-description">
						<?php echo apply_filters( 'the_content', $product_description ); ?>
					</div>
					<p class="price"><?php echo $product_price; ?></p>
					<?php
					if ( $in_cart ) {
						?>
						<a href="<?php echo wc_get_cart_url(); ?>" class="button view-cart">
							<?php _e( 'View cart', 'toms' ); ?>
						</a>
						<?php
					} else {
						?>
						<a href="<?php echo $product->add_to_cart_url(); ?>" class="button add-to-cart">
							<?php _e( 'Add to cart', 'toms' ); ?>
						</a>
						<?php
					}
					?>
					<div class="categories">
						<?php
						$categories = get_the_terms( $product->get_id(), 'product_cat' );
						if ( $categories ) {
							foreach ( $categories as $key => $category ) {
								$category_url = get_term_link( $category );
								?>
								<a href="<?php echo $category_url; ?>" class="category-tag"><?php echo $category->name; ?></a>
								<?php
							}
						}
						?>
					</div>
				</div>
			</div>

			<?php
			if ( $product_youtube_videos ) {
				?>
				<div class="product-videos">
					<h2><?php _e( 'Watch now', 'toms' ); ?></h2>
					<div class="videos-wrapper">
						<?php
						foreach ( $product_youtube_videos as $youtube_video ) {
							$youtube_video_url = $youtube_video['product-youtube-video'];
							?>
							<div class="product-video">
								<?php echo wp_oembed_get( $youtube_video_url ); ?>
							</div>
							<?php
						}
						?>
					</div>
				</div>
				<?php
			}
			?>

			<?php
			if ( $product_spotify_embed ) {
				?>
				<div class="product-spotify">
					<h2><?php _e( 'Listen now', 'toms' ); ?></h2>
					<div class="spotify-wrapper">
						<?php echo $product_spotify_embed; ?>
					</div>
				</div>
				<?php
			}
			?>

			<?php
			if ( $related_products ) {
				get_template_part(
					'layouts/featured-products/featured-products',
					'',
					array(
						'products' => $related_products,
						'query'    => 'handpicked',
						'title'    => __( 'You might also like these', 'toms' ),
					)
				);
			}
			?>
		</div>
	</div>
</div>

<?php
do_action( 'woocommerce_template_single_add_to_cart' );
do_action( 'woocommerce_after_single_product' );
?>
