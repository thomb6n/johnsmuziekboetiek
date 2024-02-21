<?php

function toms_facetwp_custom_expand( $assets ) {
	FWP()->display->json['expand']   = '<span class="facetwp-toggle expand"></span>';
	FWP()->display->json['collapse'] = '<span class="facetwp-toggle collapse"></span>';

	return $assets;
}
add_filter( 'facetwp_assets', 'toms_facetwp_custom_expand' );
