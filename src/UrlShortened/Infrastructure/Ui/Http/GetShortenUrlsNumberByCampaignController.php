<?php
declare(strict_types=1);

namespace LaSalle\UrlShortener\JudithVilela\UrlShortened\Infrastructure\Ui\Http;


use LaSalle\UrlShortener\JudithVilela\UrlShortened\Application\GetShortenUrlsNumberPerCampaign\GetShortenUrlsNumberPerCampaign;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

final class GetShortenUrlsNumberByCampaignController extends AbstractController
{
    /** @var GetShortenUrlsNumberPerCampaign */
    private $urlsNumberPerCampaign;

    public function __construct(
        GetShortenUrlsNumberPerCampaign $urlsNumberPerCampaign
    ) {
        $this->urlsNumberPerCampaign = $urlsNumberPerCampaign;
    }

    public function __invoke(): JsonResponse
    {
        $urlsNumberPerCampaignResponse = $this->urlsNumberPerCampaign->__invoke();

        $data = [];
        foreach ($urlsNumberPerCampaignResponse->responses() as $response) {
            $data[] = [
                'campaign' => $response->campaign(),
                'totalUrls' => $response->numberUrls()
            ];
        }

        return $this->json($data);
    }
}
