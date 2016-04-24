<?php
namespace rqd;

/**
 * Returns the description of a template engine.
 *
 * @param string $template
 *
 * @return string
 */
function templateEngineInfo( $template ) {
	$map = [
		'handlebars' => '<a href="https://github.com/XaminProject/handlebars.php" target="_blank">handlebars.php</a> and <a href="http://handlebarsjs.com" target="_blank">Handlebars.js</a>',
	];

	$template = isset( $map[ $template ] ) ? $template : 'handlebars';

	return $map[ $template ];
}
