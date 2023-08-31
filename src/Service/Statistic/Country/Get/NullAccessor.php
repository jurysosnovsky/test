<?php

namespace App\Service\Statistic\Country\Get;

use App\Service\Statistic\Country\DTO\CountryValueInterface;

final class NullAccessor extends AbstractAccessor
{
    protected function getValueForCountry(CountryValueInterface $countryValue): int
    {
        return 0;
    }

}