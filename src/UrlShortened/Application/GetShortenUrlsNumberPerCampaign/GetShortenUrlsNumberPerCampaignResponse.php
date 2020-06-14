<?php
declare(strict_types=1);

namespace LaSalle\UrlShortener\JudithVilela\UrlShortened\Application\GetShortenUrlsNumberPerCampaign;



final class GetShortenUrlsNumberPerCampaignResponse
{
    /** @var GetShortenUrlsNumberResponse[] */
    private $shortenUrlsResponses;

    private function __construct(array $shortenUrlsNumbersPerCampaign)
    {
        $this->shortenUrlsResponses = $shortenUrlsNumbersPerCampaign;
    }

    public static function create(array $shortenUrlsNumbersPerCampaign): self
    {
        $shortenUrlsResponses = [];
        foreach ($shortenUrlsNumbersPerCampaign as $shortenUrlsPerCampaignNumber) {
            $shortenUrlsResponses[] = GetShortenUrlsNumberResponse::from($shortenUrlsPerCampaignNumber);
        }

        return new self($shortenUrlsResponses);
    }

    public function responses(): array
    {
        return $this->shortenUrlsResponses;
    }
}
