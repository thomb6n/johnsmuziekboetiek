<?php

function toms_setup_theme() {
	add_filter( 'use_block_editor_for_post', '__return_false', 10 );
	add_filter( 'use_block_editor_for_post_type', '__return_false', 10 );
	add_filter( 'use_widgets_block_editor', '__return_false' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

	add_theme_support( 'menus' );
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );

	register_nav_menus(
		array(
			'primary'   => __( 'Primary Menu', 'toms' ),
			'secondary' => __( 'Secondary Menu', 'toms' ),
		)
	);
}
add_action( 'after_setup_theme', 'toms_setup_theme' );

function toms_load_assets() {
	wp_dequeue_style( 'wp-block-library' );
	wp_deregister_style( 'wp-block-library' );
	wp_deregister_style( 'global-styles' );

	wp_enqueue_script( 'toms-bundle', get_template_directory_uri() . '/dist/bundle.js', array(), false, true );
}
add_action( 'wp_enqueue_scripts', 'toms_load_assets' );

function tom_register_sidebars() {
	$footer_areas = 4;

	for ( $i = 1; $i <= $footer_areas; $i++ ) {
		register_sidebar(
			array(
				'id'            => 'footer-' . $i,
				'name'          => __( 'Footer', 'toms' ) . ' ' . $i,
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<span class="widget-title">',
				'after_title'   => '</span>',
			)
		);
	}

		register_sidebar(
			array(
				'id'            => 'copyright',
				'name'          => __( 'Copyright', 'toms' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<span class="copyright-title">',
				'after_title'   => '</span>',
			)
		);

		register_sidebar(
			array(
				'id'            => 'topbar-left',
				'name'          => __( 'Top Bar Left', 'toms' ),
				'before_widget' => '',
				'after_widget'  => '',
				'before_title'  => '<span class="topbar-left-title">',
				'after_title'   => '</span>',
			)
		);

		register_sidebar(
			array(
				'id'            => 'topbar-right',
				'name'          => __( 'Top Bar Right', 'toms' ),
				'before_widget' => '',
				'after_widget'  => '',
				'before_title'  => '<span class="topbar-right-title">',
				'after_title'   => '</span>',
			)
		);
}
add_action( 'widgets_init', 'tom_register_sidebars' );
