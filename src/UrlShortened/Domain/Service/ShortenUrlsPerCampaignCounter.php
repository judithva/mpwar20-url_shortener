<?php
declare(strict_types=1);

namespace LaSalle\UrlShortener\JudithVilela\UrlShortened\Domain\Service;


use LaSalle\UrlShortener\JudithVilela\UrlShortened\Domain\Model\Dto\ShortenUrlsPerCampaignNumber;

interface ShortenUrlsPerCampaignCounter
{
    /** @return ShortenUrlsPerCampaignNumber[] */
    public function count(): array;
}
