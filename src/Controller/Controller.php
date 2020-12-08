<?php


namespace MagicDeck\Controller;


class Controller
{
    protected string $pathTemplate = __DIR__ . "/../../templates/";

    public function render($pathName, $values){
        extract($values);
        include $this->pathTemplate . $pathName;
    }


}