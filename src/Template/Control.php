<?php

namespace rqd\Template;

use Handlebars\Handlebars;
use Handlebars\Loader\FilesystemLoader;
use Jade\Jade;

class Control {

	/**
	 * @var string
	 */
	protected $root;

	public function __construct() {
		$this->root     = dirname( dirname( dirname( __FILE__ ) ) );
		$templateEngine = get_theme_mod( 'templateEngine', 'handlebars' );

		$this->templateEngine = $this->getTemplateEngineInstanceFor( $templateEngine );
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
			'smarty'     => 'getSmartyInstance',
			'twig'       => 'getTwigInstance',
			'jade'       => 'getJadeInstance',
		];

		$templateEngine = isset( $map[ $templateEngine ] ) ? $templateEngine : 'handlebars';

		return $this->{$map[ $templateEngine ]}();
	}

	public function templateInclude( $template ) {
		// allow the template to use it in its scope
		$templateEngine = $this->templateEngine;

		// include the template file
		include $template;

		// prevent WordPress from loading the template again
		return false;
	}

	/**
	 * @return HandlebarsTemplateEngine
	 */
	protected function getHandlebarsInstance() {
		$handlebars = new Handlebars( [ 'loader' => new FilesystemLoader( $this->getHandlebarsTemplateFolder() ) ] );

		return new HandlebarsEngine( $handlebars );
	}

	/**
	 * @return string
	 */
	protected function getHandlebarsTemplateFolder() {
		return $templatesFolder = $this->root . '/templates/handlebars/';
	}

	protected function getMustacheInstance() {
		$mustache = new \Mustache_Engine( [ 'loader' => new  \Mustache_Loader_FilesystemLoader( $this->getMustacheTemplateFolder() ) ] );

		return new MustacheEngine( $mustache );
	}

	protected function getMustacheTemplateFolder() {
		return $this->root . '/templates/mustache/';
	}

	protected function getSmartyInstance() {
		$smarty = new \Smarty();
		$smarty->setTemplateDir( $this->getSmartyTemplateFolder() );

		return new SmartyEngine( $smarty );
	}

	protected function getSmartyTemplateFolder() {
		return $this->root . '/templates/smarty/';
	}

	protected function getTwigInstance() {
		$loader = new \Twig_Loader_Filesystem( $this->getTwigTemplateFolder() );
		$twig   = new \Twig_Environment( $loader );
		$twig->addExtension( new \Twig_Extension_Escaper( false ) );

		return new TwigEngine( $twig );
	}

	protected function getTwigTemplateFolder() {
		return $this->root . '/templates/twig/';
	}

	protected function getJadeInstance() {
		$jade = new Jade( [
			'prettyprint' => true,
			'extensions'  => '.jade',
		] );

		return new JadeEngine( $jade, $this->getJadeTemplateFolder() );
	}

	protected function getJadeTemplateFolder() {
		return $this->root . '/templates/jade/';
	}
}

