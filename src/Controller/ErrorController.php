<?php


namespace MagicDeck\Controller;


class ErrorController extends Controller
{
    function error ($statuscode)
    {
        $statustext = [
            404 => "not found",
            500 => "Internal Server Error",
        ];
        header("HTTP/1.1 $statuscode $statustext[$statuscode]");
        header('Content-Type: text/html');

        $this->render("error/error.html.php", [
            "statustext" => $statustext,
            "statuscode" => $statuscode
        ]);
    }
}