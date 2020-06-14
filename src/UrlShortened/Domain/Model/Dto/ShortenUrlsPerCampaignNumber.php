<?php
declare(strict_types=1);

namespace LaSalle\UrlShortener\JudithVilela\UrlShortened\Domain\Model\Dto;


final class ShortenUrlsPerCampaignNumber
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
