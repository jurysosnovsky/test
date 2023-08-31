<?php

namespace App\Service\Statistic\Country\Strategy;

use App\Service\Statistic\Country\DTO\CountryValue;

final class CountryKey
{

    private const KEY_TEMPLATE = '%s_visits';
    public function __construct(
        private readonly CountryValue $countryValue,
    )
    {
    }

    public function get(): string
    {
        return sprintf(self::KEY_TEMPLATE, $this->countryValue->getValue());
    }
}