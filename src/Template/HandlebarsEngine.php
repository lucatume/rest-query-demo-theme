<?php

namespace rqd\Template;

use Handlebars\Handlebars;

class HandlebarsEngine implements EngineInterface {

	/**
	 * @var Handlebars
	 */
	protected $handlebars;

	public function __construct( Handlebars $handlebars ) {
		$this->handlebars = $handlebars;
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
		return $this->handlebars->render( $templateName, $data );
	}

	/**
	 * Returns the string content of the specified template.
	 *
	 * @param string $templateName
	 *
	 * @return string
	 */
	public function getTemplateContents( $templateName ) {
		return $this->handlebars->getLoader()->load( $templateName )->getString();
	}
}