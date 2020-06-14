<?php
declare(strict_types=1);

namespace LaSalle\UrlShortener\JudithVilela\UrlShortened\Infrastructure\Service;


use LaSalle\UrlShortener\JudithVilela\UrlShortened\Domain\Model\ValueObject\Url;
use LaSalle\UrlShortener\JudithVilela\UrlShortened\Domain\Service\UrlShortener;

final class BiltyUrlShortener implements UrlShortener
{
    /**
     * @param Url $long_url
     * @return Url
     */
    public function shorten(Url $long_url): Url
    {
        $ch = curl_init($_SERVER['END_POINT']);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(['long_url' => $long_url->url()]));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ["Authorization: Bearer ".$_SERVER['ACCESS_TOKEN'],"Content-Type: application/json"]);
        $result = (array)json_decode(curl_exec($ch));

        return  new Url($result['link']);
    }
}
