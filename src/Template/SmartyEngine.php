<?php

namespace rqd\Template;


class SmartyEngine implements EngineInterface {

	/**
	 * @var \Smarty
	 */
	protected $smarty;

	public function __construct( \Smarty $smarty ) {
		$this->smarty = $smarty;
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
		$smarty = $this->smarty;
		array_walk( $data, function ( $value, $key ) use ( $smarty ) {
			$smarty->assign( $key, $value );
		} );

		return $this->smarty->fetch( $templateName . '.tpl' );
	}

	/**
	 * Returns the string content of the specified template.
	 *
	 * @param string $templateName
	 *
	 * @return string
	 */
	public function getTemplateContents( $templateName ) {
		try {
			$source = \Smarty_Template_Source::load( null, $this->smarty, $templateName . '.tpl' );

			return $source->getContent();
		} catch ( \SmartyException $e ) {
			return '';
		}
	}
}