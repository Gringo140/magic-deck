<?php


namespace MagicDeck\Service;


use MagicDeck\Service\Api\ApiService;
use MagicDeck\Service\Builder\CardBuilderService;

class CardService
{
    public function findAll($tabOption)
    {
        $cache = "cards";
        $url = "https://api.magicthegathering.io/v1/cards";

        $url = $url . "?" . http_build_query($tabOption);
        $cache = $cache . http_build_query($tabOption);



        $api = new ApiService();
        $apiList = $api->fetch($url, "$cache.json");
        $value = new CardBuilderService();
        $cardValue = $value->setValues($apiList);
        return $cardValue;
    }
}