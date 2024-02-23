<?php
$layout_name = 'form';
$form_ids    = array();

if ( class_exists( 'GFAPI' ) ) {
	$forms = GFAPI::get_forms( true );
	foreach ( $forms as $form ) {
		$form_ids[ $form['id'] ] = $form['title'];
	}
}

$layouts[ $layout_name ] = array(
	'order'      => 1,
	'key'        => 'layout_' . $layout_name,
	'name'       => $layout_name,
	'label'      => __( 'Form', 'toms' ),
	'display'    => 'block',
	'sub_fields' => array(
		array(
			'key'      => 'field_' . $layout_name . '_title',
			'label'    => __( 'Title', 'toms' ),
			'name'     => $layout_name . '_title',
			'type'     => 'text',
			'required' => 1,
		),
		array(
			'key'   => 'field_' . $layout_name . '_text',
			'label' => __( 'Text', 'toms' ),
			'name'  => $layout_name . '_text',
			'type'  => 'textarea',
		),
		array(
			'key'      => 'field_' . $layout_name . '_form',
			'label'    => __( 'Form', 'toms' ),
			'name'     => $layout_name . '_form',
			'type'     => 'radio',
			'required' => 1,
			'choices'  => $form_ids,
		),
	),
);
