<?php
add_filter( 'searchwp\query\partial_matches', '__return_true' );
add_filter( 'searchwp\query\partial_matches\fuzzy', '__return_false' );

function toms_searchwp_partial_matches_lenient( $return, $args ) {
	return $return;
}
add_filter( 'searchwp_partial_matches_lenient', 'toms_searchwp_partial_matches_lenient', 10, 2 );
