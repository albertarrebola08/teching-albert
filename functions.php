<?php
add_action( 'wp_enqueue_scripts', 'understrap_child_enqueue_styles', 20 );
function understrap_child_enqueue_styles() {
	// Estilos del tema padre
	wp_enqueue_style( 'understrap-styles', get_template_directory_uri() . '/style.css' );
	// Tus estilos de hijo
	wp_enqueue_style( 'understrap-child-styles',
		get_stylesheet_directory_uri() . '/style.css',
		array( 'understrap-styles' )
	);
}
