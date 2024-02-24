<?php
get_header();
?>
<section class="header has-background" style="background-image: url('<?php echo IMAGEPATH . 'johns-header.jpg'; ?>')">
	<div class="container">
		<div class="content">
			<h1 class="title"><?php _e( 'News', 'toms' ); ?></h1>
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

<section class="news-overview">
	<div class="container">
		<div class="news-overview-wrapper">
			<aside class="filtering">
				<h2><?php _e( 'Filters', 'toms' ); ?></h2>
				<?php echo facetwp_display( 'facet', 'search' ); ?>
				<?php echo facetwp_display( 'facet', 'category' ); ?>
				<button class="filters-trigger toggle-offcanvas" data-toggle="offcanvas-filters"><?php _e( 'Filters', 'toms' ); ?> <i class="fa-solid fa-sliders-up"></i></button>
			</aside>

			<div class="news-overview-grid">
				<?php echo facetwp_display( 'facet', 'results_count' ); ?>
				<div class="news">
					<?php
					if ( have_posts() ) {
						while ( have_posts() ) {
							the_post();
							get_template_part( 'template-parts/row-card-news' );
						}
					}
					?>
				</div>

				<nav class="news-facet-pagination">
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
					<button class="toggle-offcanvas filters-close show-results" data-toggle="offcanvas-filters" aria-label="<?php echo __( 'Show results', 'toms' ); ?>" type="button" tabindex="0">
						<?php echo __( 'Show results', 'toms' ); ?>
					</button>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
get_template_part( 'layouts/reviews/reviews' );

get_footer();
