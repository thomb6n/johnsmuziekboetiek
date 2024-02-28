<?php

function toms_modify_organization_schema( $data ) {
	$data['@type']     = 'OnlineStore';
	$data['telephone'] = '+31654956043';
	$data['email']     = 'info@johnsmuziekboetiek.nl';
	$data['vatID']     = 'NL003331855B55';

	var_dump( $data );

	return $data;
}
add_filter( 'wpseo_schema_organization', 'toms_modify_organization_schema', 999, 1 );

function toms_schema_change_search_url() {
	return 'https://johnsmuziekboetiek.nl/tweedehands-cds-boeken-films-games/?_product_search={search_term_string}';
}
add_filter( 'wpseo_json_ld_search_url', 'toms_schema_change_search_url' );
