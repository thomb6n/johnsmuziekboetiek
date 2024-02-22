<?php
$news = ! empty( $args['news'] ) ? $args['news'] : get_the_ID();

$title     = get_the_title( $news );
$image     = get_the_post_thumbnail_url( $news, 'medium' );
$excerpt   = get_the_excerpt( $news );
$category  = get_the_category( $news );
$category  = $category[0]->name;
$date      = get_the_date( 'd-m-Y', $news );
$tags      = get_the_tags( $news );
$tags      = $tags ? wp_list_pluck( $tags, 'name' ) : array();
$permalink = get_the_permalink( $news );
?>
<div class="row-card-news">
	<?php
	if ( $image ) {
		?>
		<div class="image-wrapper" style="background-image: url('<?php echo $image; ?>')"></div>
		<?php
	}
	?>
	<div class="content-wrapper">
		<div class="content-header">
			<div class="content-left">
				<h3 class="title"><?php echo $title; ?></h3>
				<p class="date">
					<?php echo $date; ?>
				</p>
			</div>
			<div class="content-right">
				<span class="category"><?php echo $category; ?></span>
			</div>
		</div>
		<div class="excerpt-body">
			<p><?php echo $excerpt; ?></p>
		</div>
	</div>
	<a href="<?php echo $permalink; ?>" class="overlay-link"></a>
</div>
