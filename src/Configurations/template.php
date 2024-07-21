<?php
namespace Codevar\kruger\Configurations;

class Template{

    public function load_template(){
        $loader = new \Twig\Loader\FilesystemLoader('./src/Views');
        $twig = new \Twig\Environment($loader, []);
        return $twig;
    }
}


