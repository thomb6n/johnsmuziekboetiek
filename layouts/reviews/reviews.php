<?php
$layout_name = basename( __FILE__, '.php' );
$prefix      = $layout_name . '_';

$args = array(
	'post_type'      => 'review',
	'post_status'    => array( 'publish' ),
	'posts_per_page' => -1,
);

$query = new WP_Query( $args );
?>
<section class="reviews has-background">
	<div class="container">
		<div class="review-slider swiper">
			<div class="swiper-wrapper">
				<?php
				if ( $query->have_posts() ) {
					while ( $query->have_posts() ) {
						$query->the_post();
						$review_text   = get_field( 'review-text' );
						$review_stars  = get_field( 'review-stars' );
						$review_author = get_field( 'review-author' );
						$review_source = get_field( 'review-source' );
						?>
						<div class="review-slide swiper-slide">
							<?php
							if ( $review_stars ) {
								?>
								<div class="review-stars">
									<?php
									for ( $i = 0; $i < $review_stars; $i++ ) {
										?>
										<i class="fa-solid fa-star"></i>
										<?php
									}
									?>
								</div>
								<?php
							}

							if ( $review_text ) {
								?>
								<div class="review-text">
									<blockquote><?php echo $review_text; ?></blockquote>
								</div>
								<?php
							}

							if ( $review_author ) {
								?>
								<div class="review-author">
									<p><?php echo $review_author; ?></p>
								</div>
								<?php
							}

							if ( $review_source ) {
								?>
								<div class="review-source">
									<a href="<?php echo $review_source; ?>"><?php echo __( 'source:', 'toms' ) . ' ' . parse_url( $review_source, PHP_URL_HOST ); ?></a>
								</div>
								<?php
							}
							?>
						</div>
						<?php
					}
				}
				wp_reset_postdata();
				?>
			</div>
			<div class="review-slider-nav">
				<button class="slider-prev slider-arrow">
					<i class="fa-solid fa-chevron-left"></i>
				</button>
				<button class="slider-next slider-arrow">
					<i class="fa-solid fa-chevron-right"></i>
				</button>
			</div>
		</div>
	</div>
</section>
