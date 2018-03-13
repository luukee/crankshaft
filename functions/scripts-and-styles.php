<?php
/**
 * Enqueue scripts and styles.
 */
function crankshaft_scripts() {
	$theme = wp_get_theme();
	$version = $theme->get('Version');

	$asset_directory = get_template_directory_uri() . '/dist/assets/';

	wp_enqueue_style( 'crankshaft-app-style', $asset_directory . 'css/app.css', null, $version );

	// Put your custom styles in style.css and uncomment the below if you're not using the sass version.
	// wp_enqueue_style( 'crankshaft-custom-style', get_stylesheet_uri() );

	wp_enqueue_script( 'crankshaft-app-js', $asset_directory . 'js/app.js', array( 'jquery' ), $version, true );

	wp_enqueue_script( 'crankshaft-skip-link-focus-fix', $asset_directory . 'wp-js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'crankshaft_scripts' );
