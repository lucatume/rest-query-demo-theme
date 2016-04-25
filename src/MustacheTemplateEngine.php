<?php

namespace rdq;


use rqd\TemplateEngineInterface;

class MustacheTemplateEngine implements TemplateEngineInterface {

	/**
	 * @var \Mustache_Engine
	 */
	 protected $mustache;

	/**
	 * MustacheTemplateEngine constructor.
	 *
	 * @param \Mustache_Engine $mustache
	 */
	public function __construct( \Mustache_Engine $mustache ) {
		$this->mustache = $mustache;
	}

	/**
	 * Returns the template rendered with the specified data.
	 *
	 * @param string $templateName
	 * @param array  $data
	 *
	 * @return string
	 */
	public function render( $templateName, array $data = array() ) {
		// TODO: Implement render() method.
	}

	/**
	 * Returns the string content of the specified template.
	 *
	 * @param string $templateName
	 *
	 * @return string
	 */
	public function getTemplateContents( $templateName ) {
		// TODO: Implement getTemplateContents() method.
	}
}