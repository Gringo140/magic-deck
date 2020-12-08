<?php


namespace MagicDeck\Controller;


use MagicDeck\Service\CardService;

class CardController extends Controller
{
    public function ShowAll()
    {
        header("HTTP/1.1 200 OK");
        header('Content-Type: text/html');

        $tabOption = [];
        $colorList = ["red", "green", "blue", "black", "white"];
        $color = filter_input(INPUT_GET, "colors");
        if (in_array($color, $colorList)) {
            $tabOption["colors"]=$color;
        }

        $page = (int)filter_input(INPUT_GET, "page");
        if ($page === 0){
            $page = 1;
        }
        $tabOption["page"]=$page;

        $pageNext = $tabOption;
        $pageNext["page"]= $page +1;
        $pagePrevious = $tabOption;
        $pagePrevious["page"] = $page -1;

        $card = new CardService();
        $cardList = $card->findAll($tabOption);
        if(!$cardList){
            header("Location: /cards");
            exit();
        }
        $this->render("show-all.html.php", [
            "pagePrevious" => $pagePrevious,
            "pageNext" => $pageNext,
            "cardList" => $cardList,
            "page" => $page
        ]);
    }
}