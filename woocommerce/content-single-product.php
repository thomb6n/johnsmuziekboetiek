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
$categories             = get_the_terms( $product->get_id(), 'product_cat' );
$gtin                   = $product->get_meta( '_wc_gla_gtin' );
$wishlist               = toms_get_wishlist();

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
						<div class="buttons-wrapper">
							<?php
							if ( 'outofstock' === $product->get_stock_status() ) {
								?>
								<p class="out-of-stock"><?php _e( 'Out of stock', 'toms' ); ?></p>
								<p class="info-notice"><a href="<?php echo get_bloginfo( 'wpurl' ) . '/product-aanvragen/'; ?>"><?php _e( 'We\'re sorry, this item is currently not available. Would you like to be notified when it\'s back in stock?', 'toms' ); ?> <i class="fa-solid fa-arrow-right"></i></a></p>
								<?php
							} else {
								?>
								<a href="<?php echo $product->add_to_cart_url(); ?>" class="button add-to-cart">
									<?php _e( 'Add to cart', 'toms' ); ?>
								</a>
								<?php
							}

							if ( $wishlist && in_array( get_the_ID(), $wishlist, false ) ) {
								?>
								<button class="button remove-from-wishlist" data-product-id="<?php echo get_the_ID(); ?>">
									<?php _e( 'Remove from wishlist', 'toms' ); ?>
								</button>
								<?php
							} else {
								?>
								<button class="button add-to-wishlist" data-product-id="<?php echo get_the_ID(); ?>">
									<?php _e( 'Add to wishlist', 'toms' ); ?>
								</button>
								<?php
							}
							?>
						</div>
						<?php
					}
					?>
					<div class="categories">
						<?php
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
					<?php
					if ( $gtin ) {
						$label = in_array( 'Boeken', array_column( $categories, 'name' ), true ) ? 'ISBN: ' : 'EAN: ';
						echo '<p class="gtin">' . $label . esc_html( $gtin ) . '</p>';
					}
					?>
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
							$youtube_note      = $youtube_video['product-youtube-note'];
							?>
							<div class="product-video">
								<?php
								echo wp_oembed_get( $youtube_video_url );

								if ( $youtube_note ) {
									?>
									<p class="video-note"><?php echo $youtube_note; ?></p>
									<?php
								}
								?>
							</div>
							<?php
						}
						?>
					</div>
				</div>
				<?php
			}

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

			/*
			* Programmatically find Related content from SearchWP Related
			*/

			// Instantiate SearchWP Related
			$searchwp_related = new SearchWP_Related();

			// Use the keywords as defined in the SearchWP Related meta box
			$keywords = get_post_meta( get_the_ID(), $searchwp_related->meta_key, true );

			$args = array(
				's'              => $keywords,  // The stored keywords to use
				'engine'         => 'default',  // the SearchWP engine to use
				'posts_per_page' => 6,          // how many entries to find
			);

			// Retrieve Related content for the current post
			$related_content = $searchwp_related->get( $args );

			// Returns an array of Post objects for you to loop through
			if ( count( $related_content ) ) {
				get_template_part(
					'layouts/featured-products/featured-products',
					'',
					array(
						'products' => $related_content,
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
$item_condition      = str_contains( $product_title, 'Nieuw' ) ? 'https://schema.org/NewCondition' : 'https://schema.org/UsedCondition';
$availability        = 'outofstock' === $product->get_stock_status() ? 'https://schema.org/OutOfStock' : 'https://schema.org/InStock';
$product_description = wp_strip_all_tags( $product_description, true );
$product_description = str_replace( '"', '', $product_description );
$product_title       = str_replace( '"', '', $product_title );
$gtin_clean          = str_replace( '-', '', str_replace( ' ', '', $gtin ) );
?>

<script type="application/ld+json">
{
	"@context": "https://schema.org/",
	"@type": "Product",
	<?php
	if ( $gtin ) {
		?>
		"gtin<?php echo strlen( $gtin_clean ); ?>": "<?php echo $gtin_clean; ?>",
		<?php
	}
	?>
	"name": "<?php echo $product_title; ?>",
	"image": [
		"<?php echo $product_image; ?>"
		],
	"description": "<?php echo $product_description; ?>",
	"offers": {
		"@type": "Offer",
		"url": "<?php echo get_the_permalink(); ?>",
		"priceCurrency": "<?php echo get_woocommerce_currency(); ?>",
		"price": <?php echo $product->get_price(); ?>,
		"itemCondition": "<?php echo $item_condition; ?>",
		"availability": "<?php echo $availability; ?>"

	}
}
</script>

<?php
do_action( 'woocommerce_template_single_add_to_cart' );
do_action( 'woocommerce_after_single_product' );
?>
