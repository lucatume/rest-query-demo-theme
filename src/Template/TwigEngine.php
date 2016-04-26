<?php

namespace rqd\Template;


class TwigEngine implements EngineInterface {

	/**
	 * @var \Twig_Environment
	 */
	private $twig;

	/**
	 * TwigEngine constructor.
	 *
	 * @param \Twig_Environment $twig
	 */
	public function __construct( \Twig_Environment $twig ) {
		$this->twig = $twig;
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
		return $this->twig->render( $templateName . '.twig', $data );
	}

	/**
	 * Returns the string content of the specified template.
	 *
	 * @param string $templateName
	 *
	 * @return string
	 */
	public function getTemplateContents( $templateName ) {
		return $this->twig->getLoader()->getSource( $templateName . '.twig' );
	}
}