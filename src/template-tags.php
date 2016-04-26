<?php
namespace rqd;

/**
 * Returns the description of a template engine.
 *
 * @param string $template
 *
 * @return string
 */
function templateEngineInfo( $template, $version = 'php' ) {
	$map = [
		'handlebars' => [
			'php' => '<a href="https://github.com/XaminProject/handlebars.php" target="_blank">handlebars.php</a>',
			'js'  => '<a href="http://handlebarsjs.com" target="_blank">Handlebars.js</a>',
		],
		'mustache'   => [
			'php' => '<a href="https://github.com/bobthecow/mustache.php" target="_blank">Mustache.php</a>',
			'js'  => '<a href="https://github.com/janl/mustache.js" target="_blank">Mustache.js</a>',
		],
		'smarty'     => [
			'php' => '<a href="http://www.smarty.net" target="_blank">Smarty.php</a>',
			'js'  => '<a href="https://github.com/umakantp/jsmart" target="_blank">jSmart.js</a>',
		],
		'twig'       => [
			'php' => '<a href="http://twig.sensiolabs.org" target="_blank">Twig for PHP</a>',
			'js'  => '<a href="https://github.com/twigjs/twig.js" target="_blank">twig.js</a>',
		],
	];

	return ! empty( $map[ $template ][ $version ] ) ? $map[ $template ][ $version ] : $map['handlebars']['php'];
}
