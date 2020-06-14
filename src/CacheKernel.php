<?php
declare(strict_types=1);

namespace LaSalle\UrlShortener\JudithVilela;


use Symfony\Bundle\FrameworkBundle\HttpCache\HttpCache;

class CacheKernel extends HttpCache
{
    protected function getOptions()
    {
        return [
            'debug' => false,
            'default_ttl' => 0,
            'private_headers' => ['Authorization', 'Cookie'],
            'allow_reload' => false,
            'allow_revalidate' => false,
            'stale_while_revalidate' => 2,
            'stale_if_error' => 60,
            'trace_level' => 'full',
            'trace_header' => 'X-Symfony-Cache'
        ];
    }
}
