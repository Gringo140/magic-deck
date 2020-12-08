<?php

use MagicDeck\Controller\ErrorController;
use MagicDeck\Controller\CardController;
use MagicDeck\Controller\UserController;

include __DIR__ . "/../vendor/autoload.php";

$url = filter_input(INPUT_SERVER, "REQUEST_URI");

if ("/cards" === $url || "/cards?" === substr($url,0,7)){
    $cardControl = new CardController();
    $cardControl->ShowAll();
}elseif ("/user/create" === $url){
    $create = new UserController();
    $create->Create();
} else {
    $error = new ErrorController();
    $error->error(404);

}

//if ("/cards" === $url) {
//$cardControl = new CardController();
//$cardControl->ShowAll();
//}elseif ("/cards?page=" . filter_input(INPUT_GET, "page") === $url) {
//    $cardControl = new CardController();
//    $cardControl->ShowAll();
//} elseif ("/cards?color=" . filter_input(INPUT_GET, "color") === $url) {
//    $cardControl = new CardController();
//    $cardControl->ShowAll();
//}elseif ("/cards?page=" . filter_input(INPUT_GET, "page") ."&color=" .filter_input(INPUT_GET, "color") === $url) {
//    $cardControl = new CardController();
//    $cardControl->ShowAll();
//}