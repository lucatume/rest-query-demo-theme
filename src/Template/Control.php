<?php

namespace rqd\Template;

use Handlebars\Handlebars;
use Handlebars\Loader\FilesystemLoader;

class Control {

	protected $root;

	public function __construct() {
		$this->root     = dirname( dirname( dirname( __FILE__ ) ) );
		$templateEngine = get_theme_mod( 'templateEngine', 'handlebars' );

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
		return $templatesFolder = $this->root . '/templates/handlebars/';
	}

	/**
	 * @return HandlebarsTemplateEngine
	 */
	protected function getHandlebarsInstance() {
		$handlebars = new Handlebars( [ 'loader' => new FilesystemLoader( $this->getHandlebarsTemplateFolder() ) ] );

		return new HandlebarsEngine( $handlebars );
	}

	protected function getMustacheInstance() {
		$mustache = new \Mustache_Engine( [ 'loader' => new  \Mustache_Loader_FilesystemLoader( $this->getMustacheTemplateFolder() ) ] );

		return new MustacheEngine( $mustache );
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
		return $templatesFolder = $this->root . '/templates/mustache/';
	}
}

