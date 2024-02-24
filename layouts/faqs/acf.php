<?php
$layout_name = 'faqs';

$layouts[ $layout_name ] = array(
	'order'      => 1,
	'key'        => 'layout_' . $layout_name,
	'name'       => $layout_name,
	'label'      => __( 'FAQs', 'toms' ),
	'display'    => 'block',
	'sub_fields' => array(
		array(
			'key'     => 'field_' . $layout_name . '_message',
			'label'   => __( 'Message', 'toms' ),
			'name'    => $layout_name . '_message',
			'type'    => 'message',
			'message' => __( 'This is the FAQs layout. It will show all the published FAQs.', 'toms' ),
		),
	),
);
