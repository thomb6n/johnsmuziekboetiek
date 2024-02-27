<?php
$layout_name = basename( __FILE__, '.php' );
$prefix      = $layout_name . '_';
$title       = get_sub_field( $prefix . 'title' );
$text        = get_sub_field( $prefix . 'text' );
$milestones  = ! empty( get_sub_field( $prefix . 'milestones' ) ) ? get_sub_field( $prefix . 'milestones' ) : array();

if ( 0 === count( $milestones ) ) {
	return;
}
?>
<section class="timeline">
	<div class="container">
		<div class="content">
			<?php
			if ( $title || $text ) {
				?>
				<div class="text-wrapper">
					<?php
					if ( $title ) {
						?>
						<h2 class="title"><?php echo $title; ?></h2>
						<?php
					}

					if ( $text ) {
						?>
						<p class="text"><?php echo $text; ?></p>
						<?php
					}
					?>
				</div>
				<?php
			}
			?>

			<div class="timeline-wrapper">
				<?php
				foreach ( $milestones as $milestone ) {
					?>
					<div class="milestone">
						<h3 class="title"><?php echo $milestone[ $prefix . 'title' ]; ?></h3>
						<p class="date"><?php echo $milestone[ $prefix . 'date' ]; ?></p>
					</div>
					<?php
				}
				?>
			</div>
		</div>
	</div>
</section>
