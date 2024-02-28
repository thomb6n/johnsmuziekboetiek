<?php
$layout_name = basename( __FILE__, '.php' );
$prefix      = $layout_name . '_';

$args = array(
	'post_type'      => 'faq',
	'post_status'    => array( 'publish' ),
	'posts_per_page' => -1,
);

$query = new WP_Query( $args );

if ( ! $query->post_count ) {
	return;
}
?>
<section class="faqs">
	<div class="container">
		<div class="faqs-wrapper">
			<?php
			while ( $query->have_posts() ) {
				$query->the_post();
				$faq_question = get_the_title();
				$faq_answer   = get_the_content();

				if ( ! $faq_question || ! $faq_answer ) {
					continue;
				}
				?>
				<details class="faq">
					<summary class="faq-question"><?php echo $faq_question; ?></summary>
					<div class="faq-answer">
						<?php echo apply_filters( 'the_content', $faq_answer ); ?>
					</div>
				</details>
				<?php
			}
			?>
		</div>
	</div>
</section>
<script type="application/ld+json">
{
	"@context": "https://schema.org",
	"@type": "FAQPage",
	"mainEntity": [
		<?php
		$count = 0;
		while ( $query->have_posts() ) {
			$query->the_post();
			$faq_question = get_the_title();
			$faq_answer   = get_the_content();

			if ( ! $faq_question || ! $faq_answer ) {
				continue;
			}
			?>
			{
				"@type": "Question",
				"name": "<?php echo $faq_question; ?>",
				"acceptedAnswer": {
					"@type": "Answer",
					"text": "<?php echo wp_strip_all_tags( $faq_answer, true ); ?>"
				}
			}
			<?php
			$count++;
			if ( $count < $query->post_count ) {
				echo ',';
			}
		}
		?>
	]
}
</script>
