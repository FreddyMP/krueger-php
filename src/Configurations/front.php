<?php
namespace Codevar\kruger\Configurations;
use Codevar\kruger\Configurations\Template;

class Front {

    public static function view_font($vista, $variables = null){
        $twig_instance = new Template;
        $twig = $twig_instance->load_template();
        echo $twig->render($vista.".twig", compact('variables'));
        
    }

}