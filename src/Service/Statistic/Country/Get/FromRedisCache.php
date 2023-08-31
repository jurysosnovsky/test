<?php

namespace App\Service\Statistic\Country\Get;

use App\Service\Statistic\Country\Strategy\CacheKey;

final class FromRedisCache implements BaseInterface
{
    private readonly CacheKey $key;
    public function __construct(
        private readonly \Redis $redis,
        private readonly BaseInterface $nullAccessor,
    )
    {
        $this->key = new CacheKey();
    }

    public function get(): array
    {
        $cacheData = $this->redis->get($this->key->get());
        if (empty($cacheData)) {
            return $this->nullAccessor->get();
        }
        $arrayData = json_decode($cacheData, true);

        if (empty($arrayData)) {
            return $this->nullAccessor->get();
        }

        return $arrayData;
    }

}