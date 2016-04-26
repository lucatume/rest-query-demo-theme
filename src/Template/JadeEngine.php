<?php

namespace rqd\Template;


use Jade\Jade;

class JadeEngine implements EngineInterface {

	/**
	 * @var Jade
	 */
	protected $jade;

	/**
	 * @var string
	 */
	protected $templatesFolder;

	/**
	 * JadeEngine constructor.
	 *
	 * @param Jade $jade
	 */
	public function __construct( Jade $jade, $templatesFolder ) {
		$this->jade            = $jade;
		$this->templatesFolder = $templatesFolder;
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
		$template = $this->templatesFolder . $templateName . '.jade';

		return $this->jade->render( $template, $data );
	}

	/**
	 * Returns the string content of the specified template.
	 *
	 * @param string $templateName
	 *
	 * @return string
	 */
	public function getTemplateContents( $templateName ) {
		return file_get_contents( $this->templatesFolder . $templateName . '.jade' );
	}
}