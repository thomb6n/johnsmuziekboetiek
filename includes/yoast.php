<?php

function toms_modify_organization_schema( $data ) {
	$data['@type']     = 'OnlineStore';
	$data['telephone'] = '+31654956043';
	$data['email']     = 'info@johnsmuziekboetiek.nl';
	$data['vatID']     = 'NL003331855B55';

	return $data;
}

add_filter( 'wpseo_schema_organization', 'toms_modify_organization_schema' );
