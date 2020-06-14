<?php
declare(strict_types=1);

namespace LaSalle\UrlShortener\JudithVilela\UrlShortened\Application\SaveUrl;


use InvalidArgumentException;
use LaSalle\UrlShortener\JudithVilela\UrlShortened\Domain\Model\Aggregate\UrlShortened;
use LaSalle\UrlShortener\JudithVilela\UrlShortened\Domain\Model\ValueObject\UrlId;
use LaSalle\UrlShortener\JudithVilela\UrlShortened\Domain\Model\ValueObject\Url;
use LaSalle\UrlShortener\JudithVilela\UrlShortened\Domain\UrlShortenedRepository;


final class SaveUrl
{
    /** @var UrlShortenedRepository */
    private $urlShortenedRepository;

    public function __construct(UrlShortenedRepository $urlShortenedRepository)
    {
        $this->urlShortenedRepository = $urlShortenedRepository;
    }

    /**
     * @param SaveUrlRequest $request
     */
    public function __invoke(SaveUrlRequest $request)
    {
        $urlOriginal = new Url($request->urlLong());
        $this->ensureUrlDoesNotExist($urlOriginal);

        $urlShort = new Url($request->urlShort());
        $urlId = UrlId::generate();

        $urlShortened = new UrlShortened($urlId, $urlOriginal, $urlShort);
        $this->urlShortenedRepository->save($urlShortened);
    }

    /**
     * @param Url $urlOriginal
     */
    public function ensureUrlDoesNotExist(Url $urlOriginal): void
    {
        $urlExists = $this->urlShortenedRepository->find($urlOriginal);

        if (null != $urlExists) {
            throw new InvalidArgumentException('The URL has already been saved');
        }
    }
}
