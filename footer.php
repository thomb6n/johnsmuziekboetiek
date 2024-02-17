</main>
<footer id="site-footer">
	<h2 class="screen-reader-text">
		<?php _e( 'Site footer', 'toms' ); ?>
	</h2>
	<div class="footer-columns">
		<div class="container-large">
			<div class="footer-columns-container widgets">
				<div class="footer-column">
					<?php dynamic_sidebar( 'footer-1' ); ?>
				</div>
				<div class="footer-column">
					<?php dynamic_sidebar( 'footer-2' ); ?>
				</div>
				<div class="footer-column">
					<?php dynamic_sidebar( 'footer-3' ); ?>
				</div>
				<div class="footer-column">
					<?php dynamic_sidebar( 'footer-4' ); ?>
				</div>
			</div>
		</div>
	</div>


	<div class="copyright-wrapper">
		<div class="copyright">
			<div class="container-large">
				<?php dynamic_sidebar( 'copyright' ); ?>
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>

</html>
