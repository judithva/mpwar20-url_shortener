<?php
declare(strict_types=1);

namespace LaSalle\UrlShortener\JudithVilela\UrlShortened\Infrastructure\Persistence\Repository;

use PDO;
use LaSalle\UrlShortener\JudithVilela\UrlShortened\Domain\Model\ValueObject\UrlId;
use LaSalle\UrlShortener\JudithVilela\UrlShortened\Infrastructure\Persistence\MysqlDatabase;
use LaSalle\UrlShortener\JudithVilela\UrlShortened\Domain\Model\Aggregate\UrlShortened;
use LaSalle\UrlShortener\JudithVilela\UrlShortened\Domain\Model\ValueObject\Url;
use LaSalle\UrlShortener\JudithVilela\UrlShortened\Domain\UrlShortenedRepository;

final class MySQLUrlShortenedRepository implements UrlShortenedRepository
{
    /** @var MysqlDatabase */
    private $pdoClient;

    public function __construct()
    {
        $this->pdoClient = MysqlDatabase::instancePDO();
    }

    public function find(Url $urlOriginal): ?UrlShortened
    {
        $sql = 'SELECT * FROM UrlShorten WHERE urlOriginal = :urlOriginal';
        $statement = $this->pdoClient->prepare($sql);
        $statement->bindValue(':urlOriginal',$urlOriginal->url());
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if (!$result) {
            return null;
        }

        $urlId = new UrlId($result['idUrl']);
        $urlOriginal = new Url($result['urlOriginal']);
        $urlShortened = new Url($result['urlShortened']);
        $urlData = \DateTimeImmutable::createFromFormat('Y-m-d H:i:s', $result['created_on']);

        return new UrlShortened($urlId, $urlOriginal, $urlShortened, $urlData);
    }

    public function save(UrlShortened $urlShortened): void
    {
        $urlId = $urlShortened->id()->getId();
        $urlLong = $urlShortened->urlOriginal()->url();
        $urlShort = $urlShortened->urlShortened()->url();
        $urlCampaign = $urlShortened->campaign();
        $urlData = $urlShortened->createdOn()->format('Y-m-d H:i:s');

        $sql = 'INSERT INTO UrlShorten VALUES(:urlId, :urlLong, :urlShort, :urlCampaign, :urlData)';
        $statement = $this->pdoClient->prepare($sql);
        $statement->bindValue(':urlId', $urlId);
        $statement->bindValue(':urlLong', $urlLong);
        $statement->bindValue(':urlShort', $urlShort);
        $statement->bindValue(':urlCampaign', $urlCampaign);
        $statement->bindValue(':urlData', $urlData);
        $statement->execute();
    }
}
