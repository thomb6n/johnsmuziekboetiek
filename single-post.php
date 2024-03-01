<?php
$news = get_the_ID();

$title     = get_the_title( $news );
$image     = get_the_post_thumbnail_url( $news, 'full' );
$content   = get_the_content( $news );
$category  = get_the_category( $news );
$category  = $category[0]->name;
$date      = get_the_date( 'd-m-Y', $news );
$tags      = get_the_tags( $news );
$tags      = $tags ? wp_list_pluck( $tags, 'name' ) : array();
$permalink = get_the_permalink( $news );

get_header();
?>
<section class="header has-background" style="background-image: url('<?php echo $image ? $image : IMAGEPATH . 'johns-header.jpg'; ?>')">
	<div class="container">
		<div class="content">
			<h1 class="title"><?php the_title(); ?></h1>
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

<section class="single-news-section">
	<div class="container">
		<div class="news-overview-wrapper">
			<article>
				<header>
					<?php
					if ( $category ) {
						?>
						<span class="category-tag"><?php echo $category; ?></span>
						<?php
					}

					if ( $date ) {
						?>
						<p class="date-meta">
							<?php echo __( 'Published on', 'toms' ) . ' ' . $date; ?>
						</p>
						<?php
					}
					?>
				</header>

				<main>
					<div class="content-wrapper">
						<div class="content-body">
							<?php echo apply_filters( 'the_content', $content ); ?>
						</div>
					</div>
				</main>
			</article>
		</div>
	</div>
</section>
<?php
if ( have_rows( 'layouts' ) ) {
	while ( have_rows( 'layouts' ) ) {
		the_row();
		get_template_part( 'layouts/' . get_row_layout() . '/' . get_row_layout() );
	}
}

get_template_part( 'layouts/reviews/reviews' );

get_footer();
