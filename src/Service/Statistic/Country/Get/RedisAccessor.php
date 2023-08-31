<?php

namespace App\Service\Statistic\Country\Get;

use App\Service\Statistic\Country\DTO\CountryValueInterface;
use App\Service\Statistic\Country\Strategy\CountryKey;

final class RedisAccessor extends AbstractAccessor
{
    public function __construct(
        private readonly \Redis $redis,
    )
    {
        parent::__construct();
    }

    protected function getValueForCountry(CountryValueInterface $countryValue): int
    {
        $redisKey = new CountryKey($countryValue);
        return (int) $this->redis->get($redisKey->get());
    }
}