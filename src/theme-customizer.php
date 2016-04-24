<?php
add_action( 'customize_register', function ( WP_Customize_Manager $customizeManager ) {

	// remove what we do not need
	$customizeManager->remove_section( 'title_tagline' );
	$customizeManager->remove_section( 'static_front_page' );

	// we cannot do this!
	// The right way to do it is to filter components on `customize_loaded_components` in a plugin.
	// Since we are in a theme we have to use JS to do it: see the function below.
	//	$customizeManager->remove_panel( 'nav_menus' );

	// let's add the template setting
	$customizeManager->add_setting( 'templateEngine', [
		'default'   => 'handlebars',
		'type'      => 'theme_mod',
		'transport' => 'refresh',
	] );

	$customizeManager->add_section( 'rqd_templateEngineSection', [
		'title'    => 'Template Engine',
		'priority' => 30,
	] );

	$customizeManager->add_control( 'rqd_templateEngineSelect', [
		'label'    => 'Select the template engine to use',
		'section'  => 'rqd_templateEngineSection',
		'settings' => 'templateEngine',
		'type'     => 'select',
		'choices'  => [
			'handlebars' => 'Handlebars',
			'mustache'   => 'Mustache',
			'smarty'     => 'Smarty',
			'underscore' => 'Underscore',
			'twig'       => 'Twig',
		],
	] );
} );

add_action( 'customize_controls_print_footer_scripts', function () {
	echo '<script type="text/javascript">jQuery(function(){jQuery(\'#accordion-panel-nav_menus\').hide();});</script>';
} );

