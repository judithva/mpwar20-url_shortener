<?php
declare(strict_types=1);

namespace LaSalle\UrlShortener\JudithVilela\UrlShortened\Infrastructure\Ui\Cli;


use LaSalle\UrlShortener\JudithVilela\UrlShortened\Application\UrlShortener\UrlShortener;
use LaSalle\UrlShortener\JudithVilela\UrlShortened\Application\UrlShortener\UrlShortenerRequest;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Config\Definition\Exception\Exception;


final class ShortenerCommand extends Command
{
    protected static $defaultName = 'app:url-shortener';

    /** @var UrlShortener */
    private $urlShortener;

    public function __construct(UrlShortener $urlShortener)
    {
        parent::__construct();
        $this->urlShortener = $urlShortener;
    }

    protected function configure()
    {
        $this->setDescription('Given a url return a url shortened by Bitly');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $helper = $this->getHelper('question');
        $question = new Question('Please, input url:');
        $long_url = $helper->ask($input, $output, $question);

        if (empty($long_url)) {
            throw new Exception('URL empty');
        }

        try {
            $urlResponse = $this->urlShortener->__invoke(new UrlShortenerRequest($long_url));
            $urlShortened = $urlResponse->urlShort();
            dump($urlShortened);

            return 0;

        } catch (\Throwable $exception) {
                throw new Exception('Error shortening url '. $exception->getMessage());
        }
    }
}
