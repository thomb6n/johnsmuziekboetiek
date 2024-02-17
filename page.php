<?php
get_header();

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		the_content();

		if ( have_rows( 'layouts' ) ) {
			while ( have_rows( 'layouts' ) ) {
				the_row();
				get_template_part( 'layouts/' . get_row_layout() . '/' . get_row_layout() );
			}
		}
	}
}

get_footer();
