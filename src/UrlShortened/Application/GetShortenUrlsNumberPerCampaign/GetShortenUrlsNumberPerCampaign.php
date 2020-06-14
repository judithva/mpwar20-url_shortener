<?php
declare(strict_types=1);

namespace LaSalle\UrlShortener\JudithVilela\UrlShortened\Application\GetShortenUrlsNumberPerCampaign;


use LaSalle\UrlShortener\JudithVilela\UrlShortened\Domain\Service\ShortenUrlsPerCampaignCounter;

final class GetShortenUrlsNumberPerCampaign
{
    /** @var ShortenUrlsPerCampaignCounter */
    private $repository;

    public function __construct(ShortenUrlsPerCampaignCounter $campaignCounter)
    {
        $this->repository = $campaignCounter;
    }

    /**
     * @return GetShortenUrlsNumberPerCampaignResponse
     */
    public function __invoke(): GetShortenUrlsNumberPerCampaignResponse
    {
        $urlNumberPerCampaign = $this->repository->count();

        return GetShortenUrlsNumberPerCampaignResponse::create($urlNumberPerCampaign);
    }
}
