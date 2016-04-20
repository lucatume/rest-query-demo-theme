<?php
add_action( 'after_switch_theme', 'flush_rewrite_rules' );

add_action( 'generate_rewrite_rules', function () {
	global $wp_rewrite;

	$homeUrl      = trailingslashit( home_url() );
	$themePath    = str_replace( $homeUrl, '', get_stylesheet_directory_uri() );
	$includesPath = str_replace( $homeUrl, '', includes_url() );

	$themeRewrites = array(
		'css/(.*)'          => $themePath . '/css/$1',
		'js/jquery.js'      => $includesPath . 'js/jquery/jquery.js',
		'js/underscores.js' => $includesPath . 'js/underscore.min.js',
		'js/backbone.js'    => $includesPath . 'js/backbone.min.js',
		'js/(.*)'           => $themePath . '/js/$1',
	);

	$wp_rewrite->non_wp_rules = array_merge( $wp_rewrite->non_wp_rules, $themeRewrites );

	return;
} );
