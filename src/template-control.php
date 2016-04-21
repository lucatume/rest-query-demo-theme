<?php
use Handlebars\Handlebars;
use Handlebars\Loader\FilesystemLoader;

class rqdTemplate
{

    public function __construct()
    {
        $templatesFolder = dirname(dirname(__FILE__)) . '/templates/';
        $this->handlebars = new Handlebars(['loader' => new FilesystemLoader($templatesFolder)]);
    }

    public function templateInclude($template)
    {
        $handlebars = $this->handlebars;

        include $template;

        return false;
    }
}

// let's hook late to allow anything modifying the template to kick in
add_filter('template_include', [new rqdTemplate(), 'templateInclude'], 999);
