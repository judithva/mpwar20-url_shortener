<?php
declare(strict_types=1);

namespace LaSalle\UrlShortener\JudithVilela\UrlShortened\Infrastructure\Persistence\Repository;

use PDO;
use LaSalle\UrlShortener\JudithVilela\UrlShortened\Domain\Model\Dto\ShortenUrlsPerCampaignNumber;
use LaSalle\UrlShortener\JudithVilela\UrlShortened\Domain\Service\ShortenUrlsPerCampaignCounter;
use LaSalle\UrlShortener\JudithVilela\UrlShortened\Infrastructure\Persistence\MysqlDatabase;

final class MySQLShortenUrlsPerCampaignCounter implements ShortenUrlsPerCampaignCounter
{
    /** @var MysqlDatabase */
    private $pdoClient;

    public function __construct()
    {
        $this->pdoClient = MysqlDatabase::instancePDO();
    }

    /**
     * @inheritDoc
     */
    public function count(): array
    {
        $sql= 'SELECT 0 as numUrls, campaign  FROM UrlShorten';

        $statement = $this->pdoClient->prepare($sql);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);

        $urlsPerCampaign = [];
        foreach ($results as $result ){
            $urlsPerCampaign [] = new ShortenUrlsPerCampaignNumber($result['campaign'], intval($result['numUrls']));
        }

        return $urlsPerCampaign;
    }
}
