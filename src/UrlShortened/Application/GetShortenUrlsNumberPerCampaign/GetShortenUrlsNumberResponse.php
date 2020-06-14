<?php
declare(strict_types=1);

namespace LaSalle\UrlShortener\JudithVilela\UrlShortened\Application\GetShortenUrlsNumberPerCampaign;


use LaSalle\UrlShortener\JudithVilela\UrlShortened\Domain\Model\Dto\ShortenUrlsPerCampaignNumber;

final class GetShortenUrlsNumberResponse
{
    /** @var string  */
    private $campaign;

    /** @var int  */
    private $numberUrls;

    public function __construct(string $campaign = null, int $numberUrls)
    {
        $this->campaign = $campaign ?? null;
        $this->numberUrls = $numberUrls;
    }

    public static function from(ShortenUrlsPerCampaignNumber $shortenUrlsPerCampaignNumber): self
    {
        return new self($shortenUrlsPerCampaignNumber->campaign(), $shortenUrlsPerCampaignNumber->numberUrls());
    }

    /**
     * @return string
     */
    public function campaign(): ?string
    {
        return $this->campaign ?? null;
    }

    /**
     * @return int
     */
    public function numberUrls(): int
    {
        return $this->numberUrls;
    }
}
