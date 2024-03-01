<?php
$layout_name = basename( __FILE__, '.php' );
$prefix      = $layout_name . '_';
$title       = get_sub_field( $prefix . 'title' );
$background  = get_sub_field( $prefix . 'background' );
if ( $background ) {
	?>
	<style>
		<?php
		if ( is_front_page() ) {
			?>
			.header {
				&.has-background {
					.title {
						color: #444;
					}

					&::before {
						content: unset;
					}

					@media screen and (min-width: 40rem) {
						&::before {
							background: linear-gradient(90deg, rgba(0, 0, 0, 0.5) 0%, rgba(0, 0, 0, 0.5) 45%, rgba(0, 0, 0, 0) 100%);
							content: "";
							inset: 0;
							position: absolute;
						}

						.title {
							color: #fff;
						}
					}
				}
			}
			<?php
		}
		?>

		@media screen and (min-width: 40rem) {
			.header.has-background {
				background-image: url('<?php echo $background['sizes']['large']; ?>');
			}
		}
	</style>
	<?php
}
?>
<section class="header <?php echo $background ? 'has-background' : ''; ?>">
	<div class="container">
		<div class="content">
			<?php
			if ( $title ) {
				?>
				<h1 class="title"><?php echo $title; ?></h1>
				<?php
			}

			if ( is_front_page() ) {
				?>
				<form action="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>" method="get" id="header-search">
					<input type="text" name="_product_search" placeholder="<?php _e( 'What are you looking for?', 'toms' ); ?>">
				</form>
				<?php
			}
			?>
		</div>
	</div>
</section>
