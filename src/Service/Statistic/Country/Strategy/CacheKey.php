<?php

namespace App\Service\Statistic\Country\Strategy;

final class CacheKey
{

    private const KEY = 'countries_visits';
    public function __construct()
    {
    }

    public function get(): string
    {
        return self::KEY;
    }
}