<?php


namespace MagicDeck\Service\Api;


class ApiService
{
    public function fetch($url, $filename)
    {
        $filename = __DIR__ . "/../../../var/cache/$filename";
        if (file_exists($filename)) {
            $contents = file_get_contents($filename);
        } else {
            $contents = file_get_contents($url);
            file_put_contents($filename, $contents);
        }
        return json_decode($contents);
    }
}