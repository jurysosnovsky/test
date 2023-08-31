<?php

namespace App\Service\Statistic\Country\Get;

use App\Service\Statistic\Country\DTO\CountryValue;
use App\Service\Statistic\Country\DTO\CountryValueInterface;
use Symfony\Component\Intl\Countries;

abstract class AbstractAccessor implements BaseInterface
{
    public function __construct()
    {
    }

    abstract protected function getValueForCountry(CountryValueInterface $countryValue): int;

    public function get(): array
    {
        $result = [];
        $availableCountries = Countries::getCountryCodes();

        foreach ($availableCountries as $availableCountry) {
            $country = new CountryValue($availableCountry);
            $result[$country->getValue()] = $this->getValueForCountry($country);
        }

        return $result;
    }

}