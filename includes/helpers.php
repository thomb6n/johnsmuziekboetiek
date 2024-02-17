<?php

function toms_dd( mixed $value ): void {
	var_dump( $value );
	die();
}

function toms_ddd( mixed $value ): void {
	echo '<pre>';
	var_dump( $value );
	echo '</pre>';
	die();
}

function toms_nav_menu( string $theme_location = 'primary' ): void {
	wp_nav_menu(
		array(
			'container'      => false,
			'menu_class'     => 'menu',
			'theme_location' => $theme_location,
			'items_wrap'     => '<ul id="%1$s" class="%2$s" data-parent-link="true">%3$s</ul>',
			'link_after'     => '<i class="fa-solid fa-chevron-down submenu-toggle"></i>',
		)
	);
}
