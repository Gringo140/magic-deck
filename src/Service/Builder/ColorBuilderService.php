<?php


namespace MagicDeck\Service\Builder;


use MagicDeck\Entity\Color;

class ColorBuilderService
{
    public function setColors($colorValue){

        $colorlist=[];
        foreach ($colorValue as $subValue) {
            $color = new Color();
            $color->setValue($subValue);
            $colorlist[] = $color;
        }
        return $colorlist;
    }
}