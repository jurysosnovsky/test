<?php

namespace App\Service\Statistic\Country\Set;

use App\Service\Statistic\Country\Builder\BaseInterface as CountryValueBuilderInterface;
use App\Service\Statistic\Country\Strategy\CountryKey;

final class DefaultImpl implements BaseInterface
{

    public function __construct(
        private readonly CountryValueBuilderInterface $builder,
        private readonly \Redis $redis,
    )
    {
    }

    /**
     * @throws \RedisException
     */
    public function set(): void
    {
        $country = $this->builder->build();
        $key = new CountryKey($country);
        $this->redis->incr($key->get());
    }

}