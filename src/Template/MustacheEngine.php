<?php

namespace rqd\Template;


class MustacheEngine implements EngineInterface {

	/**
	 * @var \Mustache_Engine
	 */
	protected $mustache;

	/**
	 * MustacheEngine constructor.
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
		return $this->mustache->render( $templateName, (object) $data );
	}

	/**
	 * Returns the string content of the specified template.
	 *
	 * @param string $templateName
	 *
	 * @return string
	 */
	public function getTemplateContents( $templateName ) {
		return $this->mustache->getLoader()->load( $templateName );
	}
}