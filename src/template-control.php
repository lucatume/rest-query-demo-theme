<?php
namespace rdq;

use Handlebars\Handlebars;
use Handlebars\Loader\FilesystemLoader;
use rqd\HandlebarsTemplateEngine;
use rqd\TemplateEngineInterface;

class TemplateControl {

	public function __construct() {
		$templateEngine = get_theme_mod( 'rqd_templateEngine', 'handlebars' );

		$this->templateEngine = $this->getTemplateEngineInstanceFor( $templateEngine );
	}

	public function templateInclude( $template ) {
		$templateEngine = $this->templateEngine;

		include $template;

		return false;
	}

	/**
	 * @return string
	 */
	protected function getHandlebarsTemplateFolder() {
		return $templatesFolder = dirname( dirname( __FILE__ ) ) . '/templates/handlebars/';
	}

	/**
	 * @return HandlebarsTemplateEngine
	 */
	protected function getHandlebarsInstance() {
		$handlebars = new Handlebars( [ 'loader' => new FilesystemLoader( $this->getHandlebarsTemplateFolder() ) ] );

		return new HandlebarsTemplateEngine( $handlebars );
	}

	protected function getMustacheInstance() {
		$mustache = new \Mustache_Engine( [ 'loader' => new  \Mustache_Loader_FilesystemLoader( $this->getMustacheTemplateFolder() ) ] );

		return new MustacheTemplateEngine( $mustache );
	}

	/**
	 * @param string $templateEngine
	 *
	 * @return TemplateEngineInterface
	 */
	private function getTemplateEngineInstanceFor( $templateEngine ) {
		$map = [
			'handlebars' => 'getHandlebarsInstance',
			'mustache'   => 'getMustacheInstance',
		];

		$templateEngine = isset( $map[ $templateEngine ] ) ? $templateEngine : 'handlebars';

		return $this->{$map[ $templateEngine ]}();
	}

	protected function getMustacheTemplateFolder() {
		return $templatesFolder = dirname( dirname( __FILE__ ) ) . '/templates/mustache/';
	}
}


// let's hook late to allow anything modifying the template to kick in
add_filter( 'template_include', [ new TemplateControl(), 'templateInclude' ], 999 );
