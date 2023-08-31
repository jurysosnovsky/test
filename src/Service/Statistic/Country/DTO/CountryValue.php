<?php

namespace App\Service\Statistic\Country\DTO;

use Symfony\Component\Validator\Constraints\Country;
use Symfony\Component\Validator\Constraints\NotBlank;

final class CountryValue implements CountryValueInterface
{
    #[NotBlank]
    #[Country(alpha3: false)]
    private readonly string $country;

    public function __construct(
        string $country,
    )
    {
        $this->country = strtoupper($country);
    }

    public function getValue(): string
    {
        return strtolower($this->country);
    }
}