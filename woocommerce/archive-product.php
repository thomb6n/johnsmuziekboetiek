<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

get_header( 'shop' );

?>
<section class="header has-background" style="background-image: url('<?php echo IMAGEPATH . 'johns-header.jpg'; ?>')">
	<div class="container">
		<div class="content">
			<h1 class="title"><?php woocommerce_page_title(); ?></h1>
		</div>
	</div>
</section>

<div class="breadcrumbs-wrapper">
	<div class="container">
		<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
			<?php
			if ( function_exists( 'bcn_display' ) && ! is_front_page() ) {
				bcn_display();
			}
			?>
		</div>
	</div>
</div>

<section class="products-overview">
	<div class="container">
		<div class="products-overview-wrapper">
			<aside class="filtering">
				<h2><?php _e( 'Filters', 'toms' ); ?></h2>
				<?php echo facetwp_display( 'facet', 'search' ); ?>
				<?php echo facetwp_display( 'facet', 'product_cat' ); ?>
				<button class="filters-trigger toggle-offcanvas" data-toggle="offcanvas-filters"><?php _e( 'Filters', 'toms' ); ?> <i class="fa-solid fa-sliders-up"></i></button>
			</aside>

			<div class="products-grid">
				<?php
				echo facetwp_display( 'facet', 'results_count' );

				if ( woocommerce_product_loop() ) {
					woocommerce_product_loop_start();

					if ( wc_get_loop_prop( 'total' ) ) {
						while ( have_posts() ) {
							the_post();
							get_template_part( 'template-parts/grid-card', 'product' );
						}
					}

					woocommerce_product_loop_end();
				} else {
					do_action( 'woocommerce_no_products_found' );
				}
				?>

				<nav class="woocommerce-facet-pagination">
					<?php echo facetwp_display( 'facet', 'pagination' ); ?>
				</nav>
			</div>

			<div class="offcanvas offcanvas-filters closed" data-toggler="offcanvas-filters" style="display: none;">
				<div class="inner">
					<div class="top">
						<h2><?php _e( 'Filters', 'toms' ); ?></h2>
						<button class="filters-close toggle-offcanvas" data-toggle="offcanvas-filters"><i class="fa-regular fa-xmark"></i></button>
					</div>
					<?php echo facetwp_display( 'facet', 'search' ); ?>
					<?php echo facetwp_display( 'facet', 'product_cat' ); ?>
					<button class="toggle-offcanvas filters-close show-results" data-toggle="offcanvas-filters" aria-label="<?php echo __( 'Show results', 'toms' ); ?>" type="button" tabindex="0">
						<?php echo __( 'Show results', 'toms' ); ?>
					</button>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
$title    = __( 'Related categories', 'toms' );
$category = get_term_by( 'slug', get_query_var( 'product_cat' ), 'product_cat' );

if ( $category ) {
	$categories = woocommerce_get_product_subcategories( $category->term_id );
} else {
	// There's no category on the shop page
	$title      = __( 'Popular categories', 'toms' );
	$categories = get_terms(
		array(
			'taxonomy'   => 'product_cat',
			'hide_empty' => true,
			'number'     => 4,
			'orderby'    => 'count',
			'order'      => 'DESC',
		)
	);
}

if ( empty( $categories ) ) {
	$parent_category = get_term( $category->parent, 'product_cat' );
	$categories      = woocommerce_get_product_subcategories( $parent_category->term_id );
	$title           = __( 'Other categories of', 'toms' ) . ' ' . $parent_category->name;
}

$random_keys       = array_rand( $categories, 4 );
$random_categories = array();

foreach ( $random_keys as $key ) {
	// If the category is the same as the current category, or if the category is already in the array, take the next key
	if ( $category && $category->term_id === $categories[ $key ]->term_id || in_array( $categories[ $key ], $random_categories, true ) ) {
		++$key;
	}
	$random_categories[] = $categories[ $key ];
}

get_template_part(
	'layouts/categories/categories',
	'',
	array(
		'categories' => $random_categories,
		'title'      => $title,
	)
);

get_template_part( 'layouts/reviews/reviews' );

if ( $category && ! empty( $category->description ) ) {
	get_template_part( 'layouts/text-column/text-column', '', array( 'content' => apply_filters( 'the_content', $category->description ) ) );
}
?>

<?php
get_footer( 'shop' );
