<?php


namespace MagicDeck\Service\Builder;


use MagicDeck\Entity\Card;
use MagicDeck\Entity\Color;
use MagicDeck\Service\Api\ApiService;

class CardBuilderService
{

    public function setValues($apiList)
    {

        $cardList = [];
        foreach ($apiList->cards as $value) {
            $card = new Card();
            $card->setName($value->name);
            $card->setType($value->type);

            $color = new ColorBuilderService();
            $colorlist=$color->setColors($value->colors);

            $card->setColorList($colorlist);

            if (!property_exists($value, "manaCost")) {
                $value->manaCost = "";
            }
            if (!property_exists($value, "text")) {
                $value->text = "";
            }
            if (!property_exists($value, "imageUrl")) {
                continue;
            }
            $card->setManaCost($value->manaCost);
            $card->setDescription($value->text);
            $card->setImage(str_replace("http", "https",$value->imageUrl));

            //array_push($cardList, $card);
            $cardList[] = $card;
        }
        return $cardList;
    }
}