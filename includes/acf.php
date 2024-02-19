<?php

if ( function_exists( 'acf_add_local_field_group' ) ) {
	function toms_add_acf_layouts() {
		$layouts = toms_get_layouts();

		acf_add_local_field_group(
			array(
				'key'                   => 'group_layouts',
				'title'                 => 'Layouts Group',
				'fields'                => array(
					array(
						'key'          => 'field_layouts',
						'label'        => __( 'Layouts', 'toms' ),
						'name'         => 'layouts',
						'type'         => 'flexible_content',
						'layouts'      => $layouts,
						'button_label' => __( 'Add new layout', 'toms' ),
					),
				),
				'location'              => array(
					array(
						array(
							'param'    => 'post_type',
							'operator' => '==',
							'value'    => 'page',
						),
					),
				),
				'position'              => 'acf_after_title',
				'label_placement'       => 'top',
				'instruction_placement' => 'label',
				'active'                => true,
				'hide_on_screen'        => array(
					0 => 'the_content',
				),
			),
		);

		acf_add_local_field_group(
			array(
				'key'                   => 'group_review_fields',
				'title'                 => 'Review Fields',
				'fields'                => array(
					array(
						'key'      => 'field_review_stars',
						'label'    => __( 'Review Stars', 'toms' ),
						'name'     => 'review-stars',
						'type'     => 'number',
						'required' => 1,
						'min'      => 1,
						'max'      => 5,
					),
					array(
						'key'      => 'field_review_text',
						'label'    => __( 'Review Text', 'toms' ),
						'name'     => 'review-text',
						'type'     => 'text',
						'required' => 1,
					),
					array(
						'key'      => 'field_review_author',
						'label'    => __( 'Review Author', 'toms' ),
						'name'     => 'review-author',
						'type'     => 'text',
						'required' => 1,
					),
					array(
						'key'   => 'field_review_source',
						'label' => __( 'Review Source', 'toms' ),
						'name'  => 'review-source',
						'type'  => 'url',
					),
				),
				'location'              => array(
					array(
						array(
							'param'    => 'post_type',
							'operator' => '==',
							'value'    => 'review',
						),
					),
				),
				'position'              => 'acf_after_title',
				'label_placement'       => 'top',
				'instruction_placement' => 'label',
				'active'                => true,
				'hide_on_screen'        => array(
					0 => 'the_content',
				),
			),
		);
	}
	add_action( 'acf/include_fields', 'toms_add_acf_layouts' );
}

function toms_get_layouts() {
	$layouts     = array();
	$layouts_dir = THEME_DIR . '/layouts';
	$layout_dirs = array_diff( scandir( $layouts_dir ), array( '..', '.' ) );

	foreach ( $layout_dirs as $dir ) {
		$acf_file = "$layouts_dir/$dir/acf.php";

		if ( file_exists( $acf_file ) ) {
			include_once $acf_file;
		}
	}

	return $layouts;
}
